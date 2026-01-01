<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport\Stream;

use Amp\Cancellation;
use ProtoBrick\MTProtoClient\Crypto\AesCtr;
use Traversable;
use IteratorAggregate;
use Closure;

/**
 * Decorator that encrypts outgoing data and decrypts incoming data using AES-CTR.
 */
readonly final class ObfuscatedStream implements StreamInterface, IteratorAggregate
{
    public function __construct(
        private StreamInterface $inner,
        private AesCtr $encryptor,
        private AesCtr $decryptor
    ) {}

    public function read(?Cancellation $cancellation = null): ?string
    {
        $chunk = $this->inner->read($cancellation);

        if ($chunk === null) {
            return null;
        }

        return $this->decryptor->decrypt($chunk);
    }

    public function write(string $bytes): void
    {
        $encrypted = $this->encryptor->encrypt($bytes);
        $this->inner->write($encrypted);
    }

    public function end(): void
    {
        $this->inner->end();
    }

    public function close(): void
    {
        $this->inner->close();
    }

    public function isClosed(): bool
    {
        return $this->inner->isClosed();
    }

    public function onClose(Closure $onClose): void
    {
        $this->inner->onClose($onClose);
    }

    public function isReadable(): bool
    {
        return $this->inner->isReadable();
    }

    public function isWritable(): bool
    {
        return $this->inner->isWritable();
    }

    public function getIterator(): Traversable
    {
        foreach ($this->inner as $chunk) {
            yield $this->decryptor->decrypt($chunk);
        }
    }
}