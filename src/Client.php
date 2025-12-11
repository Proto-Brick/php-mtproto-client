<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use function Amp\async;

use Amp\DeferredFuture;

use function Amp\delay;

use Amp\Future;
use Amp\TimeoutCancellation;
use ProtoBrick\MTProtoClient\Auth\AuthKey;
use ProtoBrick\MTProtoClient\Auth\AuthKeyCreator;
use ProtoBrick\MTProtoClient\Auth\Storage\AuthKeyStorage;
use ProtoBrick\MTProtoClient\Exception\AuthKeyNotFoundOnServerErrorException;
use ProtoBrick\MTProtoClient\Exception\ResendRequiredException;
use ProtoBrick\MTProtoClient\Exception\RpcErrorException;
use ProtoBrick\MTProtoClient\Exception\TransportException;
use ProtoBrick\MTProtoClient\Session\Session;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\MTProto\Constructors;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\Transport\Transport;
use Revolt\EventLoop;

// #-- API_HANDLERS_USE_START --#
use ProtoBrick\MTProtoClient\Generated\Api\AccountMethods;
use ProtoBrick\MTProtoClient\Generated\Api\AuthMethods;
use ProtoBrick\MTProtoClient\Generated\Api\BotsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\ChannelsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\ChatlistsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\ContactsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\FoldersMethods;
use ProtoBrick\MTProtoClient\Generated\Api\FragmentMethods;
use ProtoBrick\MTProtoClient\Generated\Api\HelpMethods;
use ProtoBrick\MTProtoClient\Generated\Api\LangpackMethods;
use ProtoBrick\MTProtoClient\Generated\Api\MessagesMethods;
use ProtoBrick\MTProtoClient\Generated\Api\PaymentsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\PhoneMethods;
use ProtoBrick\MTProtoClient\Generated\Api\PhotosMethods;
use ProtoBrick\MTProtoClient\Generated\Api\PremiumMethods;
use ProtoBrick\MTProtoClient\Generated\Api\SmsjobsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\StatsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\StickersMethods;
use ProtoBrick\MTProtoClient\Generated\Api\StoriesMethods;
use ProtoBrick\MTProtoClient\Generated\Api\UpdatesMethods;
use ProtoBrick\MTProtoClient\Generated\Api\UploadMethods;
use ProtoBrick\MTProtoClient\Generated\Api\UsersMethods;
// #-- API_HANDLERS_USE_END --#


/**
 * Основной класс клиента для взаимодействия с MTProto API.
 *
 * #-- API_HANDLERS_DOCBLOCK_START --#
 * @property-read AccountMethods $account
 * @property-read AuthMethods $auth
 * @property-read BotsMethods $bots
 * @property-read ChannelsMethods $channels
 * @property-read ChatlistsMethods $chatlists
 * @property-read ContactsMethods $contacts
 * @property-read FoldersMethods $folders
 * @property-read FragmentMethods $fragment
 * @property-read HelpMethods $help
 * @property-read LangpackMethods $langpack
 * @property-read MessagesMethods $messages
 * @property-read PaymentsMethods $payments
 * @property-read PhoneMethods $phone
 * @property-read PhotosMethods $photos
 * @property-read PremiumMethods $premium
 * @property-read SmsjobsMethods $smsjobs
 * @property-read StatsMethods $stats
 * @property-read StickersMethods $stickers
 * @property-read StoriesMethods $stories
 * @property-read UpdatesMethods $updates
 * @property-read UploadMethods $upload
 * @property-read UsersMethods $users
 * #-- API_HANDLERS_DOCBLOCK_END --#
 */
class Client
{
    // #-- API_HANDLERS_PROPERTIES_START --#
    public readonly AccountMethods $account;
    public readonly AuthMethods $auth;
    public readonly BotsMethods $bots;
    public readonly ChannelsMethods $channels;
    public readonly ChatlistsMethods $chatlists;
    public readonly ContactsMethods $contacts;
    public readonly FoldersMethods $folders;
    public readonly FragmentMethods $fragment;
    public readonly HelpMethods $help;
    public readonly LangpackMethods $langpack;
    public readonly MessagesMethods $messages;
    public readonly PaymentsMethods $payments;
    public readonly PhoneMethods $phone;
    public readonly PhotosMethods $photos;
    public readonly PremiumMethods $premium;
    public readonly SmsjobsMethods $smsjobs;
    public readonly StatsMethods $stats;
    public readonly StickersMethods $stickers;
    public readonly StoriesMethods $stories;
    public readonly UpdatesMethods $updates;
    public readonly UploadMethods $upload;
    public readonly UsersMethods $users;

