<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Transport;

use DigitalStars\MtprotoClient\Exception\TransportException;
use DigitalStars\MtprotoClient\Settings;

class TcpTransport implements Transport
{
    private ?\Socket $socket = null;

    public function __construct(private readonly Settings $settings) {}

    public function connect(): void
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false) {
            throw new TransportException('Socket creation failed: ' . socket_strerror(socket_last_error()));
        }
        if (!socket_connect($this->socket, $this->settings->server_address, $this->settings->server_port)) {
            throw new TransportException('Socket connection failed: '. socket_strerror(socket_last_error()));
        }
        socket_set_option($this->socket, SOL_SOCKET, SO_RCVTIMEO, ["sec" => 5, "usec" => 0]);
        echo "Connected to {$this->settings->server_address}:{$this->settings->server_port}\n";
    }

    public function send(string $payload): void
    {
        if ($this->socket === null) {
            throw new TransportException("Socket is not connected.");
        }

        // Для Intermediate транспорта сервер ожидает пакет в формате:
        // [4 байта заголовка 0xeeeeeeee] [4 байта длины] [данные]

        $header = hex2bin('eeeeeeee');
        $packet = $header . pack('V', strlen($payload)) . $payload;

        echo "DEBUG: Sending " . strlen($packet) . " bytes: " . bin2hex($packet) . "\n";
        if (socket_write($this->socket, $packet, strlen($packet)) === false) {
            throw new TransportException('Failed to send data: ' . socket_strerror(socket_last_error($this->socket)));
        }
    }

    public function receive(): string
    {
        if ($this->socket === null) {
            throw new TransportException("Socket is not connected.");
        }

        // Сначала читаем 4 байта заголовка. Для Intermediate ответа он тоже должен быть eeeeeeee
        // Но сервер на незашифрованные сообщения может его не присылать, а сразу слать длину.
        // Поэтому мы читаем 4 байта и проверяем.
        $header_or_length = socket_read($this->socket, 4);
        if ($header_or_length === false || strlen($header_or_length) < 4) {
            $errorCode = socket_last_error($this->socket);
            throw new TransportException("Failed to read response header/length from socket: " . socket_strerror($errorCode), $errorCode);
        }

        // Если это заголовок, читаем еще 4 байта длины.
        // ВАЖНО: На незашифрованные запросы сервер отвечает БЕЗ заголовка 0xeeeeeeee
        // Он сразу присылает длину. Поэтому ваш текущий receive() был правильным для этого шага.
        // Оставим его как есть, он корректен для первого шага.
        // Исправление в send() - это главное.
        $length_bytes = $header_or_length;

        // Длина в ответе Intermediate кодируется в Little-Endian ('V')
        $lengthData = unpack('V', $length_bytes);
        $length = $lengthData[1];

        // Проверяем на адекватность длины.
        // resPQ обычно около 150-200 байт.
        if ($length > 4096 || $length <= 0) {
            throw new TransportException("Invalid length received from server: {$length}. Raw bytes: " . bin2hex($length_bytes));
        }

        // Теперь читаем ровно столько байт, сколько указано в длине.
        $response = '';
        $remaining = $length;
        while ($remaining > 0) {
            $chunk = socket_read($this->socket, $remaining);
            if ($chunk === false || $chunk === '') {
                $errorCode = socket_last_error($this->socket);
                throw new TransportException("Failed to read message body from socket: " . socket_strerror($errorCode), $errorCode);
            }
            $response .= $chunk;
            $remaining -= strlen($chunk);
        }
        // --- КОНЕЦ ИСПРАВЛЕНИЯ ---

        echo "DEBUG: Received " . strlen($response) . " bytes (payload only): " . bin2hex($response) . "\n";
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