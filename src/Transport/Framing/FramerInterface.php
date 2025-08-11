<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport\Framing;

interface FramerInterface
{
    /**
     * Return protocol handshake header to send on connect.
     */
    public function handshakeHeader(): string;

    /**
     * Build a framed packet to send over the wire from raw MTProto payload.
     */
    public function frame(string $payload): string;

    /**
     * Read and return the next frame length prefix from a callable reader that returns exactly N bytes.
     * Should also prepare any internal state to allow reading the body via readBody().
     * Returns 4-byte little endian length to satisfy existing API.
     *
     * @param callable(int): string $readExactly
     */
    public function readPrefix(callable $readExactly): string;

    /**
     * Read and return the next body of exactly $length bytes using the same reader. May trim padding.
     *
     * @param callable(int): string $readExactly
     */
    public function readBody(callable $readExactly, int $length): string;
}


