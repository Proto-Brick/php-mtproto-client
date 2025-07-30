<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\TL;

class Serializer
{
    public function int32(int $value): string
    {
        // Упаковка в 32-битный беззнаковый little-endian integer, как требует MTProto.
        return pack('V', $value);
    }

    public function int64(int $value): string
    {
        // 'q' - 64-битное знаковое целое, little-endian.
        return pack('q', $value);
    }

    public function int128(string $value): string
    {
        if (strlen($value) !== 16) {
            throw new \InvalidArgumentException("int128 must be 16 bytes.");
        }
        // Преобразует Big-Endian (внутренний формат PHP) в Little-Endian (сетевой формат MTProto).
        return strrev($value);
    }

    public function int256(string $value): string
    {
        if (strlen($value) !== 32) {
            throw new \InvalidArgumentException("int256 must be 32 bytes.");
        }
        // Преобразует Big-Endian (внутренний формат PHP) в Little-Endian (сетевой формат MTProto).
        return strrev($value);
    }

    /**
     * Принимает "сырую" 16-байтную строку (уже в little-endian или это нечисловые данные)
     * и возвращает её как есть, только проверяя длину.
     * Используйте для данных от random_bytes().
     */
    public function raw128(string $value): string
    {
        if (strlen($value) !== 16) {
            throw new \InvalidArgumentException("raw128 must be 16 bytes.");
        }
        return $value;
    }

    /**
     * Принимает "сырую" 32-байтную строку (уже в little-endian или это нечисловые данные)
     * и возвращает её как есть, только проверяя длину.
     * Используйте для данных от random_bytes().
     */
    public function raw256(string $value): string
    {
        if (strlen($value) !== 32) {
            throw new \InvalidArgumentException("raw256 must be 32 bytes.");
        }
        return $value;
    }

    public function bytes(string $value): string
    {
        $len = strlen($value);
        if ($len <= 253) {
            $prefix = chr($len);
            $paddingLen = (4 - (($len + 1) % 4)) % 4; // Выравнивание для len (1 байт) + data
        } else {
            $prefix = "\xfe" . substr(pack('V', $len), 0, 3); // Маркер 0xFE + 3 байта длины
            $paddingLen = (4 - $len % 4) % 4; // Выравнивание только для data
        }
        return $prefix . $value . str_repeat("\x00", $paddingLen);
    }
}