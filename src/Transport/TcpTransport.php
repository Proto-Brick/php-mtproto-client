<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport;

use function Amp\async;

use Amp\DeferredFuture;
use Amp\Future;
use Amp\TimeoutCancellation;
use DigitalStars\MtprotoClient\Exception\TransportException;
use DigitalStars\MtprotoClient\Settings;
use Revolt\EventLoop;

class TcpTransport implements Transport
{
    /** @var resource|null A stream resource */
    private $socket = null;

    public function __construct(private readonly Settings $settings) {}

    public function isConnected(): bool
    {
        return \is_resource($this->socket) && !feof($this->socket);
    }

    // ИЗМЕНЕНИЕ: connect() теперь асинхронный и возвращает Future
    public function connect(): Future
    {
        return async(function (): void {
            if ($this->socket !== null) {
                $this->close();
            }

            $uri = "tcp://{$this->settings->server_address}:{$this->settings->server_port}";
            $this->socket = @stream_socket_client($uri, $errno, $errstr, 5, STREAM_CLIENT_CONNECT | STREAM_CLIENT_ASYNC_CONNECT);

            if (!$this->socket) {
                throw new TransportException("Unable to create socket: {$errstr} ({$errno})");
            }
            stream_set_blocking($this->socket, false); // Явно устанавливаем неблокирующий режим

            $deferred = new DeferredFuture();
            $watcherId = EventLoop::onWritable($this->socket, static function (string $id) use ($deferred): void {
                EventLoop::cancel($id);
                if (!$deferred->isComplete()) {
                    $deferred->complete();
                }
            });

            try {
                // Асинхронно ждем подключения с таймаутом
                $deferred->getFuture()->await(new TimeoutCancellation(5));
            } catch (\Amp\TimeoutException) {
                EventLoop::cancel($watcherId); // Отменяем watcher при таймауте
                throw new TransportException("Connection timed out after 5 seconds.");
            }

            // Проверяем ошибки сокета после подключения
            if (stream_socket_get_name($this->socket, true) === false) {
                throw new TransportException("Failed to connect: Connection refused or other error.");
            }

            echo "Connected to {$this->settings->server_address}:{$this->settings->server_port}\n";

            // Отправляем заголовок и асинхронно ждем завершения отправки
            $this->send(hex2bin('eeeeeeee'), true)->await();
        });
    }

    public function send(string $payload, bool $isHeader = false): Future
    {
        return async(function () use ($payload, $isHeader): void {
            if (!\is_resource($this->socket)) {
                throw new TransportException("Socket is not connected.");
            }

            $packet = $isHeader ? $payload : pack('V', \strlen($payload)) . $payload;
            $totalLength = \strlen($packet);
            $sentLength = 0;

            while ($sentLength < $totalLength) {
                $bytesSent = @fwrite($this->socket, substr($packet, $sentLength));

                if ($bytesSent === false) {
                    throw new TransportException('Failed to send data to socket.');
                }
                if ($bytesSent === 0) {
                    // Буфер переполнен, асинхронно ждем, пока он освободится
                    $deferred = new DeferredFuture();
                    $watcherId = EventLoop::onWritable($this->socket, static function (string $id) use ($deferred): void {
                        EventLoop::cancel($id);
                        if (!$deferred->isComplete()) {
                            $deferred->complete();
                        }
                    });
                    try {
                        $deferred->getFuture()->await();
                    } finally {
                        EventLoop::cancel($watcherId); // Гарантированная отмена watcher'а
                    }
                    continue;
                }
                $sentLength += $bytesSent;
            }
        });
    }

    public function receive(int $length): Future
    {
        return async(function () use ($length) {
            if (!\is_resource($this->socket)) {
                throw new TransportException("Socket is not connected.");
            }

            $data = '';
            $remaining = $length;

            $deferred = new DeferredFuture();
            $watcherId = null;
            try {
                $watcherId = EventLoop::onReadable($this->socket, function (string $id) use (&$data, &$remaining, $deferred): void {
                    $chunk = @fread($this->socket, $remaining);

                    if ($chunk === false) {
                        EventLoop::cancel($id);
                        $deferred->error(new TransportException("Failed to read from socket."));
                        return;
                    }
                    if ($chunk === '') {
                        EventLoop::cancel($id);
                        $deferred->error(new TransportException("Connection closed while reading."));
                        return;
                    }

                    $data .= $chunk;
                    $remaining -= \strlen($chunk);

                    if ($remaining <= 0) {
                        EventLoop::cancel($id);
                        if (!$deferred->isComplete()) {
                            $deferred->complete($data);
                        }
                    }
                });
                // Ждем, пока колбэк не завершит Future
                return $deferred->getFuture()->await();
            } finally {
                if ($watcherId !== null) {
                    EventLoop::cancel($watcherId);
                }
            }
        });
    }

    public function close(): void
    {
        if (\is_resource($this->socket)) {
            @fclose($this->socket);
            $this->socket = null;
            echo "Connection closed.\n";
        }
    }

    /** @return resource|null */
    public function getSocketResource()
    {
        return $this->socket;
    }
}
