<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractJSONValue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DataJSON;
use ProtoBrick\MTProtoClient\Generated\Types\Base\JsonArray;
use ProtoBrick\MTProtoClient\Generated\Types\Base\JsonBool;
use ProtoBrick\MTProtoClient\Generated\Types\Base\JsonNull;
use ProtoBrick\MTProtoClient\Generated\Types\Base\JsonNumber;
use ProtoBrick\MTProtoClient\Generated\Types\Base\JsonObject;
use ProtoBrick\MTProtoClient\Generated\Types\Base\JSONObjectValue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\JsonString;
use ProtoBrick\MTProtoClient\TL\MTProto\Constructors;
use ProtoBrick\MTProtoClient\Generated\TL_Layer;

class Serializer
{
    public static function int32(int $value): string
    {
        // Упаковка в 32-битный беззнаковый little-endian integer, как требует MTProto.
        return pack('V', $value);
    }

    public static function int64(int $value): string
    {
        // 'q' - 64-битное знаковое целое, little-endian.
        return pack('q', $value);
    }

    public static function int128(string $value): string
    {
        if (\strlen($value) !== 16) {
            throw new \InvalidArgumentException("int128 must be 16 bytes.");
        }
        // Преобразует Big-Endian (внутренний формат PHP) в Little-Endian (сетевой формат MTProto).
        return strrev($value);
    }

