<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport;

use DigitalStars\MtprotoClient\Exception\AuthKeyNotFoundOnServerErrorException;
use DigitalStars\MtprotoClient\Exception\TransportException;
use DigitalStars\MtprotoClient\Settings;

class TcpTransport implements Transport
{
    private ?\Socket $socket = null;

    public function __construct(private readonly Settings $settings) {}

    public function isConnected(): bool
    {
        return $this->socket !== null;
    }

    public function connect(): void
    {
        if ($this->socket !== null) {
            $this->close();
        }

        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false) {
            throw new TransportException('Socket creation failed: ' . socket_strerror(socket_last_error()));
        }
        if (!socket_connect($this->socket, $this->settings->server_address, $this->settings->server_port)) {
            throw new TransportException('Socket connection failed: ' . socket_strerror(socket_last_error()));
        }
        socket_set_option($this->socket, SOL_SOCKET, SO_RCVTIMEO, ["sec" => 15, "usec" => 0]);
        // Отправляем заголовок Intermediate транспорта один раз
        socket_write($this->socket, hex2bin('eeeeeeee'), 4);
        echo "Connected to {$this->settings->server_address}:{$this->settings->server_port}\n";
    }

    public function send(string $payload): void
    {
        if ($this->socket === null) {
            throw new TransportException("Socket is not connected.");
        }
        $packet = pack('V', \strlen($payload)) . $payload;
        //        echo "DEBUG: Sending " . strlen($packet) . " bytes: " . bin2hex($packet) . "\n";
        if (socket_write($this->socket, $packet, \strlen($packet)) === false) {
            throw new TransportException('Failed to send data: ' . socket_strerror(socket_last_error($this->socket)));
        }
    }

    public function receive(): string
    {
        if ($this->socket === null) {
            throw new TransportException("Socket is not connected.");
        }

        // 1. Читаем первые 4 байта, как и раньше.
        $prefix_bytes = socket_read($this->socket, 4);
        if ($prefix_bytes === false || \strlen($prefix_bytes) < 4) {
            $errorCode = socket_last_error($this->socket);
            throw new TransportException("Failed to read response prefix from socket: " . socket_strerror($errorCode), $errorCode);
        }

        // --- НАЧАЛО ИСПРАВЛЕНИЯ ---

        // 2. Распаковываем как ЗНАКОВОЕ 32-битное число ('l') для проверки на ошибку.
        $prefix_as_signed_int = unpack('l', $prefix_bytes)[1];

        // 3. Проверяем, не является ли это кодом транспортной ошибки.
        if ($prefix_as_signed_int < 0) {
            if ($prefix_as_signed_int === -404) {
                // Это ошибка AUTH_KEY_NOT_FOUND. Бросаем кастомное исключение,
                // чтобы на верхнем уровне можно было правильно среагировать.
                throw new AuthKeyNotFoundOnServerErrorException( // Убедитесь, что создали этот класс исключения
                    "Server returned transport error -404 (AUTH_KEY_NOT_FOUND). The auth key is unknown to the server for this connection.",
                );
            }
            // Другие возможные отрицательные коды
            throw new TransportException("Received a transport-level error code from server: {$prefix_as_signed_int}");
        }

        // 4. Если мы здесь, значит, это не ошибка, а длина пакета.
        // Теперь мы можем безопасно распаковать его как беззнаковое, если хотим,
        // но $prefix_as_signed_int уже содержит правильную положительную длину.
        $length = $prefix_as_signed_int;

        // --- КОНЕЦ ИСПРАВЛЕНИЯ ---

        // Ваша существующая проверка длины. Она по-прежнему полезна.
        if ($length > 4096 || $length <= 0) { // Условие <=0 теперь избыточно, но пусть будет
            throw new TransportException("Invalid length received from server: {$length}. Raw bytes: " . bin2hex($prefix_bytes));
        }

        // Ваша существующая логика чтения тела пакета. Она абсолютно правильная.
        $response = '';
        $remaining = $length;
        while ($remaining > 0) {
            $chunk = socket_read($this->socket, $remaining);

            if ($chunk === false || $chunk === '') {
                $errorCode = socket_last_error($this->socket);
                throw new TransportException("Failed to read message body from socket: " . socket_strerror($errorCode), $errorCode);
            }
            $response .= $chunk;
            $remaining -= \strlen($chunk);
        }

        return $response;
    }

    public function close(): void
    {
        if ($this->socket) {
            socket_close($this->socket);
            $this->socket = null;
            echo "Connection closed.\n";
        }
    }
}
