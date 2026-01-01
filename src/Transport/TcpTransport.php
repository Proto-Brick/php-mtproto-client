<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport;

use Amp\Future;
use Amp\Socket as AmpSocketNamespace;
use Amp\Socket\ConnectContext;
use Amp\Socket\Socket as AmpSocket;
use function Amp\async;
use Amp\TimeoutCancellation;
use ProtoBrick\MTProtoClient\Exception\TransportException;
use ProtoBrick\MTProtoClient\Settings;
use ProtoBrick\MTProtoClient\Transport\Framing\AbridgedFramer;
use ProtoBrick\MTProtoClient\Transport\Framing\FramerInterface;
use ProtoBrick\MTProtoClient\Transport\Framing\IntermediateFramer;
use ProtoBrick\MTProtoClient\Transport\Framing\IntermediatePaddedFramer;
use ProtoBrick\MTProtoClient\Transport\Security\Obfuscator; // <-- Новый путь
use ProtoBrick\MTProtoClient\Transport\Stream\SocketStreamAdapter;
use ProtoBrick\MTProtoClient\Transport\Stream\StreamInterface;

class TcpTransport implements TransportInterface
{
    private ?StreamInterface $stream = null;
    private string $readBuffer = '';
    private FramerInterface $framer;

    /** @var int|null Ожидаемая длина тела пакета (из префикса) */
    private ?int $pendingBodyWireLength = null;

    /** @var bool Нужно ли декодировать следующее чтение через Framer (убрать паддинг) */
    private bool $useFramerForNextBody = false;

    public function __construct(
        private readonly Settings $settings,
        private readonly Obfuscator $obfuscator = new Obfuscator()
    ) {
        $this->framer = match ($settings->transport) {
            TransportProtocol::Abridged => new AbridgedFramer(),
            TransportProtocol::PaddedIntermediate => new IntermediatePaddedFramer(),
            default => new IntermediateFramer(),
        };

        // ВАЖНО: Obfuscated2 по стандарту Telegram работает поверх Padded Intermediate.
        // Если юзер включил Obfuscation, но выбрал другой транспорт, мы могли бы принудительно менять фреймер,
        // но здесь оставим выбор за пользователем (или Settings).
    }

    public function isConnected(): bool
    {
        return $this->stream !== null && !$this->stream->isClosed();
    }

    public function connect(): Future
    {
        return async(function (): void {
            if ($this->stream !== null) {
                $this->close();
            }

            $uri = "tcp://{$this->settings->server_address}:{$this->settings->server_port}";

            try {
                $context = (new ConnectContext())->withTcpNoDelay();

                /** @var AmpSocket $rawSocket */
                $rawSocket = AmpSocketNamespace\connect(
                    $uri,
                    $context,
                    new TimeoutCancellation($this->settings->connect_timeout_seconds)
                );

                if ($this->settings->use_obfuscation) {
                    $this->stream = $this->obfuscator->handshake(
                        $rawSocket,
                        $this->framer->handshakeHeader(),
                        $this->settings->obfuscation_secret,
                        $this->settings->dc_id
                    );
                } else {
                    $this->stream = new SocketStreamAdapter($rawSocket);
                }

            } catch (\Throwable $e) {
                throw new TransportException('Unable to connect: ' . $e->getMessage(), previous: $e);
            }

            $this->readBuffer = '';

            // Если используем Obfuscated2, тег уже ушел внутри handshake пакета.
            // Если соединение чистое (Cleartext) — шлем тег первым отдельным сообщением.
            if (!$this->settings->use_obfuscation) {
                $this->send('', true)->await();
            }
        });
    }

    public function send(string $payload, bool $isHeader = false): Future
    {
        return async(function () use ($payload, $isHeader): void {
            if ($this->stream === null || $this->stream->isClosed()) {
                throw new TransportException('Stream is not connected.');
            }

            try {
                if ($isHeader) {
                    $this->stream->write($this->framer->handshakeHeader());
                    return;
                }

                $frame = $this->framer->frame($payload);
                $this->stream->write($frame);
            } catch (\Throwable $e) {
                throw new TransportException('Failed to write data: ' . $e->getMessage(), previous: $e);
            }
        });
    }

    public function receive(int $length): Future
    {
        return async(function () use ($length) {
            if ($this->stream === null || $this->stream->isClosed()) {
                throw new TransportException('Stream is not connected.');
            }

            // 1. Читаем длину пакета (Prefix)
            if ($length === 4) {
                // Если мы в Padded режиме, префикс может содержать случайную длину
                // Фреймер знает, как ее прочитать
                $prefix = $this->framer->readPrefix(fn (int $n) => $this->readExactly($n));
                $this->pendingBodyWireLength = unpack('V', $prefix)[1];
                $this->useFramerForNextBody = true;
                return $prefix;
            }

            // 2. Читаем тело пакета
            if ($this->pendingBodyWireLength !== null && $length === $this->pendingBodyWireLength) {
                // Фреймер читает "грязные" данные (с паддингом) и возвращает чистые
                $data = $this->useFramerForNextBody
                    ? $this->framer->readBody(fn (int $n) => $this->readExactly($n), $length)
                    : $this->readExactly($length);

                $this->pendingBodyWireLength = null;
                $this->useFramerForNextBody = false;
                return $data;
            }

            return $this->readExactly($length);
        });
    }

    public function close(): void
    {
        if ($this->stream !== null) {
            $this->stream->close();
            $this->stream = null;
            $this->readBuffer = '';
        }
    }

    public function getSocket(): ?AmpSocket
    {
        return null; // Абстракция скрывает нативный сокет
    }

    private function readExactly(int $length): string
    {
        $data = '';
        $remaining = $length;

        // Читаем из буфера
        if ($this->readBuffer !== '') {
            if (strlen($this->readBuffer) >= $remaining) {
                $data = substr($this->readBuffer, 0, $remaining);
                $this->readBuffer = (string) substr($this->readBuffer, $remaining);
                return $data;
            }
            $data = $this->readBuffer;
            $remaining -= strlen($this->readBuffer);
            $this->readBuffer = '';
        }

        // Дочитываем из сети
        while ($remaining > 0) {
            try {
                $chunk = $this->stream->read();
            } catch (\Throwable $e) {
                throw new TransportException('Read error: ' . $e->getMessage(), previous: $e);
            }

            if ($chunk === null) {
                throw new TransportException('Connection closed (EOF).');
            }

            $chunkLen = strlen($chunk);
            if ($chunkLen > $remaining) {
                $data .= substr($chunk, 0, $remaining);
                $this->readBuffer = substr($chunk, $remaining);
                $remaining = 0;
                break;
            }

            $data .= $chunk;
            $remaining -= $chunkLen;
        }

        return $data;
    }
}