    #-- API_HANDLERS_PROPERTIES_END --#
    private const ACK_TIMEOUT = 10;
    private ?AuthKey $authKey = null;

    /**
     * @var array<int, array{deferred: DeferredFuture, request: RpcRequest}>
     */
    private array $pendingRequests = [];

    private bool $isReadLoopRunning = false;
    private ?string $ackTimerWatcherId = null;

    public function __construct(
        private readonly Settings $settings,
        private readonly AuthKeyStorage $authKeyStorage,
        private readonly Session $session,
        private readonly Transport $transport,
        private readonly AuthKeyCreator $authKeyCreator,
        private readonly MessagePacker $messagePacker
    ) {
        // #-- API_HANDLERS_INIT_START --#
        $this->account = new AccountMethods($this);
        $this->auth = new AuthMethods($this);
        $this->bots = new BotsMethods($this);
        $this->channels = new ChannelsMethods($this);
        $this->chatlists = new ChatlistsMethods($this);
        $this->contacts = new ContactsMethods($this);
        $this->folders = new FoldersMethods($this);
        $this->fragment = new FragmentMethods($this);
        $this->help = new HelpMethods($this);
        $this->langpack = new LangpackMethods($this);
        $this->messages = new MessagesMethods($this);
        $this->payments = new PaymentsMethods($this);
        $this->phone = new PhoneMethods($this);
        $this->photos = new PhotosMethods($this);
        $this->premium = new PremiumMethods($this);
        $this->smsjobs = new SmsjobsMethods($this);
        $this->stats = new StatsMethods($this);
        $this->stickers = new StickersMethods($this);
        $this->stories = new StoriesMethods($this);
        $this->updates = new UpdatesMethods($this);
        $this->upload = new UploadMethods($this);
        $this->users = new UsersMethods($this);
        #-- API_HANDLERS_INIT_END --#
    }

    /**
     * Синхронный метод для удобного запуска.
     */
    public function connect(): void
    {
        Future\await([$this->connectAsync()]);
    }

    /**
     * Асинхронный метод, выполняющий всю логику подключения.
     */
    private function connectAsync(): Future
    {
        return async(function (): void {
            // ИСПРАВЛЕНИЕ: Все вызовы транспорта теперь асинхронны и ожидаются
            $this->transport->connect()->await();
            $this->authKey = $this->authKeyStorage->get();

            if ($this->authKey === null) {
                echo "AuthKey not found. Creating a new one...\n";
                $this->authKey = $this->authKeyCreator->create();
                $this->authKeyStorage->set($this->authKey);
                echo "New AuthKey created and saved.\n";
                $this->session->start($this->authKey);
            } else {
                echo "AuthKey loaded from storage.\n";
                $this->session->start($this->authKey);
            }

            $this->startReadLoop();
        });
    }

    public function callSync(RpcRequest $request, int $timeout = 30): mixed
    {
        if ($this->authKey === null) {
            throw new \LogicException("Not connected. Please call connect() first.");
        }
        return $this->call($request)->await(new TimeoutCancellation($timeout));
    }

    private function call(RpcRequest $request): Future
    {
        return async(function () use ($request) {
            $attempt = 1;
            $maxAttempts = 3;

            while ($attempt <= $maxAttempts) {
                $deferred = new DeferredFuture();
                try {
                    $this->sendPacketAndRegister($request, $deferred)->await();
                    return $deferred->getFuture()->await();
                } catch (ResendRequiredException $e) {
                    echo "[INFO] Resending request due to: {$e->getMessage()}. Attempt " . ($attempt) . "/{$maxAttempts}\n";
                    delay(0.1); // 100ms
                    $attempt++;
                    continue;
                } catch (TransportException $e) {
                    echo "[ERROR] Transport-level error: {$e->getMessage()}. Reconnecting...\n";
                    $this->handleConnectionFailure($e);
                    delay(1); // Короткая пауза перед переподключением
                    $attempt++;
                    continue;
                }
            }
            throw new \Exception("Request '{$request->getPredicate()}' failed after {$maxAttempts} attempts.");
        });
    }

