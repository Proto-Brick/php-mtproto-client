<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient;

use DigitalStars\MtprotoClient\Auth\AuthKey;
use DigitalStars\MtprotoClient\Auth\AuthKeyCreator;
use DigitalStars\MtprotoClient\Auth\Storage\AuthKeyStorage;
use DigitalStars\MtprotoClient\Exception\AuthKeyNotFoundOnServerErrorException;
use DigitalStars\MtprotoClient\Exception\MsgIdInvalidException;
use DigitalStars\MtprotoClient\Exception\ResendRequiredException;
use DigitalStars\MtprotoClient\Exception\RpcErrorException;
use DigitalStars\MtprotoClient\Exception\SaltInvalidException;
use DigitalStars\MtprotoClient\Exception\SeqNoInvalidException;
use DigitalStars\MtprotoClient\Exception\TransportException;
use DigitalStars\MtprotoClient\Session\Session;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Mtproto\Constructors;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;
use DigitalStars\MtprotoClient\Transport\Transport;
use Exception;

class Client
{
    private ?AuthKey $authKey = null;

    /** @var array<int, TlObject> Карта [hex_msg_id => request_object] */
    private array $pendingRequests = [];

    public function __construct(
        private readonly Settings $settings,
        private readonly AuthKeyStorage $authKeyStorage,
        private readonly Session $session,
        private readonly Transport $transport,
        private readonly AuthKeyCreator $authKeyCreator,
        private readonly MessagePacker $messagePacker,
        private readonly Deserializer $deserializer,
        private readonly Serializer $serializer,
    ) {}

    public function connect(): void
    {
        $this->transport->connect();
        $this->authKey = $this->authKeyStorage->get();

        if ($this->authKey === null) {
            echo "AuthKey not found. Creating a new one...\n";
            $this->authKey = $this->authKeyCreator->create();
            $this->authKeyStorage->set($this->authKey);
            echo "New AuthKey created and saved.\n";
            $this->session->start($this->authKey);
            echo "Initial session created and saved.\n";
        } else {
            echo "AuthKey loaded from storage.\n";
            $this->session->start($this->authKey);
        }
    }

    /**
     * Отправляет RPC-запрос и ждет ответа именно на него.
     *
     * @param TlObject $request Сгенерированный объект запроса
     * @return TlObject|array|bool|string|int|null Сгенерированный объект ответа
     */
    public function call(TlObject $request, int $totalTimeout = 30): TlObject|array|bool|string|int
    {
        if ($this->authKey === null) {
            throw new \LogicException("Not connected. Please call connect() first.");
        }

        $attempt = 1;
        $maxAttempts = 3;
        $attemptTimeout = 10; // Таймаут на одну попытку

//        $this->sendAcksIfNeeded();

        $currentMsgId = null;

        while ($attempt <= $maxAttempts) {
            // Удаляем старый ID, если это повторная попытка
            if ($currentMsgId) {
                unset($this->pendingRequests[$currentMsgId]);
            }

            // Отправляем запрос и запоминаем его ID
            $currentMsgId = $this->sendPacket($request);

            $startTime = time();
            while (time() - $startTime < $attemptTimeout) {
                try {
                    // `readAndProcessResponse` теперь не бросает ResendRequiredException,
                    // а возвращает флаг. Но он МОЖЕТ бросить TransportException.
                    $result = $this->readAndProcessResponse();

                    // 1. Проверяем, пришел ли наш ответ
                    if ($result['response'] !== null) {
                        $responseType = is_object($result['response']) ? $result['response']->getPredicate() : gettype($result['response']);
//                        $this->sendAcksIfNeeded(); //отправка отдельных ack сразу после получения часто вызывает 33 ошибку
                        return $result['response'];
                    }

                    // 2. Проверяем, нужно ли переотправить запрос
                    if ($result['resend_required']) {
                        echo "[INFO] Resending request due to: {$result['resend_message']}\n";
                        continue 2; // Переходим к следующей итерации внешнего цикла (новая попытка)
                    }

                    usleep(100000); // Ждем дальше

                } catch (SaltInvalidException | MsgIdInvalidException $e) {
                    // Ошибки, которые можно исправить переотправкой.
                    echo "[INFO] Исправимая ошибка протокола. Повторная отправка... ({$e->getMessage()})\n";
                    continue 2;
                } catch (SeqNoInvalidException $e) {
                    // Серьёзная ошибка, но всё же попробуем переотправить.
                    echo "[WARN] Критическая рассинхронизация seqno. Попытка переотправки... ({$e->getMessage()})\n";
                    // Здесь можно добавить логику полного сброса сессии, если ошибка повторится
                    continue 2;
                } catch (TransportException $e) {
                    // Фатальные ошибки.
                    echo "[FAIL] Запрос отклонён сервером: {$e->getMessage()}\n";
                    throw $e;
                }
            }

            echo "[WARN] Attempt {$attempt} timed out. Retrying...\n";
            $attempt++;
        }

        throw new \Exception("Request failed after {$maxAttempts} attempts for msg_id " . $currentMsgId);
    }

