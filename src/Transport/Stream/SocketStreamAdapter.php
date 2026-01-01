<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport\Stream;

use Amp\Socket\Socket;
use Amp\Cancellation;
use Traversable;
use IteratorAggregate;
use Closure;

/**
 * Adapts an Amp\Socket\Socket to the StreamInterface.
 */
final class SocketStreamAdapter implements StreamInterface, IteratorAggregate
{
    private string $buffer;

    public function __construct(private readonly Socket $socket, string $preBuffer = '') {
        $this->buffer = $preBuffer;
    }

    public function read(?Cancellation $cancellation = null): ?string {
        if ($this->buffer !== '') {
            $data = $this->buffer;
            $this->buffer = '';
            return $data;
        }
        return $this->socket->read($cancellation);
    }

    public function write(string $bytes): void
    {
        $this->socket->write($bytes);
    }

    public function end(): void
    {
        $this->socket->end();
    }

    public function close(): void
    {
        $this->socket->close();
    }

    public function isClosed(): bool
    {
        return $this->socket->isClosed();
    }

    public function onClose(Closure $onClose): void
    {
        $this->socket->onClose($onClose);
    }

    public function isReadable(): bool
    {
        return $this->socket->isReadable();
    }

    public function isWritable(): bool
    {
        return $this->socket->isWritable();
    }

    public function getIterator(): Traversable
    {
        return $this->socket->getIterator();
    }
}