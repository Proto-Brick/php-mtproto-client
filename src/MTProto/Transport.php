<?php

namespace DigitalStars\MtprotoClient\MTProto;

class Transport {
    public static function safeHex(string $hex): string {
        if ((strlen($hex) % 2) === 1) {
            $hex = '0' . $hex;
        }
        return $hex;
    }

    public function processAbridged(string $msg): string {
        $msgLength = strlen($msg) / 2;

        // Проверка длины
        if ($msgLength % 4 !== 0) {
            exit('Size error');
        }

        $msgLength /= 4; // Разделение длины на 4
        $msgLengthHex = dechex($msgLength);
        $msgLengthHex = self::safeHex($msgLengthHex);

        // Если длина пакета больше или равна 127, используем 3 байта для длины
        if ($msgLength >= 127) {
            $header = hex2bin('ef'); // Заголовок для пакетов >= 127
            $lengthBytes = pack('V', $msgLength); // Преобразуем в 4 байта (little-endian)
            $lengthBytes = substr($lengthBytes, 0, 3); // Отбрасываем 4-й байт
            $msg = $header . $lengthBytes . $msg;
        } else {
            // Используем один байт для длины < 127
            $msg = $msgLengthHex . $msg;
        }

        return $msg;
    }

    // Обработка Intermediate
    public function processIntermediate(string $msg): string {
        $msgLength = strlen($msg); // Длина сообщения в байтах

        // Длина полезной нагрузки, закодированная в виде 4 байтов длины (little endian)
        $lengthBytes = pack('V', $msgLength);

        // Если включён Quick ACK, устанавливаем старший бит
        if ($this->isQuickAckEnabled()) {
            $lengthInt = unpack('V', $lengthBytes)[1] | 0x80000000; // Устанавливаем старший бит
            $lengthBytes = pack('V', $lengthInt); // Преобразуем обратно в 4 байта
        }

        // Заголовок для Intermediate
        $header = hex2bin('eeeeeeee');

        // Собираем сообщение
        return $header . $lengthBytes . $msg;
    }

    // Обработка Padded Intermediate
    public function processPaddedIntermediate(string $msg): string {
        // Вычисляем длину сообщения
        $payloadLength = strlen($msg);

        // Генерируем случайную длину подложки от 0 до 15
        $paddingLength = random_int(0, 15);

        // Генерируем случайную подложку
        $padding = random_bytes($paddingLength);

        // Общая длина сообщения = длина сообщения + длина подложки
        $totalLength = $payloadLength + $paddingLength;

        // Кодируем общую длину в 4 байта little-endian
        $lengthBytes = pack('V', $totalLength);

        // Заголовок для Padded Intermediate
        $header = hex2bin('dddddddd');

        // Объединяем все: длина, полезная нагрузка и подложка
        $msg = $header . $lengthBytes . hex2bin($msg) . $padding;

        return $msg;
    }

    // Обработка Full
    public function processFull(string $msg): string {
        // Вычисляем длину сообщения
        $payloadLength = strlen($msg);

        // Генерируем 4 байта для последовательности (seqno) - можно использовать какой-то счетчик
        static $seqno = 0;
        $seqnoBytes = pack('V', $seqno++);

        // Вычисляем CRC32 для длины, seqno и полезной нагрузки
        $crc = crc32($payloadLength . $seqnoBytes . $msg);
        $crcBytes = pack('V', $crc);

        // Кодируем длину сообщения в 4 байта (включая саму длину)
        $totalLength = 4 + 4 + $payloadLength + 4; // 4 байта для длины + 4 для seqno + payload + 4 для crc
        $lengthBytes = pack('V', $totalLength);

        // Возвращаем сообщение в формате Full
        return $lengthBytes . $seqnoBytes . $msg . $crcBytes;
    }

    // Проверка на Quick ACK
    private function isQuickAckEnabled(): bool {
        // Логика для определения, включен ли Quick ACK
        return false; // Здесь можно добавить логику для проверки
    }
}