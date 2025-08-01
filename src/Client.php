<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient;

use DigitalStars\MtprotoClient\Auth\AuthKey;
use DigitalStars\MtprotoClient\Auth\AuthKeyCreator;
use DigitalStars\MtprotoClient\Auth\Storage\AuthKeyStorage;
use DigitalStars\MtprotoClient\Exception\AuthKeyNotFoundOnServerErrorException;
use DigitalStars\MtprotoClient\Exception\ResendRequiredException;
use DigitalStars\MtprotoClient\Exception\RpcErrorException;
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
            $this->session->save($this->authKey);
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
     * @return TlObject Сгенерированный объект ответа
     * @throws Exception
     */
    public function call(TlObject $request): TlObject
    {
        if ($this->authKey === null) {
            throw new \LogicException("Not connected. Please call connect() first.");
        }

        // Инициализируем список ожидающих msg_id

        // Отправляем запрос и запоминаем его msg_id
        $msgId = $this->sendRequest($request);
        $this->pendingRequests[$msgId] = $request;

        print 'Pending msg_id: ' . $msgId . PHP_EOL;

        $timeout = 15;
        $startTime = time();
        while (time() - $startTime < $timeout) {
            try {
                $response = $this->readAndProcessResponse();
                if ($response instanceof TlObject) {
                    return $response;
                }
                usleep(100000); // Небольшая пауза, чтобы не грузить CPU
            } catch (ResendRequiredException $e) {
                $message = $e->getMessage();
                if ($message === 'new_session_created') {
                    echo "INFO: New session created. Resending request with a NEW msg_id...\n";
                } else {
                    $msgId = $this->sendRequest($request);
                    // 0c209c4778028c68
                    print 'Pending msg_id (внутри): ' . $msgId . PHP_EOL;
                    // 0cf025b0ad038c68 100007ccae038c68
                    $this->pendingRequests[$msgId] = $request;
                    echo "INFO: Bad server salt received. Resending request with a NEW msg_id...\n";
                }
            }
        }

        throw new \Exception("Timeout waiting for response to request with msg_id " . $msgIdHex);
    }

    /**
     * Собирает, шифрует и отправляет запрос.
     * @return string Бинарный msg_id отправленного сообщения.
     */
    private function sendRequest(TlObject $request, ?int $msgId = null): int
    {
        $payload = $request->serialize($this->serializer);

        if (!$this->session->isInitialized) {
            $layer = 195;
            $payload = $this->serializer->wrapWithInitConnection($payload, $layer, $this->settings->api_id);
        }

        [$encryptedRequest, $finalMsgId] = $this->messagePacker->packEncrypted($payload, $this->authKey, $msgId);

        $this->pendingRequests[$finalMsgId] = $request; // Сохраняем запрос с его msg_id

        $this->transport->send($encryptedRequest);

        return $finalMsgId;
    }

    /**
     * Читает один пакет из сети и обрабатывает его.
     * @return TlObject|null Возвращает объект ответа, если это был RPC-ответ на наш запрос.
     *                         Возвращает null, если это было обновление или сервисная информация.
     * @throws ResendRequiredException
     * @throws Exception
     */
    private function readAndProcessResponse(): ?TlObject
    {
        $rawEncryptedResponse = $this->transport->receive();
        if (empty($rawEncryptedResponse)) {
            return null;
        }

        if (\strlen($rawEncryptedResponse) === 4) {
            $errorCode = unpack('l', $rawEncryptedResponse)[1]; // Распаковываем как знаковое
            if ($errorCode < 0) {
                if ($errorCode === -404) {
                    throw new AuthKeyNotFoundOnServerErrorException("Server returned -404");
                }
                throw new TransportException("Transport error code: " . $errorCode);
            }
        }

        $unpacked = $this->messagePacker->unpackEncrypted($rawEncryptedResponse, $this->authKey);

        if ($unpacked['session_id'] !== $this->session->getId()) {
            throw new \RuntimeException("Session ID mismatch in response.");
        }

        $serverTime = unpack('q', $unpacked['msg_id'])[1] >> 32;
        $localTime = time();
        $this->session->setTimeOffset($serverTime - $localTime);

        $responsePayload = $unpacked['body'];

        $peekConstructor = $this->deserializer->peekInt32($responsePayload);
        if ($peekConstructor !== 0xedab447b) {
            $salt = $this->deserializer->int32($unpacked['server_salt']);
            $this->session->setServerSalt($salt);
        }

        $messagesToProcess = [];
        if ($peekConstructor === Constructors::MSG_CONTAINER) {
            $container = $this->deserializer->deserializeMessageContainer($responsePayload);
            foreach ($container as $message) {
                $messagesToProcess[] = $message['body'];
            }
        } else {
            $messagesToProcess[] = $responsePayload;
        }

        $finalResponse = null;
        foreach ($messagesToProcess as $messageBody) {
            $response = $this->handleSingleMessage($messageBody);
            if ($response instanceof TlObject) {
                $finalResponse = $response;
            }
        }

        return $finalResponse;
    }

    /**
     * Обрабатывает одно TL-сообщение (из контейнера или одиночное).
     */
    private function handleSingleMessage(string &$messageBody): ?TlObject
    {
        $originalMessageBodyForDebug = $messageBody; // Сохраняем копию для лога
        $constructorId = $this->deserializer->peekInt32($messageBody);
        $constructorHex = dechex($constructorId);

        echo "\n--- [ handleSingleMessage ] ---\n";
        echo "Processing message body (len=" . \strlen($originalMessageBodyForDebug) . ")...\n";
        echo "Detected constructor: 0x{$constructorHex}\n";

        switch ($constructorId) {
            case Constructors::RPC_RESULT: // 0xf35c6d01
                echo "Type: rpc_result\n";
                $this->deserializer->int32($messageBody); // съедаем ID
                $req_msg_id = $this->deserializer->int64($messageBody);


                echo "  > req_msg_id: {$req_msg_id}\n";
                echo "  > Pending requests: [" . implode(', ', array_keys($this->pendingRequests)) . "]\n";


                if (!isset($this->pendingRequests[$req_msg_id])) {
                    echo "Decision: UNKNOWN request. Ignoring.\n";
                    echo "-----------------------------\n";
                    return null;
                }

                $request = $this->pendingRequests[$req_msg_id];
                unset($this->pendingRequests[$req_msg_id]);
                echo "  > Matched pending request: {$request->getPredicate()}\n";

                try {
                    $resultPayload = $this->processRpcResultBody($messageBody);
                } catch (\Exception $e) {
                    echo "Decision: ERROR inside rpc_result. Rethrowing.\n";
                    echo "-----------------------------\n";
                    throw $e;
                }

                if (!$this->session->isInitialized) {
                    $this->session->isInitialized = true;
                    echo "  > Session marked as INITIALIZED.\n";
                }

                $this->session->save($this->authKey);

                $responseClassOrType = $request->getResponseClass();
                echo "Decision: Processing response for {$responseClassOrType}...\n";

                // Проверяем, является ли ответ именем класса или строкой-примитивом
                if (class_exists($responseClassOrType)) {
                    // Это класс, десериализуем как объект
                    echo "  > Type: Object. Deserializing...\n";
                    echo "-----------------------------\n";
                    return $responseClassOrType::deserialize($this->deserializer, $resultPayload);
                }

                // Это примитивный тип, используем специальный десериализатор
                echo "  > Type: Primitive. Deserializing...\n";
                echo "-----------------------------\n";
                switch ($responseClassOrType) {
                    case 'bool':
                        // Bool в TL - это конструктор boolTrue или boolFalse
                        $constructorId = $this->deserializer->int32($resultPayload);
                        if ($constructorId === 0x997275b5) { // boolTrue
                            return true;
                        }
                        if ($constructorId === 0xbc799737) { // boolFalse
                            return false;
                        }
                        throw new \Exception("Expected bool, but got constructor " . dechex($constructorId));

                    case 'int':
                        // Ответы типа Vector<int> или просто int
                        $constructorId = $this->deserializer->peekInt32($resultPayload);
                        if ($constructorId === 0x1cb5c415) { // Vector
                            return $this->deserializer->vectorOfInts($resultPayload);
                        }
                        // Если это просто int, его нужно как-то обработать.
                        // Пока предположим, что API не возвращает голый int.
                        // Если возвращает, нужно будет добавить логику.
                        throw new \Exception("Plain int response is not yet supported.");

                        // Можно добавить обработку для других примитивов (string, array) если понадобится
                    default:
                        throw new \Exception("Unsupported primitive response type: {$responseClassOrType}");
                }

            case 0xedab447b: // bad_server_salt
                echo "Type: bad_server_salt\n";
                $salt_data = $this->deserializer->deserializeBadServerSalt($messageBody);
                $this->session->setServerSalt($salt_data['new_server_salt']);
                $badMsgIdHex = $salt_data['bad_msg_id'];
                $this->session->save($this->authKey);

                echo "  > bad_msg_id: {$badMsgIdHex}\n";
                echo "  > New server salt received: " . $salt_data['new_server_salt'] . "\n";
                echo "Decision: THROW ResendRequiredException.\n";
                echo "-----------------------------\n";
                throw new ResendRequiredException((string) $badMsgIdHex);

            case 0x9ec20908: // new_session_created
                echo "Type: new_session_created\n";
                $session_data = $this->deserializer->deserializeNewSessionCreated($messageBody);
                //$this->session->resetSequence(); // Не сбрасывать! Это счетчик локальной сессии
                $this->session->isInitialized = false;
                $this->session->setServerSalt($session_data['server_salt']);
                $this->session->save($this->authKey);

                echo "  > New server salt received: " . $session_data['server_salt'] . "\n";
                echo "  > Session marked as NOT INITIALIZED.\n";
                echo "Decision: THROW ResendRequiredException (for 'new_session_created').\n";
                echo "-----------------------------\n";

                //                $this->pendingRequests = []; <-- НЕПРАВИЛЬНО, new_session_created не значит, что ответ на текущий запрос не прилет
                throw new ResendRequiredException('new_session_created');

            case 0xa7eff811: // bad_msg_notification
                echo "Type: bad_msg_notification\n";
                $this->deserializer->int32($messageBody);
                $req_msg_id = $this->deserializer->int64($messageBody);
                $bad_msg_seqno = $this->deserializer->int32($messageBody);
                $error_code = $this->deserializer->int32($messageBody);
                echo "  > bad_msg_id: " . $req_msg_id . "\n";
                echo "  > error_code: " . $error_code . "\n";
                echo "Decision: IGNORE.\n";
                echo "-----------------------------\n";
                return null;

            case Constructors::MSGS_ACK:
                echo "Type: msgs_ack (acknowledgement)\n";
                echo "Decision: IGNORE.\n";
                echo "-----------------------------\n";
                return null;

            default:
                echo "Type: UNHANDLED\n";
                echo "Decision: IGNORE.\n";
                echo "-----------------------------\n";
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

        if ($peekConstructor === 0x3072cfa1) { // gzip_packed
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
}
