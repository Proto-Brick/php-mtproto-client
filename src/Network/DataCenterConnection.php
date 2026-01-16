<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network;

use Amp\Future;
use Amp\Sync\LocalMutex;
use ProtoBrick\MTProtoClient\Logger\LogChannel;
use ProtoBrick\MTProtoClient\Peer\PeerManager;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use Psr\Log\LoggerInterface;
use Revolt\EventLoop;
use ProtoBrick\MTProtoClient\Auth\AuthKey;
use ProtoBrick\MTProtoClient\Exception\TransportException;
use ProtoBrick\MTProtoClient\Network\MTProto\PacketDecrypter;
use ProtoBrick\MTProtoClient\Network\MTProto\PacketEncrypter;
use ProtoBrick\MTProtoClient\Network\MTProto\SessionState;
use ProtoBrick\MTProtoClient\Network\Rpc\RpcClient;
use ProtoBrick\MTProtoClient\Settings;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\MTProto\PingDelayDisconnectRequest;
use ProtoBrick\MTProtoClient\Transport\TransportInterface;

use function Amp\async;
use function Amp\delay;

class DataCenterConnection
{
    private PacketEncrypter $encrypter;
    private PacketDecrypter $decrypter;
    public RpcClient $rpcClient;

    private bool $isConnected = false;

    private bool $isReconnecting = false;

    private ?string $pingTimerId = null;
    private LocalMutex $connectMutex;

    private \Closure|null $onUpdateHandler = null;

    public ?\Closure $onReconnect = null;

    public function __construct(
        public readonly int $dcId,
        private readonly Settings $settings,
        private readonly TransportInterface $transport,
        public readonly AuthKey $authKey,
        private readonly SessionState $sessionState,
        private readonly PeerManager $peerManager,
        private readonly LoggerInterface $logger
    ) {
        $this->encrypter = new PacketEncrypter($sessionState);
        $this->decrypter = new PacketDecrypter($sessionState);
        $this->rpcClient = new RpcClient($this, $this->logger);
        $this->connectMutex = new LocalMutex();
    }

    public function sendPacket(string $payload, bool $isContentRelated = true): Future
    {
        return async(function () use ($payload, $isContentRelated): array {
            if (!$this->isConnected) {
                $this->connect()->await();
            }

            $isPing = str_starts_with($payload, "\x8c\x7b\x42\xf3");

            if (!$isPing && !$this->sessionState->isInitialized()) {
                $payload = Serializer::wrapWithInitConnection(
                    query: $payload,
                    // We pass 0 here to instruct the Serializer to automatically use the current API Layer version.
                    // This value is retrieved from the auto-generated constant ProtoBrick\MTProtoClient\Generated\TL_Layer::VERSION,
                    // which is derived from the schema filename (e.g., TL_telegram_v220.json) during the build process.
                    layer: 0,
                    apiId: $this->settings->api_id
                );
                $this->sessionState->setInitialized(true);
            }

            [$encrypted, $msgId, $seqNo, $timeMs] = $this->encrypter->encrypt($payload, $this->authKey, $isContentRelated);

            try {
                $this->transport->send($encrypted)->await();
            } catch (\Throwable $e) {
                $this->isConnected = false;
                $this->triggerReconnect();

                // Бросаем исключение, чтобы RpcClient знал, что отправка не удалась
                throw new TransportException("Write failed", 0, $e);
            }

            return [$msgId, $seqNo, $timeMs];
        });
    }

    public function connect(): Future
    {
        return async(function () {
            // Блокируем выполнение. Если идет реконнект, мы будем ждать здесь,
            // пока реконнект не отпустит мьютекс.
            $lock = $this->connectMutex->acquire();

            try {
                if ($this->isConnected) {
                    return;
                }

                $this->logger->info("Connecting to DC{$this->dcId}...", [
                    'channel' => LogChannel::NET,
                    'address' => $this->settings->server_address,
                    'mode' => $this->settings->use_obfuscation ? 'Obfuscated2' : 'Cleartext'
                ]);

                $this->transport->connect()->await();
                $this->isConnected = true;

                $this->logger->info("Connected to DC{$this->dcId}", ['channel' => LogChannel::NET]);

                $this->startPingLoop();
                $this->readLoop();
            } catch (\Throwable $e) {
                $this->logger->error("Connection failed", [
                    'channel' => LogChannel::NET,
                    'exception' => $e
                ]);
                throw $e;
            } finally {
                $lock->release();
            }
        });
    }

    private function triggerReconnect(): void
    {
        // Проверка флага БЕЗ блокировки, чтобы мгновенно отсечь лишние вызовы
        if ($this->isReconnecting) {
            return;
        }

        EventLoop::queue(function () {
            $this->reconnectLoop()->await();
        });
    }

