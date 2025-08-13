<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport;

use Amp\Future;
use Amp\Socket\Socket;

interface Transport
{
    public function connect(): Future;
    public function send(string $payload, bool $isHeader = false): Future;
    public function receive(int $length): Future;
    public function close(): void;
    public function getSocket(): ?Socket;
    public function isConnected(): bool;
}
