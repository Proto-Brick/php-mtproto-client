<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport\Framing;

final class IntermediateFramer implements FramerInterface
{
    private int $pendingLen = 0;

    public function handshakeHeader(): string
    {
        return "\xEE\xEE\xEE\xEE";
    }

    public function frame(string $payload): string
    {
        return pack('V', \strlen($payload)) . $payload;
    }

    public function readPrefix(callable $readExactly): string
    {
        $len = unpack('V', $readExactly(4))[1] & 0x7FFFFFFF;
        $this->pendingLen = $len;
        return pack('V', $len);
    }

    public function readBody(callable $readExactly, int $length): string
    {
        if ($this->pendingLen !== $length) {
            return $readExactly($length);
        }
        $this->pendingLen = 0;
        return $readExactly($length);
    }
}