    private function reconnectLoop(): Future
    {
        return async(function () {
            // Double-check внутри асинхронного контекста
            if ($this->isReconnecting) {
                return;
            }
            $this->isReconnecting = true;

            // Захватываем мьютекс. Это гарантирует, что никто не вызовет connect(),
            // пока мы восстанавливаем связь.
            $lock = $this->connectMutex->acquire();

            try {
                $this->isConnected = false;
                $this->stopPingLoop();
                $this->transport->close();

                $this->logger->warning("Connection lost, starting reconnect...", [
                    'channel' => LogChannel::NET,
                    'dc' => $this->dcId
                ]);

                $this->sessionState->setInitialized(false);

                $attempt = 0;
                while (true) {
                    $attempt++;
                    $delaySec = min(30, 2 ** ($attempt - 1));

                    try {
                        // connect() здесь вызывать нельзя, так как мы уже держим лок!
                        // Вызываем транспорт напрямую.
                        $this->transport->connect()->await();

                        $this->isConnected = true;

                        $this->logger->info("Connection restored", [
                            'channel' => LogChannel::NET,
                            'dc' => $this->dcId,
                            'attempts' => $attempt
                        ]);

                        $this->startPingLoop();
                        $this->readLoop();

                        if ($this->onReconnect) {
                            async($this->onReconnect)->ignore();
                        }

                        break;
                    } catch (\Throwable $e) {
                        $this->logger->notice("Reconnect attempt failed", [
                            'channel' => LogChannel::NET,
                            'attempt' => $attempt,
                            'retry_in' => $delaySec . 's',
                            'error' => $e->getMessage()
                        ]);
                        delay($delaySec);
                    }
                }
            } finally {
                $this->isReconnecting = false;
                $lock->release();
            }

            if ($this->isConnected) {
                $this->rpcClient->resendAll();
            }
        });
    }

    private function readLoop(): void
    {
        async(function (): void {
            try {
                while ($this->isConnected) {
                    $lengthBytes = $this->transport->receive(4)->await();
                    if ($lengthBytes === null) {
                        throw new TransportException("EOF");
                    }

                    // Исправлено на 'V' (Little Endian)
                    $unpacked = unpack('V', $lengthBytes);
                    if (!$unpacked) {
                        throw new TransportException("Bad length");
                    }
                    $length = $unpacked[1];

                    if ($length <= 0 || $length > 2 * 1024 * 1024) {
                        throw new TransportException("Invalid packet length: $length");
                    }

                    $body = $this->transport->receive($length)->await();
                    if ($body === null) {
                        throw new TransportException("EOF body");
                    }

                    $decoded = $this->decrypter->decrypt($body, $this->authKey);
                    $this->rpcClient->handleMessage($decoded);
                }
            } catch (\Throwable $e) {
                if ($this->isConnected) {
                    $this->logger->error("Read loop error", [
                        'channel' => LogChannel::NET,
                        'exception' => $e
                    ]);
                    $this->isConnected = false;
                    $this->triggerReconnect();
                }
            }
        });
    }

    private function startPingLoop(): void
    {
        if ($this->pingTimerId !== null) {
            EventLoop::cancel($this->pingTimerId);
        }

        $this->pingTimerId = EventLoop::repeat(60, function () {
            if (!$this->isConnected) {
                return;
            }

            $future = $this->rpcClient->send(
                new PingDelayDisconnectRequest(random_int(1, PHP_INT_MAX), 75),
                timeout: 10,
            );

            async(function() use ($future) {
                try {
                    $future->await();
                } catch (\Throwable $e) {
                    $this->logger->warning("Ping failed (Zombie connection detected). Reconnecting...", [
                        'channel' => LogChannel::NET,
                        'error' => $e->getMessage()
                    ]);

                    $this->isConnected = false;
                    $this->triggerReconnect();
                }
            })->ignore();
        });
    }

    private function stopPingLoop(): void
    {
        if ($this->pingTimerId !== null) {
            EventLoop::cancel($this->pingTimerId);
            $this->pingTimerId = null;
        }
    }

    public function updateSalt(int $newSalt): void
    {
        $this->sessionState->setServerSalt($newSalt);
    }

    public function getSessionState(): SessionState
    {
        return $this->sessionState;
    }

    public function getPeerManager(): PeerManager
    {
        return $this->peerManager;
    }

    /**
     * Устанавливает глобальный обработчик обновлений (от Client).
     */
    public function setOnUpdateHandler(callable $handler): void
    {
        $this->onUpdateHandler = $handler;
    }

    public function onUpdateReceived(object $update): void
    {
        if ($this->onUpdateHandler) {
            async(function() use ($update) {
                try {
                    ($this->onUpdateHandler)($update);
                } catch (\Throwable $e) {
                    $this->logger->error("User update handler crashed!", [
                        'channel' => LogChannel::APP,
                        'exception' => $e
                    ]);
                }
            })->ignore();
        }
    }

    public function call(RpcRequest $request, int $timeout = 30): Future
    {
        return $this->rpcClient->send($request, $timeout);
    }

    public function close(): void
    {
        $this->isConnected = false;
        $this->stopPingLoop();

        try {
            $this->transport->close();
        } catch (\Throwable $e) {
        }
    }
}