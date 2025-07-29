<?php

namespace DigitalStars\MtprotoClient\MTProto;

class Serializer
{
    // Сериализация int32
    public static function serializeInt32(int $value): string
    {
        return pack('V', $value); // Little-endian
    }

    // Сериализация int64
    public static function serializeInt64(int $value): string
    {
        return pack('P', $value); // Little-endian
    }

    // Сериализация int128 (строго 16 байт)
    public static function serializeInt128(string $value): string
    {
        if (strlen($value) !== 16) {
            throw new InvalidArgumentException("int128 must be 16 bytes");
        }
        return strrev($value); // Преобразуем в little-endian
    }

    // Сериализация строки
    public static function serializeString(string $value): string
    {
        $len = strlen($value);
        if ($len <= 253) {
            $padded = $value . str_repeat("\x00", (4 - ($len + 1) % 4) % 4);
            return chr($len) . $padded;
        }

        // Если длина > 253
        $padded = $value . str_repeat("\x00", (4 - $len % 4) % 4);
        return "\xFE" . pack('V', $len) . substr($padded, 0, $len + 3);
    }

    // Сериализация Vector
    public static function serializeVector(array $elements, callable $serializer): string
    {
        $result = self::serializeInt32(0x1cb5c415); // Vector ID
        $result .= self::serializeInt32(count($elements)); // Количество элементов
        foreach ($elements as $element) {
            $result .= $serializer($element);
        }
        return $result;
    }

    // Пример: сериализация TL-запроса req_pq_multi
    public static function serializeReqPQ(string $nonce): string
    {
        $constructorId = 0xbe7e8ef1; // CRC32 от "req_pq_multi nonce:int128 = ResPQ"
        return self::serializeInt32($constructorId) . self::serializeInt128($nonce);
    }
}
