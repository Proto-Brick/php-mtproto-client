<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport;

use Amp\Future;
use Amp\Socket as AmpSocketNamespace;
use Amp\Socket\ConnectContext;
use Amp\Socket\Socket as AmpSocket;
use function Amp\async;
use Amp\TimeoutCancellation;
use DigitalStars\MtprotoClient\Exception\TransportException;
use DigitalStars\MtprotoClient\Settings;
use DigitalStars\MtprotoClient\Transport\Framing\AbridgedFramer;
use DigitalStars\MtprotoClient\Transport\Framing\FramerInterface;
use DigitalStars\MtprotoClient\Transport\Framing\IntermediateFramer;
use DigitalStars\MtprotoClient\Transport\Framing\IntermediatePaddedFramer;

class TcpTransport implements Transport
{
    /**
     * Underlying Amp socket instance.
     */
    private ?AmpSocket $socket = null;
    
    /**
     * Buffer for bytes read in excess of requested length.
     */
    private string $readBuffer = '';

    private FramerInterface $framer;

    /**
     * Body length announced by prefix for the NEXT receive() call and whether it includes random padding
     * (padded_intermediate).
     */
    private ?int $pendingBodyWireLength = null;
    private bool $useFramerForNextBody = false;

    public function __construct(private readonly Settings $settings)
    {
        $this->framer = match ($settings->transport) {
            TransportProtocol::Abridged => new AbridgedFramer(),
            TransportProtocol::PaddedIntermediate => new IntermediatePaddedFramer(),
            default => new IntermediateFramer(),
        };
    }

    public function isConnected(): bool
    {
        return $this->socket !== null && !$this->socket->isClosed();
    }

    public function connect(): Future
    {
        return async(function (): void {
            if ($this->socket !== null) {
                $this->close();
            }

            $uri = "tcp://{$this->settings->server_address}:{$this->settings->server_port}";

            try {
                $context = (new ConnectContext())
                    ->withTcpNoDelay();

                $this->socket = AmpSocketNamespace\connect(
                    $uri,
                    $context,
                    new TimeoutCancellation($this->settings->connect_timeout_seconds)
                );
            } catch (\Throwable $e) {
                throw new TransportException('Unable to connect: ' . $e->getMessage(), previous: $e);
            }

            echo "Connected to {$this->settings->server_address}:{$this->settings->server_port}\n";
            $this->readBuffer = '';

            // Отправляем приветственный заголовок выбранного протокола
            $this->send('', true)->await();
        });
    }

    public function send(string $payload, bool $isHeader = false): Future
    {
        return async(function () use ($payload, $isHeader): void {
            if ($this->socket === null || $this->socket->isClosed()) {
                throw new TransportException('Socket is not connected.');
            }

            try {
                if ($isHeader) {
                    $this->socket->write($this->framer->handshakeHeader());
                    return;
                }

                $this->socket->write($this->framer->frame($payload));
            } catch (\Throwable $e) {
                throw new TransportException('Failed to send data to socket: ' . $e->getMessage(), previous: $e);
            }
        });
    }

    public function receive(int $length): Future
    {
        return async(function () use ($length) {
            if ($this->socket === null || $this->socket->isClosed()) {
                throw new TransportException('Socket is not connected.');
            }

            // Специальная обработка для фрейминга: первый вызов receive(4)
            if ($length === 4) {
                $prefix = $this->framer->readPrefix(fn (int $n) => $this->readExactly($n));
                $this->pendingBodyWireLength = unpack('V', $prefix)[1];
                $this->useFramerForNextBody = true;
                return $prefix;
            }

            // Если ожидается тело с известной длиной (из префикса), читаем его особым образом
            if ($this->pendingBodyWireLength !== null && $length === $this->pendingBodyWireLength) {
                $data = $this->useFramerForNextBody
                    ? $this->framer->readBody(fn (int $n) => $this->readExactly($n), $length)
                    : $this->readExactly($length);
                $this->pendingBodyWireLength = null;
                $this->useFramerForNextBody = false;
                return $data;
            }

            // Обычное побайтное чтение на заданную длину
            return $this->readExactly($length);
        });
    }

    public function close(): void
    {
        if ($this->socket !== null) {
            $this->socket->close();
            $this->socket = null;
            $this->readBuffer = '';
            echo "Connection closed.\n";
        }
    }

    public function getSocket(): ?AmpSocket
    {
        return $this->socket;
    }

    private function readExactly(int $length): string
    {
        $data = '';
        $remaining = $length;

        // Сначала отдаем из readBuffer
        if ($this->readBuffer !== '') {
            if (\strlen($this->readBuffer) >= $remaining) {
                $data = substr($this->readBuffer, 0, $remaining);
                $this->readBuffer = (string) substr($this->readBuffer, $remaining);
                return $data;
            }
            $data = $this->readBuffer;
            $remaining -= \strlen($this->readBuffer);
            $this->readBuffer = '';
        }

        while ($remaining > 0) {
            try {
                $chunk = $this->socket->read();
            } catch (\Throwable $e) {
                throw new TransportException('Failed to read from socket: ' . $e->getMessage(), previous: $e);
            }

            if ($chunk === null) {
                throw new TransportException('Connection closed while reading.');
            }

            if (\strlen($chunk) > $remaining) {
                $data .= substr($chunk, 0, $remaining);
                $this->readBuffer = substr($chunk, $remaining);
                $remaining = 0;
                break;
            }

            $data .= $chunk;
            $remaining -= \strlen($chunk);
        }

        return $data;
    }

    private function readFramedPrefix(): string { return ''; }
}
