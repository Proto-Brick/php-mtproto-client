<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport\Framing;

final class AbridgedFramer implements FramerInterface
{
    private int $pendingLen = 0;

    public function handshakeHeader(): string
    {
        return "\xEF";
    }

    public function frame(string $payload): string
    {
        $length = \strlen($payload);
        if ($length % 4 !== 0) {
            throw new \InvalidArgumentException('Abridged payload must be aligned to 4 bytes');
        }
        $words = intdiv($length, 4);
        $prefix = $words < 0x7F ? chr($words) : ("\x7F" . substr(pack('V', $words), 0, 3));
        return $prefix . $payload;
    }

    public function readPrefix(callable $readExactly): string
    {
        $b0 = ord($readExactly(1));
        $words = $b0 === 0x7F ? unpack('V', $readExactly(3) . "\x00")[1] : $b0;
        $this->pendingLen = $words * 4;
        return pack('V', $this->pendingLen);
    }

    public function readBody(callable $readExactly, int $length): string
    {
        if ($this->pendingLen !== $length) {
            // fallback to requested length
            return $readExactly($length);
        }
        $this->pendingLen = 0;
        return $readExactly($length);
    }
}