    public static function int256(string $value): string
    {
        if (\strlen($value) !== 32) {
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
    public static function raw128(string $value): string
    {
        if (\strlen($value) !== 16) {
            throw new \InvalidArgumentException("raw128 must be 16 bytes.");
        }
        return $value;
    }

    /**
     * Принимает "сырую" 32-байтную строку (уже в little-endian или это нечисловые данные)
     * и возвращает её как есть, только проверяя длину.
     * Используйте для данных от random_bytes().
     */
    public static function raw256(string $value): string
    {
        if (\strlen($value) !== 32) {
            throw new \InvalidArgumentException("raw256 must be 32 bytes.");
        }
        return $value;
    }

    public static function bytes(string $value): string
    {
        $len = \strlen($value);
        if ($len <= 253) {
            $prefix = \chr($len);
            $paddingLen = (4 - (($len + 1) % 4)) % 4; // Выравнивание для len (1 байт) + data
        } else {
            $prefix = "\xfe" . substr(pack('V', $len), 0, 3); // Маркер 0xFE + 3 байта длины
            $paddingLen = (4 - $len % 4) % 4; // Выравнивание только для data
        }
        return $prefix . $value . str_repeat("\x00", $paddingLen);
    }

    /**
     * Преобразует int в сырую бинарную строку (Big-Endian) минимальной длины.
     * Аналог toBytes(false) из BigInteger.
     * Используется для p и q.
     */
    public static function intToBinary(int $number): string
    {
        $binary = ltrim(pack('J', $number), "\x00");
        return $binary === '' ? "\x00" : $binary;
    }

    public static function vectorOfObjects(array $items): string
    {
        if (empty($items)) {
            // ID вектора + 0 элементов
            return self::int32(0x1cb5c415) . self::int32(0);
        }

        $buffer = self::int32(0x1cb5c415);
        $buffer .= self::int32(\count($items));

        foreach ($items as $item) {
            // $this - это сам объект Serializer, который мы передаем в метод serialize элемента
            $buffer .= $item->serialize();
        }

        return $buffer;
    }

    public static function vectorOfInts(array $items): string
    {
        $buffer = self::int32(0x1cb5c415) . self::int32(\count($items));
        foreach ($items as $item) {
            $buffer .= self::int32($item);
        }
        return $buffer;
    }

    public static function vectorOfLongs(array $items): string
    {
        $buffer = self::int32(0x1cb5c415) . self::int32(\count($items));
        foreach ($items as $item) {
            $buffer .= self::int64($item);
        }
        return $buffer;
    }

    public static function vectorOfStrings(array $items): string
    {
        $buffer = self::int32(0x1cb5c415) . self::int32(\count($items));
        foreach ($items as $item) {
            $buffer .= self::bytes($item);
        } // string и bytes сериализуются одинаково
        return $buffer;
    }

    /**
     * Принимает PHP-массив (или другое значение) и сериализует его в бинарный TL-тип JSONValue.
     */
    public static function serializeJsonValue(mixed $value): string
    {
        if ($value instanceof AbstractJSONValue) {
            return $value->serialize();
        }
        return self::phpValueToJsonValueObject($value)->serialize();
    }

    /**
     * Вспомогательный метод, остается private.
     */
    public static function serializeDataJSON(array $data): string
    {
        // DataJSON всегда содержит строку, поэтому json_encode здесь правильный.
        return (new DataJSON(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)))->serialize();
    }

    /**
     * ВСПОМОГАТЕЛЬНЫЙ МЕТОД: Рекурсивно преобразует PHP-значение в дерево
     * соответствующих TL-объектов (JsonNull, JsonObject и т.д.).
     */
    private static function phpValueToJsonValueObject(mixed $value): AbstractJSONValue
    {
        if (is_null($value)) {
            return new JsonNull();
        }
        if (is_bool($value)) {
            return new JsonBool($value);
        }
        if (is_int($value) || is_float($value)) {
            return new JsonNumber((float)$value);
        }
        if (is_string($value)) {
            return new JsonString($value);
        }
        if (is_array($value)) {
            // Проверяем, является ли массив списком (индексы 0, 1, 2...)
            // или ассоциативным массивом (объектом)
            if (array_is_list($value)) {
                $items = array_map(static fn($v) => self::phpValueToJsonValueObject($v), $value);
                return new JsonArray($items);
            }

            $items = [];
            foreach ($value as $k => $v) {
                $items[] = new JSONObjectValue((string)$k, self::phpValueToJsonValueObject($v));
            }
            return new JsonObject($items);
        }
        // Если тип не поддерживается, выбрасываем исключение
        throw new \InvalidArgumentException("Unsupported PHP type for JSONValue serialization: " . gettype($value));
    }

    public static function serializeMsgsAck(array $msgIds): string
    {
        return self::int32(Constructors::MSGS_ACK) . self::vectorOfLongs($msgIds);
    }

    /**
     * Оборачивает RPC-запрос в initConnection и invokeWithLayer.
     * @param string $query Бинарные данные RPC-запроса (например, help.getConfig).
     * @return string Готовый для отправки бинарный payload.
     */
    public static function wrapWithInitConnection(string $query, int $layer, int $apiId): string
    {
        if ($layer === 0) {
            $layer = TL_Layer::VERSION;
        }

        // --- Конструкторы из официальной схемы ---
        $invokeWithLayerConstructor = 0xda9b0d0d;
        $initConnectionConstructor = 0xc1cd5ea9;

        // --- Параметры для initConnection ---
        $deviceModel = 'ProtoBrick MTProto Client';
        $systemVersion = 'Unknown OS';
        $appVersion = '1.0.0';
        $systemLangCode = 'en';
        $langPack = ''; // Обычно пустой
        $langCode = 'ru';

        // Собираем initConnection
        $initConnectionPayload = self::int32($initConnectionConstructor)
            . self::int32(0) // flags, пока 0
            . self::int32($apiId)
            . self::bytes($deviceModel)
            . self::bytes($systemVersion)
            . self::bytes($appVersion)
            . self::bytes($systemLangCode)
            . self::bytes($langPack)
            . self::bytes($langCode)
            . $query; // Вкладываем наш исходный запрос внутрь

        // Оборачиваем все в invokeWithLayer
        $finalPayload = self::int32($invokeWithLayerConstructor)
            . self::int32($layer)
            . $initConnectionPayload; // Вкладываем initConnection

        return $finalPayload;
    }
}
