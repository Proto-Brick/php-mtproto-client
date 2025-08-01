<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport;

interface Transport
{
    public function connect(): void;
    public function close(): void;
    public function send(string $payload): void;
    public function receive(): string;
}