    public function getSettings(): Settings
    {
        return $this->settings;
    }

    private function sendPacketAndRegister(RpcRequest $request, DeferredFuture $deferred): Future
    {
        return async(function () use ($request, $deferred): void {
            $ackIds = $this->session->getAndClearAckQueue();
            $time_stamp = microtime(true);
            $mainRequestPayload = $request->serialize();
            print "[Сериализация] " . $request->getPredicate() .' - ' . round((microtime(true) - $time_stamp)*1000, 2) . "ms\n";

            if (!$this->session->isInitialized) {
                $mainRequestPayload = Serializer::wrapWithInitConnection(
                    $mainRequestPayload,
                    211,
                    $this->settings->api_id,
                );
            }

            $finalMsgId = null;
            if (empty($ackIds)) {
                [$encryptedRequest, $finalMsgId, $sequence] = $this->messagePacker->packEncrypted(
                    $mainRequestPayload,
                    $this->authKey,
                    null,
                    true,
                );
                echo "[SEND] >> {$request->getPredicate()} (msg_id: {$finalMsgId}, seqno: $sequence)\n";
                $this->transport->send($encryptedRequest)->await();
            } else {
                $ackPayload = Serializer::serializeMsgsAck($ackIds);
                $messages = [
                    ['payload' => $ackPayload, 'is_content_related' => false],
                    ['payload' => $mainRequestPayload, 'is_content_related' => true, 'request_object' => $request],
                ];
                [$encryptedContainer, , , $rpcRequestMsgId, $seqno_main] = $this->messagePacker->packContainer(
                    $messages,
                    $this->authKey,
                );

                if ($rpcRequestMsgId === null) {
                    throw new \LogicException("Packer did not return RPC msg_id from container.");
                }
                $finalMsgId = $rpcRequestMsgId;

                echo "[SEND] >> Packing {$request->getPredicate()} with " . \count(
                    $ackIds,
                ) . " ACKs into a container. (msg_id: {$finalMsgId}, seqno: $seqno_main)\n";
                $this->transport->send($encryptedContainer)->await();
            }

            // Регистрируем запрос и deferred вместе.
            $this->pendingRequests[$finalMsgId] = ['deferred' => $deferred, 'request' => $request];
            $this->session->save($this->authKey);
            $this->resetAckTimer();
        });
    }

    public function shutdown(): void
    {
        $this->isReadLoopRunning = false;
        if ($this->ackTimerWatcherId) {
            EventLoop::cancel($this->ackTimerWatcherId);
            $this->ackTimerWatcherId = null;
        }
        $this->transport->close();
    }

    private function startReadLoop(): void
    {
        if ($this->isReadLoopRunning) {
            return;
        }
        $this->isReadLoopRunning = true;

        async(function (): void {
            while ($this->isReadLoopRunning && $this->transport->isConnected()) {
                try {
                    $prefixBytes = $this->transport->receive(4)->await();
                    $lengthOrError = unpack('l', $prefixBytes)[1];

                    if ($lengthOrError < 0) {
                        if ($lengthOrError === -404) {
                            throw new AuthKeyNotFoundOnServerErrorException("Server returned -404");
                        }
                        throw new TransportException("Transport error code: {$lengthOrError}");
                    }
                    if ($lengthOrError === 0) {
                        continue;
                    }

                    $packetPayload = $this->transport->receive($lengthOrError)->await();
                    $this->readAndProcessResponse($packetPayload);

                } catch (TransportException $e) {
                    echo "[ERROR] Read loop caught exception: {$e->getMessage()}. Reconnecting...\n";
                    $this->handleConnectionFailure($e);
                    delay(2); // ИСПРАВЛЕНИЕ: Ждем перед следующей попыткой

                    try {
                        $this->transport->connect()->await();
                        $this->isReadLoopRunning = true; // Возобновляем
                    } catch (\Throwable $reconnectError) {
                        echo "[ERROR] Failed to reconnect: {$reconnectError->getMessage()}\n";
                        $this->shutdown();
                        return;
                    }

                    continue; // Продолжаем цикл while
                } catch (\Throwable $e) {
                    echo "[FATAL] Unhandled error in read loop: {$e->getMessage()}\n";
                    $this->shutdown(); // Полностью останавливаемся при фатальной ошибке
                    return;
                }
            }
            $this->isReadLoopRunning = false;
            echo "Read loop has been stopped.\n";
        })->ignore();
    }

