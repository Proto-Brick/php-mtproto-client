<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport\Stream;

use Amp\ByteStream\ReadableStream;
use Amp\ByteStream\WritableStream;

/**
 * Common interface for all network streams (Socket, Proxy, Obfuscated).
 * Combines Read/Write capabilities and resource management.
 */
interface StreamInterface extends ReadableStream, WritableStream
{
    public function close(): void;

    public function isClosed(): bool;
}