    /**
     * Собирает, шифрует и отправляет запрос.
     * @return string Бинарный msg_id отправленного сообщения.
     */
    private function sendPacket(TlObject $request): int
    {
        $ackIds = $this->session->getAndClearAckQueue();
        $mainRequestPayload = $request->serialize($this->serializer);

        if (!$this->session->isInitialized) {
            $layer = 195;
            $mainRequestPayload = $this->serializer->wrapWithInitConnection($mainRequestPayload, $layer, $this->settings->api_id);
        }

        if (empty($ackIds)) {
            // --- Сценарий 1: Нет ack'ов, отправляем один запрос ---
            $isContentRelated = true;
            [$encryptedRequest, $finalMsgId, $sequence] = $this->messagePacker->packEncrypted($mainRequestPayload, $this->authKey, null, $isContentRelated);

            $this->pendingRequests[$finalMsgId] = $request;
            echo "[SEND] >> {$request->getPredicate()} (msg_id: {$finalMsgId}, seqno: $sequence)\n";
            $this->transport->send($encryptedRequest);
        } else {
            // --- Сценарий 2: Есть ack'и, упаковываем в контейнер ---
            $ackPayload = $this->serializer->serializeMsgsAck($ackIds);

            $messages = [
                ['payload' => $ackPayload, 'is_content_related' => false],
                ['payload' => $mainRequestPayload, 'is_content_related' => true, 'request_object' => $request]
            ];

            [$encryptedContainer, , , $rpcRequestMsgId, $seqno_main] = $this->messagePacker->packContainer($messages, $this->authKey);

            echo "[SEND] >> Packing {$request->getPredicate()} with " . count($ackIds) . " ACKs into a container. (msg_id: {$rpcRequestMsgId}, seqno: $seqno_main)\n";

            if ($rpcRequestMsgId === null) throw new \LogicException("Packer did not return RPC msg_id from container.");

            $finalMsgId = $rpcRequestMsgId;
            $this->pendingRequests[$finalMsgId] = $request;
            $this->transport->send($encryptedContainer);
        }

        $this->session->save($this->authKey);

        return $finalMsgId;
    }

    /**
     * Читает один пакет из сети, обрабатывает все вложенные сообщения.
     * Не бросает исключения, связанные с логикой переотправки, а возвращает их в виде флагов.
     *
     * @return array{
     *     response: TlObject|array|bool|string|int|null,
     *     resend_required: bool,
     *     resend_message: string
     * }
     * @throws TransportException | AuthKeyNotFoundOnServerErrorException
     */
    private function readAndProcessResponse(): array
    {
        try {
            $rawEncryptedResponse = $this->transport->receive();
        } catch (TransportException $e) {
            // Пробрасываем транспортные исключения, так как они фатальны для соединения
            throw $e;
        }

        if (empty($rawEncryptedResponse)) {
            return ['response' => null, 'resend_required' => false, 'resend_message' => ''];
        }

        // Обработка 4-байтных транспортных ошибок (-404 и др.)
        // Этот код был у тебя, но его лучше инкапсулировать здесь же.
        if (\strlen($rawEncryptedResponse) === 4) {
            $errorCode = unpack('l', $rawEncryptedResponse)[1];
            if ($errorCode < 0) {
                if ($errorCode === -404) {
                    throw new AuthKeyNotFoundOnServerErrorException("Server returned -404 (AUTH_KEY_NOT_FOUND)");
                }
                throw new TransportException("Transport error code: " . $errorCode);
            }
        }

        $unpacked = $this->messagePacker->unpackEncrypted($rawEncryptedResponse, $this->authKey);

        if ($unpacked['session_id'] !== $this->session->getId()) {
            // из-за пересоздания сессии приходят старые ответы со старой сессией. Нужно либо игнорировать,
            // либо хранить все id предыдущих сессий
//            throw new \RuntimeException("Session ID mismatch in response.");
        }

        $outer_msg_id = unpack('q', $unpacked['msg_id'])[1];
        if ($unpacked['seq_no'] % 2 !== 0) {
            $this->session->addToAckQueue($outer_msg_id);
        }

        // Обновляем смещение времени
        $serverTime = (unpack('q', $unpacked['msg_id'])[1] >> 32);
        $this->session->setTimeOffset($serverTime - time());

        $responsePayload = $unpacked['body'];
        $peekConstructor = $this->deserializer->peekConstructor($responsePayload);

        // Обновляем соль, если это не bad_server_salt (он несёт новую соль внутри себя)
        if ($peekConstructor !== 0xedab447b) {
            $salt_bin = $unpacked['server_salt'];
            $salt = $this->deserializer->int64($salt_bin);
            $this->session->setServerSalt($salt);
        }

        $containerItems = [];
        if ($peekConstructor === Constructors::MSG_CONTAINER) {
            $containerItems = $this->deserializer->deserializeMessageContainer($responsePayload);
        } else {
            // Оборачиваем одиночное сообщение в ту же структуру, что и элементы контейнера
            $containerItems[] = [
                'body' => $responsePayload,
                'msg_id' => $outer_msg_id,
                'seqno' => $unpacked['seq_no']
            ];
        }

        $finalResponse = null;
        $resendRequired = false;
        $resendMessage = '';
        $rpcResponseFound = false;

        // Теперь цикл всегда работает с одинаковой структурой item'а
        foreach ($containerItems as $item) {
            // Добавляем ack для вложенных контентных сообщений
            if ($item['seqno'] % 2 !== 0 && $peekConstructor === Constructors::MSG_CONTAINER) {
                $this->session->addToAckQueue($item['msg_id']);
            }

            $itemBody = $item['body']; // Передаем в обработчик только тело

            try {
                $response = $this->handleSingleMessage($itemBody);
                if ($response !== null && !$rpcResponseFound) {
                    $finalResponse = $response;
                    $rpcResponseFound = true;
                }
            } catch (ResendRequiredException $e) {
                $resendRequired = true;
                $resendMessage = $e->getMessage();
                break; // Если одно сообщение требует переотправки, прекращаем обработку пакета
            }
        }

        return [
            'response' => $finalResponse,
            'resend_required' => $resendRequired,
            'resend_message' => $resendMessage,
        ];
    }