    private function handleConnectionFailure(\Throwable $e): void
    {
        foreach ($this->pendingRequests as $pending) {
            $pending['deferred']->error($e);
        }
        $this->pendingRequests = [];
        $this->transport->close();
        $this->isReadLoopRunning = false;
    }

    private function readAndProcessResponse(string $rawEncryptedResponse): void
    {
        if (empty($rawEncryptedResponse)) {
            return;
        }

        $unpacked = $this->messagePacker->unpackEncrypted($rawEncryptedResponse, $this->authKey);
        if ($unpacked['session_id'] !== $this->session->getId()) {
            echo "[WARN] Ignoring message from a previous session.\n";
            return;
        }

        $queueWasEmpty = empty($this->session->getAndClearAckQueue(false));

        $outer_msg_id = unpack('q', $unpacked['msg_id'])[1];
        if ($unpacked['seq_no'] % 2 !== 0) {
            $this->session->addToAckQueue($outer_msg_id);
        }

        $this->session->setTimeOffset((unpack('q', $unpacked['msg_id'])[1] >> 32) - time());
        $responsePayload = $unpacked['body'];
        $peekConstructor = Deserializer::peekConstructor($responsePayload);

        if ($peekConstructor !== 0xedab447b) { // bad_server_salt
            $this->session->setServerSalt(Deserializer::int64($unpacked['server_salt']));
        }

        $containerItems = [];
        if ($peekConstructor === Constructors::MSG_CONTAINER) {
            $containerItems = Deserializer::deserializeMessageContainer($responsePayload);
        } else {
            $containerItems[] = ['body' => $responsePayload, 'msg_id' => $outer_msg_id, 'seqno' => $unpacked['seq_no']];
        }

        foreach ($containerItems as $item) {
            if ($item['seqno'] % 2 !== 0 && $peekConstructor === Constructors::MSG_CONTAINER) {
                $this->session->addToAckQueue($item['msg_id']);
            }
            $this->handleSingleMessage($item['body']);
        }

        $queueIsNotEmpty = !empty($this->session->getAndClearAckQueue(false));

        if ($queueWasEmpty && $queueIsNotEmpty) {
            $this->resetAckTimer();
        }
    }

