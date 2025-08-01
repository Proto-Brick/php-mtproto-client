<?php

declare(strict_types=1);

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
        if (\strlen($value) !== 16) {
            throw new \InvalidArgumentException("int128 must be 16 bytes.");
        }
        // Преобразует Big-Endian (внутренний формат PHP) в Little-Endian (сетевой формат MTProto).
        return strrev($value);
    }

    public function int256(string $value): string
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
    public function raw128(string $value): string
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
    public function raw256(string $value): string
    {
        if (\strlen($value) !== 32) {
            throw new \InvalidArgumentException("raw256 must be 32 bytes.");
        }
        return $value;
    }

    public function bytes(string $value): string
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

    public function vectorOfObjects(array $items): string
    {
        if (empty($items)) {
            // ID вектора + 0 элементов
            return $this->int32(0x1cb5c415) . $this->int32(0);
        }

        $buffer = $this->int32(0x1cb5c415);
        $buffer .= $this->int32(\count($items));

        foreach ($items as $item) {
            // $this - это сам объект Serializer, который мы передаем в метод serialize элемента
            $buffer .= $item->serialize($this);
        }

        return $buffer;
    }

    public function vectorOfInts(array $items): string
    {
        $buffer = $this->int32(0x1cb5c415) . $this->int32(\count($items));
        foreach ($items as $item) {
            $buffer .= $this->int32($item);
        }
        return $buffer;
    }

    public function vectorOfLongs(array $items): string
    {
        $buffer = $this->int32(0x1cb5c415) . $this->int32(\count($items));
        foreach ($items as $item) {
            $buffer .= $this->int64($item);
        }
        return $buffer;
    }

    public function vectorOfStrings(array $items): string
    {
        $buffer = $this->int32(0x1cb5c415) . $this->int32(\count($items));
        foreach ($items as $item) {
            $buffer .= $this->bytes($item);
        } // string и bytes сериализуются одинаково
        return $buffer;
    }

    /**
     * Оборачивает RPC-запрос в initConnection и invokeWithLayer.
     * @param string $query Бинарные данные RPC-запроса (например, help.getConfig).
     * @return string Готовый для отправки бинарный payload.
     */
    public function wrapWithInitConnection(string $query, int $layer, int $apiId): string
    {
        // --- Конструкторы из официальной схемы ---
        $invokeWithLayerConstructor = 0xda9b0d0d;
        $initConnectionConstructor = 0xc1cd5ea9;

        // --- Параметры для initConnection ---
        $deviceModel = 'DigitalStars MTProto Client';
        $systemVersion = 'Unknown OS';
        $appVersion = '1.0.0';
        $systemLangCode = 'en';
        $langPack = ''; // Обычно пустой
        $langCode = 'ru';

        // Собираем initConnection
        $initConnectionPayload = $this->int32($initConnectionConstructor)
            . $this->int32(0) // flags, пока 0
            . $this->int32($apiId)
            . $this->bytes($deviceModel)
            . $this->bytes($systemVersion)
            . $this->bytes($appVersion)
            . $this->bytes($systemLangCode)
            . $this->bytes($langPack)
            . $this->bytes($langCode)
            . $query; // Вкладываем наш исходный запрос внутрь

        // Оборачиваем все в invokeWithLayer
        $finalPayload = $this->int32($invokeWithLayerConstructor)
            . $this->int32($layer)
            . $initConnectionPayload; // Вкладываем initConnection

        return $finalPayload;
    }
}