    /**
     * Обрабатывает одно TL-сообщение (из контейнера или одиночное).
     *
     * @param string $messageBody
     * @return TlObject|array|bool|string|int|null
     * @throws ResendRequiredException
     * @throws RpcErrorException
     */
    private function handleSingleMessage(string &$messageBody): TlObject|array|bool|string|int|null
    {
        $constructorId = $this->deserializer->peekConstructor($messageBody);

        switch ($constructorId) {
            case Constructors::RPC_RESULT: // 0xf35c6d01
                $this->deserializer->int32($messageBody); // съедаем ID
                $req_msg_id = $this->deserializer->int64($messageBody);

                if (!isset($this->pendingRequests[$req_msg_id])) {
                    echo "[WARN] << rpc_result for unknown msg_id: {$req_msg_id} (ignored)\n";
                    return null;
                }

                $request = $this->pendingRequests[$req_msg_id];
                unset($this->pendingRequests[$req_msg_id]);
                echo "[RECV] << rpc_result for {$request->getPredicate()} (0x" . dechex($constructorId) . ")\n";

                $resultPayload = $this->processRpcResultBody($messageBody);

                if (!$this->session->isInitialized) {
                    $this->session->isInitialized = true;
                    echo "[INFO] Session initialized.\n";
                }
                $this->session->save($this->authKey);

                $responseClassOrType = $request->getResponseClass();
                if (class_exists($responseClassOrType)) {
                    return $responseClassOrType::deserialize($this->deserializer, $resultPayload);
                }

                return match ($responseClassOrType) {
                    'bool' => $this->deserializer->deserializeBool($resultPayload),
                    'int' => $this->deserializer->int32($resultPayload),
                    'long' => $this->deserializer->int64($resultPayload),
                    'string' => $this->deserializer->bytes($resultPayload),
                    'vector<int>' => $this->deserializer->vectorOfInts($resultPayload),
                    'vector<long>' => $this->deserializer->vectorOfLongs($resultPayload),
                    'vector<string>' => $this->deserializer->vectorOfStrings($resultPayload),
                    default => throw new \Exception("Unsupported primitive response type: {$responseClassOrType}"),
                };

            case 0xedab447b: // bad_server_salt
                echo "[RECV] << bad_server_salt (0xedab447b)\n";
                $salt_data = $this->deserializer->deserializeBadServerSalt($messageBody);
                $this->session->setServerSalt($salt_data['new_server_salt']);
                $this->session->save($this->authKey);

                echo "[INFO] Server salt updated to {$salt_data['new_server_salt']}.\n";
                throw new ResendRequiredException('bad_server_salt');

            case 0x9ec20908: // new_session_created
                echo "[RECV] << new_session_created (0x9ec20908)\n";
                $session_data = $this->deserializer->deserializeNewSessionCreated($messageBody);
                $this->session->isInitialized = false;
                $this->session->setServerSalt($session_data['server_salt']);
                $this->session->save($this->authKey);
                echo "[INFO] New session created. Salt updated to {$session_data['server_salt']}.\n";
                return null;

            case 0xa7eff811: // bad_msg_notification
                $this->deserializer->consumeConstructor($messageBody);
                $bad_msg_id = $this->deserializer->int64($messageBody);
                $bad_msg_seqno = $this->deserializer->int32($messageBody);
                $error_code = $this->deserializer->int32($messageBody);

                $request = $this->pendingRequests[$bad_msg_id] ?? null;
                $requestName = $request?->getPredicate() ?? 'unknown_request';
                if ($request) {
                    unset($this->pendingRequests[$bad_msg_id]);
                }

                $logMessage = match ($error_code) {
                    16 => "msg_id слишком низкий. Возможно, время на клиенте отстает.",
                    17 => "msg_id слишком высокий. Возможно, время на клиенте спешит.",
                    18 => "Некорректные два младших бита msg_id (должен делиться на 4).",
                    19 => "msg_id контейнера совпадает с msg_id ранее полученного сообщения.",
                    20 => "Сообщение слишком старое, невозможно проверить статус.",
                    32 => "msg_seqno слишком низкий",
                    33 => "msg_seqno слишком высокий",
                    34 => "Ожидался чётный msg_seqno (для служебного сообщения), получен нечётный.",
                    35 => "Ожидался нечётный msg_seqno (для контентного сообщения), получен чётный.",
                    48 => "Некорректная соль сервера (получено через bad_msg_notification).",
                    64 => "Сервер сообщил о невалидном контейнере.",
                    default => "Неизвестный код ошибки: {$error_code}.",
                };

                echo "[RECV] << bad_msg_notification для msg_id {$bad_msg_id} (запрос: {$requestName}, ошибка {$error_code}: {$logMessage})\n";

                if ($error_code === 32 || $error_code === 33) { // msg_seqno too low/high
                    $old_salt = $this->session->getServerSalt();
                    $this->session->reset();
                    $this->session->setServerSalt($old_salt);
                    $this->session->save($this->authKey);

                    // Бросаем исключение, чтобы Client::call повторил попытку уже с новой сессией.
                    throw new ResendRequiredException($logMessage);
                }

                // Выбор исключения для проброса наверх
                match ($error_code) {
                    16, 17 => throw new MsgIdInvalidException($logMessage, $error_code),
                    18, 19, 20, 64 => throw new TransportException($logMessage, $error_code),
                    32, 33, 34, 35 => throw new SeqNoInvalidException($logMessage, $error_code),
                    48 => throw new SaltInvalidException($logMessage, $error_code),
                    default => throw new TransportException($logMessage, $error_code),
                };

            case Constructors::MSGS_ACK:
                echo "[RECV] << msgs_ack (ignored)\n";
                return null;

            default:
                echo "[RECV] << Unhandled message (0x" . dechex($constructorId) . ")\n";
                return null;
        }
    }

