<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\TL;

class Serializer
{
    public function int32(int $value): string
    {
        return pack('V', $value);
    }

    public function int64(int $value): string
    {
        return pack('P', $value);
    }

    public function int128(string $value): string
    {
        if (strlen($value) !== 16) {
            throw new \InvalidArgumentException("int128 must be 16 bytes.");
        }
        return strrev($value);
    }

    public function int256(string $value): string
    {
        if (strlen($value) !== 32) {
            throw new \InvalidArgumentException("int256 must be 32 bytes.");
        }
        return strrev($value);
    }

    public function bytes(string $value): string
    {
        $len = strlen($value);
        if ($len <= 253) {
            $prefix = chr($len);
            $paddingLen = (4 - (($len + 1) % 4)) % 4;
        } else {
            $prefix = "\xfe" . substr(pack('V', $len), 0, 3);
            $paddingLen = (4 - $len % 4) % 4;
        }
        return $prefix . $value . str_repeat("\x00", $paddingLen);
    }
}