    private function handleSingleMessage(string &$messageBody): void
    {
        $constructorId = Deserializer::peekConstructor($messageBody);

        switch ($constructorId) {
            case Constructors::RPC_RESULT:
                Deserializer::int32($messageBody);
                $req_msg_id = Deserializer::int64($messageBody);

                if (!isset($this->pendingRequests[$req_msg_id])) {
                    echo "[WARN] << rpc_result for unknown or already completed msg_id: {$req_msg_id} (ignored)\n";
                    return;
                }

                ['deferred' => $deferred, 'request' => $request] = $this->pendingRequests[$req_msg_id];
                unset($this->pendingRequests[$req_msg_id]);

                echo "[RECV] << rpc_result for {$request->getPredicate()} (msg_id: {$req_msg_id})\n";

                try {
                    $resultPayload = $this->processRpcResultBody($messageBody);

                    $time_stamp = microtime(true);
                    $responseObject = $this->deserializeResponsePayload($request, $resultPayload);
                    print "[Десериализация] " . $request->getPredicate() .' - ' . round((microtime(true) - $time_stamp)*1000, 2) . "ms\n";

                    if (!$this->session->isInitialized) {
                        $this->session->isInitialized = true;
                        echo "[INFO] Session initialized.\n";
                    }
                    $this->session->save($this->authKey);
                    $deferred->complete($responseObject);
                } catch (\Throwable $e) {
                    $deferred->error($e);
                }
                return;
            case 0x276d3ec6: // updatesTooLong
            case 0xa56c2a3e: // updates.state
            case 0x74ae4240: // updates
            case 0x313bc7f8: // updateShortMessage
            case 0x4d6deea5: // updateShortChatMessage
            case 0x78d4dec1: // updateShort
                echo "[RECV] << Updates message (0x" . dechex($constructorId) . "), ignoring.\n";
                // В полноценном клиенте здесь был бы парсинг и обработка обновлений.
                // Мы же просто пропускаем, так как не работаем с ними.
                // Важно! Такой подход съест все тело сообщения, что может быть неверно,
                // если оно имеет сложную структуру. Проще всего обрабатывать каждый по отдельности.
                // Пока оставим только updatesTooLong.
                Deserializer::consumeConstructor($messageBody);
                return;

            case 0xedab447b: // bad_server_salt
                $saltData = Deserializer::deserializeBadServerSalt($messageBody);
                $newSalt = $saltData['new_server_salt'];
                $bad_msg_id = $saltData['bad_msg_id'];

                echo "[RECV] << bad_server_salt for msg_id {$bad_msg_id}. New salt: {$newSalt}.\n";

                // 1. Обновляем и сохраняем новую соль
                $this->session->setServerSalt($newSalt);
                $this->session->save($this->authKey);

                // 2. Ищем конкретный запрос, который вызвал ошибку
                $pending = $this->pendingRequests[$bad_msg_id] ?? null;
                if ($pending) {
                    ['deferred' => $deferred] = $pending;
                    unset($this->pendingRequests[$bad_msg_id]);

                    // 3. Проваливаем Future ТОЛЬКО для этого запроса
                    echo "[INFO] Failing future for msg_id {$bad_msg_id} to trigger resend.\n";
                    $deferred->error(new ResendRequiredException('bad_server_salt'));
                } else {
                    echo "[WARN] Received bad_server_salt for an unknown or already completed msg_id: {$bad_msg_id}.\n";
                }

                return;

            case 0x9ec20908: // new_session_created
                $sessionData = Deserializer::deserializeNewSessionCreated($messageBody);
                $newSalt = $sessionData['server_salt'];
                echo "[RECV] << new_session_created. New salt: {$newSalt}.\n";
                $this->session->setServerSalt($newSalt);
                $this->session->save($this->authKey);
                return;

            case 0xa7eff811: // bad_msg_notification
                Deserializer::consumeConstructor($messageBody);
                $bad_msg_id = Deserializer::int64($messageBody);
                Deserializer::int32($messageBody); // bad_msg_seqno
                $error_code = Deserializer::int32($messageBody);

                // 1. Находим deferred и request
                $pending = $this->pendingRequests[$bad_msg_id] ?? null;
                if ($pending) {
                    ['deferred' => $deferred, 'request' => $request] = $pending;
                    $requestName = $request->getPredicate();
                    unset($this->pendingRequests[$bad_msg_id]);
                } else {
                    $deferred = null;
                    $requestName = 'unknown_request';
                }

                echo "[RECV] << bad_msg_notification for msg_id {$bad_msg_id} (request: {$requestName}, error_code: {$error_code})\n";

                if (\in_array($error_code, [18, 19, 32, 33, 34, 35], true)) {
                    echo "[WARN] Critical session/seqno desynchronization (code {$error_code}). Resetting session.\n";
                    $old_salt = $this->session->getServerSalt();
                    $this->session->reset();
                    if ($old_salt) {
                        $this->session->setServerSalt($old_salt);
                    }
                    $this->session->save($this->authKey);

                    $exception = new ResendRequiredException("Critical session error (code {$error_code})");

                    echo "[INFO] Broadcasting ResendRequiredException to all pending requests.\n";
                    foreach ($this->pendingRequests as $pending) {
                        $pending['deferred']->error($exception);
                    }
                    $this->pendingRequests = []; // Очищаем старую очередь

                } else {
                    // Обработка остальных, менее критичных ошибок
                    $exception = match ($error_code) {
                        16, 17, 20, 48, 64 => new ResendRequiredException("Recoverable error (code {$error_code})"),
                        default => new TransportException("Fatal bad_msg_notification (code {$error_code})", $error_code),
                    };

                    // Проваливаем только один конкретный Future
                    if ($deferred) {
                        $deferred->error($exception);
                    }
                }
                return;

            case Constructors::MSGS_ACK:
                return;
            default:
                echo "[RECV] << Unhandled message (0x" . dechex($constructorId) . ")\n";
                return;
        }
    }

