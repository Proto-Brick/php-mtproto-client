<?php

namespace DigitalStars\MtprotoClient\MTProto;

class Connection {
    private $socket;
    private string $server;
    private int $port;
    private string $transport;

    public function __construct(string $server, int $port = 443, string $transport = 'Intermediate') {
        $this->server = $server;
        $this->port = $port;
        $this->transport = $transport;
    }

    public function connect(): \Socket|bool {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if ($this->socket === false) {
            throw new \Exception('Socket creation failed: ' . socket_strerror(socket_last_error()));
        }

        if (!socket_connect($this->socket, $this->server, $this->port)) {
            throw new \Exception('Socket connection failed: ' . socket_strerror(socket_last_error()));
        }

        echo "Connected to {$this->server}:{$this->port}\n";

        return $this->socket;
    }

    public function send(string $data) {
        $length = strlen($data);
        $prefix = pack('N', $length);
        $message = $prefix . $data;

        if (socket_write($this->socket, $message, strlen($message)) === false) {
            throw new \Exception('Failed to send data: ' . socket_strerror(socket_last_error()));
        }

        echo "Sending data: " . bin2hex($message) . "\n";
    }

    public function receive(): string {
        $response = socket_read($this->socket, 4096);

        if ($response === false) {
            throw new \Exception('Failed to read data: ' . socket_strerror(socket_last_error()));
        }

        echo "Received data: " . bin2hex($response) . "\n";
        return $response;
    }

    public function close() {
        socket_close($this->socket);
        echo "Connection closed.\n";
    }
}