    /**
     * Вспомогательный метод для разбора тела rpc_result (обработка gzip и rpc_error).
     * @return string Чистая полезная нагрузка.
     */
    private function processRpcResultBody(string &$stream): string
    {
        $peekConstructor = $this->deserializer->peekInt32($stream);

        if ($peekConstructor === Constructors::GZIP_PACKED) {
            return $this->deserializer->deserializeGzipPacked($stream);
        }

        if ($peekConstructor === Constructors::RPC_ERROR) {
            $this->deserializer->int32($stream);
            $errorCode = $this->deserializer->int32($stream);
            $errorMessage = $this->deserializer->bytes($stream);
            throw new RpcErrorException($errorCode, $errorMessage);
        }

        // Если не gzip и не ошибка, это наш объект
        return $stream;
    }

    private function sendAcksIfNeeded(): void
    {
        if ($this->authKey === null) return;

        $ackIds = $this->session->getAndClearAckQueue();
        if (empty($ackIds)) {
            return;
        }

        $ackPayload = $this->serializer->serializeMsgsAck($ackIds);

        // msgs_ack - это НЕ контентное сообщение
        [$encryptedAck, $messageId, $sequence] = $this->messagePacker->packEncrypted($ackPayload, $this->authKey, null, false);

        $this->transport->send($encryptedAck);

        echo "[SEND] >> {msgs_ack for " . count($ackIds) . " messages} (msg_id: {$messageId}, seqno: $sequence)\n";

        // Сохраняем сессию, так как packEncrypted использует, но не инкрементирует sequence
        $this->session->save($this->authKey);
    }
}