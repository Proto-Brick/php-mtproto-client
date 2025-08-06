<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport;

use Amp\Future;

interface Transport
{
    public function connect(): Future;
    public function send(string $payload, bool $isHeader = false): Future;
    public function receive(int $length): Future;
    public function close(): void;
    public function getSocketResource();
    public function isConnected(): bool;
}