    /**
     * Отменяет старый таймер и запускает новый, если в очереди ACK есть что отправлять.
     * Вызывается после любой исходящей активности.
     */
    private function resetAckTimer(): void
    {
        // 1. Всегда отменяем предыдущий таймер.
        if ($this->ackTimerWatcherId) {
            EventLoop::cancel($this->ackTimerWatcherId);
            $this->ackTimerWatcherId = null;
        }

        // 2. Проверяем, есть ли вообще что отправлять. Если нет, ничего не делаем.
        // Используем getAndClearAckQueue(false) для "подглядывания" без очистки.
        if (empty($this->session->getAndClearAckQueue(false))) {
            return;
        }

        // 3. Есть что отправлять. Создаем таймер, который сработает ОДИН РАЗ через 10 секунд.
        $this->ackTimerWatcherId = EventLoop::delay(self::ACK_TIMEOUT, function (): void {
            echo "[INFO] 10s inactivity timeout reached. Sending pending acks.\n";
            $this->ackTimerWatcherId = null; // Сбрасываем ID, так как таймер одноразовый
            $this->sendAcksIfNeeded()->ignore();
        });
    }

    /**
     * Отправляет накопившиеся ACK'и. Вызывается только по таймеру.
     */
    private function sendAcksIfNeeded(): Future
    {
        return async(function (): void {
            if (!$this->authKey) {
                return;
            }
            $ackIds = $this->session->getAndClearAckQueue();
            if (empty($ackIds)) {
                return;
            }

            $ackPayload = Serializer::serializeMsgsAck($ackIds);
            [$encryptedAck, $messageId, $sequence] = $this->messagePacker->packEncrypted($ackPayload, $this->authKey, null, false);

            echo "[SEND] >> {standalone_acks for " . \count($ackIds) . " messages} (msg_id: {$messageId}, seqno: $sequence)\n";
            $this->transport->send($encryptedAck)->await();
            $this->session->save($this->authKey);

            $this->resetAckTimer();
        });
    }

    // Файл: /php-mtproto-client/src/Client.php

    // ... (внутри класса Client)

    private function deserializeResponsePayload(RpcRequest $request, string &$payload): mixed
    {
        $responseClassOrType = $request->getResponseClass();

        // --- ШАГ 1: Проверяем, ожидаем ли мы вектор ---
        if (str_starts_with($responseClassOrType, 'vector<')) {
            // Ожидаем вектор. Извлекаем FQCN внутреннего типа.
            $innerTypeFqn = substr($responseClassOrType, 7, -1);

            // Делегируем всю логику по работе с вектором нашему helper'у.
            return $this->deserializeVectorOfObjects($innerTypeFqn, $payload);
        }

        // --- ШАГ 2: Ожидаем одиночный объект или примитив ---

        // Это может быть FQCN сгенерированного класса
        if (class_exists($responseClassOrType)) {
            return $responseClassOrType::deserialize($payload);
        }

        // Это может быть примитив
        return match ($responseClassOrType) {
            'bool' => Deserializer::deserializeBool($payload),
            'int' => Deserializer::int32($payload),
            'long' => Deserializer::int64($payload),
            'string' => Deserializer::bytes($payload),
            default => throw new \Exception("Unsupported response type: '{$responseClassOrType}'"),
        };
    }

    private function deserializeVectorOfObjects(string $innerType, string &$payload): array
    {
        $classToDeserialize = $innerType;
        if (!class_exists($classToDeserialize)) {
            $parts = explode('\\', $classToDeserialize);
            $className = array_pop($parts);
            $namespace = implode('\\', $parts);
            $abstractClass = $namespace . '\Abstract' . $className;
            if (class_exists($abstractClass)) {
                $classToDeserialize = $abstractClass;
            } else {
                throw new \Exception("Cannot deserialize vector of unknown class: {$innerType}");
            }
        }
        return Deserializer::vectorOfObjects($payload, [$classToDeserialize, 'deserialize']);
    }

    private function processRpcResultBody(string &$stream): string
    {
        $peekConstructor = Deserializer::peekInt32($stream);
        if ($peekConstructor === Constructors::GZIP_PACKED) {
            return Deserializer::deserializeGzipPacked($stream);
        }
        if ($peekConstructor === Constructors::RPC_ERROR) {
            Deserializer::int32($stream);
            throw new RpcErrorException(Deserializer::int32($stream), Deserializer::bytes($stream));
        }
        return $stream;
    }
}
