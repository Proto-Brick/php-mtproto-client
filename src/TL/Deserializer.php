<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL;

use ProtoBrick\MTProtoClient\TL\MTProto\Constructors;

class Deserializer
{
    public static function peekInt32(string $payload, int $offset): int
    {
//        if (!isset($payload[$offset + 3])) {
//            throw new \RuntimeException("Not enough data to peek int32 at offset $offset");
//        }
        return unpack('V', $payload, $offset)[1];
    }

    /**
     * Читает (потребляет) ID конструктора из потока.
     */
    public static function consumeConstructor(string $payload, int &$offset): int
    {
        $val = unpack('V', $payload, $offset)[1];
        $offset += 4;
        return $val;
    }

    public static function int32(string $payload, int &$offset): int
    {
//        if (!isset($payload[$offset + 3])) {
//            throw new \RuntimeException("Not enough data for int32 at offset $offset");
//        }
        $val = unpack('V', $payload, $offset)[1];
        $offset += 4;
        return $val;
    }

    public static function int64(string $payload, int &$offset): int
    {
//        if (!isset($payload[$offset + 7])) {
//            throw new \RuntimeException("Not enough data for int64 at offset $offset");
//        }
        $val = unpack('q', $payload, $offset)[1];
        $offset += 8;
        return $val;
    }

    public static function int128(string $payload, int &$offset): string
    {
        $val = substr($payload, $offset, 16);
//        if (strlen($val) !== 16) {
//            throw new \RuntimeException("Not enough data for int128");
//        }
        $offset += 16;
        return strrev($val); // Big-Endian conversion
    }

    public static function raw128(string $payload, int &$offset): string
    {
        $val = substr($payload, $offset, 16);
//        if (strlen($val) !== 16) {
//            throw new \RuntimeException("Not enough data for raw128");
//        }
        $offset += 16;
        return $val;
    }

    public static function double(string $payload, int &$offset): float
    {
//        if (!isset($payload[$offset + 7])) {
//            throw new \RuntimeException("Not enough data for double");
//        }
        $val = unpack('d', $payload, $offset)[1];
        $offset += 8;
        return $val;
    }

    public static function bool(string $payload, int &$offset): bool
    {
        $constructorId = unpack('V', $payload, $offset)[1];
        $offset += 4;

        return match ($constructorId) {
            0x997275b5 => true,  // boolTrue
            0xbc799737 => false, // boolFalse
            default => throw new \RuntimeException("Expected bool, got " . dechex($constructorId)),
        };
    }

    public static function bytes(string $payload, int &$offset): string
    {
//        if (!isset($payload[$offset])) {
//            throw new \RuntimeException("Unexpected end of stream reading bytes at $offset");
//        }

        $firstByte = ord($payload[$offset]);

        if ($firstByte <= 253) {
            $len = $firstByte;
            $offset++;
            $padding = (4 - ($len + 1)) & 3;
        } else {
//            if ($firstByte !== 254) {
//                throw new \RuntimeException("Invalid length prefix at $offset: " . dechex($firstByte));
//            }
            // Читаем 3 байта длины (little endian)
            $fullInt = unpack('V', $payload, $offset)[1];
            $len = $fullInt >> 8;

            $offset += 4;
            $padding = (4 - $len) & 3;
        }

//        if (strlen($payload) < $offset + $len) {
//            throw new \RuntimeException("Not enough data for bytes content");
//        }

        $data = substr($payload, $offset, $len);
        $offset += $len + $padding;

        return $data;
    }

    /**
     * Заглядывает в поток и читает ID конструктора, не изменяя поток.
     */
    public static function peekConstructor(string $payload, int $offset): int
    {
        return unpack('V', $payload, $offset)[1];
    }

    /**
     * Десериализует вектор TL-объектов.
     * @param string $payload - Бинарная строка (передается по ссылке)
     * @param int $offset
     * @param callable $itemDeserializer - Функция для десериализации одного элемента,
     *                                     например, [AbstractMessage::class, 'deserialize']
     * @return array
     */
    public static function vectorOfObjects(string $payload, int &$offset, callable $itemDeserializer): array
    {
        $id = unpack('V', $payload, $offset)[1];
        $offset += 4;
//        if ($id !== Constructors::VECTOR) {
//            throw new \RuntimeException('Invalid vector constructor ID: ' . dechex($id));
//        }

        $count = unpack('V', $payload, $offset)[1];
        $offset += 4;

        $result = [];

        for ($i = 0; $i < $count; $i++) {
            $result[] = $itemDeserializer($payload, $offset);
        }

        return $result;
    }

    public static function vectorOfInts(string $payload, int &$offset): array
    {
        $id = unpack('V', $payload, $offset)[1];
        $offset += 4;

//        if ($id !== 0x1cb5c415) {
//            throw new \RuntimeException('Invalid vector constructor for Vector<int>');
//        }

        $count = unpack('V', $payload, $offset)[1];
        $offset += 4;

        if ($count === 0) {
            return [];
        }

        $bytesNeeded = $count * 4;
//        if (strlen($payload) < $offset + $bytesNeeded) {
//            throw new \RuntimeException("Not enough bytes for vector of ints");
//        }

        $data = substr($payload, $offset, $bytesNeeded);
        $offset += $bytesNeeded;

        return array_values(unpack('V*', $data));
    }

    public static function vectorOfLongs(string $payload, int &$offset): array
    {
        $id = unpack('V', $payload, $offset)[1];
        $offset += 4;
//        if ($id !== 0x1cb5c415) {
//            throw new \RuntimeException('Invalid vector constructor for Vector<long>');
//        }

        $count = unpack('V', $payload, $offset)[1];
        $offset += 4;

        if ($count === 0) {
            return [];
        }

        $bytesNeeded = $count * 8;
//        if (strlen($payload) < $offset + $bytesNeeded) {
//            throw new \RuntimeException("Not enough bytes for vector of longs");
//        }

        $data = substr($payload, $offset, $bytesNeeded);
        $offset += $bytesNeeded;

        return array_values(unpack('q*', $data));
    }

    public static function vectorOfStrings(string $payload, int &$offset): array
    {
        $id = unpack('V', $payload, $offset)[1];
        $offset += 4;
//        if ($id !== 0x1cb5c415) {
//            throw new \RuntimeException('Invalid vector constructor for Vector<string>');
//        }
        $count = unpack('V', $payload, $offset)[1];
        $offset += 4;

        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = self::bytes($payload, $offset);
        }
        return $result;
    }

    /**
     * Десериализует сложный TL-тип JSONValue рекурсивно.
     * Умеет обрабатывать все современные JSON-конструкторы.
     */
    public static function deserializeJsonValue(string $payload, int &$offset): mixed
    {
        $constructorId = unpack('V', $payload, $offset)[1];

        switch ($constructorId) {
            case 0x3f6d7b68: // jsonNull
                $offset += 4;
                return null;

            case 0xc7345e6a: // jsonBool
                $offset += 4;
                $boolConstructor = unpack('V', $payload, $offset)[1];
                $offset += 4;
                if ($boolConstructor === 0x997275b5) {
                    return true;
                }
                if ($boolConstructor === 0xbc799737) {
                    return false;
                }
                //return $boolConstructor === 0x997275b5;
                throw new \RuntimeException("Invalid bool in json");

            case 0x2be0dfa4: // jsonNumber
                $offset += 4;
                return self::double($payload, $offset);

            case 0xb71e767a: // jsonString
                $offset += 4;
                return self::bytes($payload, $offset);

            case 0xf7444763: // jsonArray
                $offset += 4;
                $vecId = unpack('V', $payload, $offset)[1];
                $offset += 4;
//                if ($vecId !== 481674261) {
//                    throw new \RuntimeException('Invalid vector ID');
//                }

                $count = unpack('V', $payload, $offset)[1];
                $offset += 4;

                $result = [];
                for ($i = 0; $i < $count; $i++) {
                    $result[] = self::deserializeJsonValue($payload, $offset);
                }
                return $result;

            case 0x99c1d49d: // jsonObject
                $offset += 4;
                $vecId = unpack('V', $payload, $offset)[1];
                $offset += 4;
//                if ($vecId !== 481674261) {
//                    throw new \RuntimeException('Invalid vector ID');
//                }

                $count = unpack('V', $payload, $offset)[1];
                $offset += 4;
                $result = [];
                for ($i = 0; $i < $count; $i++) {
                    $objValId = unpack('V', $payload, $offset)[1];
                    $offset += 4;
//                    if ($objValId !== 0xc0de1bd9) {
//                        throw new \RuntimeException('Invalid jsonObjectValue');
//                    }

                    $key = self::bytes($payload, $offset);
                    $value = self::deserializeJsonValue($payload, $offset);
                    $result[$key] = $value;
                }
                return $result;

            case 0x7d748d04: // dataJSON
                $offset += 4;
                $data = self::bytes($payload, $offset);
                return json_decode($data, true) ?: [];

            default:
                throw new \RuntimeException('Unknown JSONValue constructor: ' . dechex($constructorId));
        }
    }

    public static function deserializeDataJSON(string $payload, int &$offset): array
    {
        return json_decode(self::bytes($payload, $offset), true) ?: [];
    }

    public static function deserializeResPQ(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset);
        if ($constructor !== 0x05162463) {
            throw new \RuntimeException("Expected resPQ constructor");
        }

        $nonce = self::raw128($payload, $offset);
        $server_nonce = self::raw128($payload, $offset);
        $pq = self::bytes($payload, $offset);

        return [
            'nonce' => $nonce,
            'server_nonce' => $server_nonce,
            'pq' => $pq,
            'fingerprints' => self::vectorOfLongs($payload, $offset),
        ];
    }

    /**
     * Десериализует ответ server_DH_params_ok.
     * @param string $payload
     * @param int $offset
     * @return array
     */
    public static function deserializeServerDhParamsOk(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset);
        if ($constructor !== 0xd0e8075c) {
            throw new \RuntimeException("Expected server_DH_params_ok constructor, but got " . dechex($constructor));
        }

        return [
            'nonce' => self::raw128($payload, $offset),
            'server_nonce' => self::raw128($payload, $offset),
            'encrypted_answer' => self::bytes($payload, $offset),
        ];
    }

    public static function deserializeServerDhInnerData(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset);
        if ($constructor !== 0xb5890dba) {
            throw new \RuntimeException("Invalid constructor in DH answer");
        }

        return [
            'nonce' => self::raw128($payload, $offset),
            'server_nonce' => self::raw128($payload, $offset),
            'g' => self::int32($payload, $offset),
            'dh_prime' => self::bytes($payload, $offset),
            'g_a' => self::bytes($payload, $offset),
            'server_time' => self::int32($payload, $offset),
        ];
    }


    public static function deserializeGzipPacked(string $payload, int &$offset): string
    {
        $constructor = self::int32($payload, $offset);
        if ($constructor !== 0x3072cfa1) {
            throw new \RuntimeException("Expected gzip_packed constructor, but got " . dechex($constructor));
        }

        $packed_data = self::bytes($payload, $offset);
        $unpacked_data = gzdecode($packed_data);

        if ($unpacked_data === false) {
            throw new \RuntimeException("Failed to gzdecode the response payload.");
        }

        return $unpacked_data;
    }


    /**
     * Десериализует один объект DcOption.
     * Точно соответствует схеме:
     * dcOption#18b7a10d flags:# id:int ip_address:string port:int secret:flags.10?bytes = DcOption;
     * (В новой схеме могут быть доп. флаги, но базовые поля те же)
     *
     * @param string $payload
     * @param int $offset
     * @return array
     */
    public static function deserializeDcOption(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset);
        if ($constructor !== 0x18b7a10d) {
            throw new \RuntimeException("Expected dcOption constructor, but got " . dechex($constructor));
        }

        $flags = self::int32($payload, $offset);

        return [
            '_' => 'dcOption',
            'id' => self::int32($payload, $offset),
            'ip_address' => self::bytes($payload, $offset),
            'port' => self::int32($payload, $offset),
            'secret' => ($flags & (1 << 10)) ? self::bytes($payload, $offset) : null,
            'flags' => $flags,
        ];
    }

    /**
     * Десериализует bad_server_salt.
     */
    public static function deserializeBadServerSalt(string $payload, int &$offset): array
    {
        self::int32($payload, $offset); //skip constructor
        return [
            '_' => 'bad_server_salt',
            'bad_msg_id' => self::int64($payload, $offset),
            'bad_msg_seqno' => self::int32($payload, $offset),
            'error_code' => self::int32($payload, $offset),
            'new_server_salt' => self::int64($payload, $offset),
        ];
    }

    /**
     * Десериализует объект Config.
     * Точно соответствует схеме:
     * config#cc1a241e flags:# ... = Config;
     *
     * @param string $payload
     * @param int $offset
     * @return array
     */
    public static function deserializeConfig(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset); //skip constructor
        if ($constructor !== 0xcc1a241e) {
            throw new \RuntimeException("Expected config constructor");
        }

        $flags = self::int32($payload, $offset);

        $config = [
            '_' => 'config',
            'flags' => $flags,
            'date' => self::int32($payload, $offset),
            'expires' => self::int32($payload, $offset),
            'test_mode' => self::bool($payload, $offset), // Используем bool() т.к. там может быть boolTrue/False
            'this_dc' => self::int32($payload, $offset),
        ];

        // Вектор DcOption
        $vecId = unpack('V', $payload, $offset)[1];
        $offset += 4;
        $count = unpack('V', $payload, $offset)[1];
        $offset += 4;

        $dc_options = [];
        for ($i = 0; $i < $count; $i++) {
            $dc_options[] = self::deserializeDcOption($payload, $offset);
        }
        $config['dc_options'] = $dc_options;

        $config['dc_txt_domain_name'] = self::bytes($payload, $offset);
        $config['chat_size_max'] = self::int32($payload, $offset);
        $config['megagroup_size_max'] = self::int32($payload, $offset);
        $config['forwarded_count_max'] = self::int32($payload, $offset);
        $config['online_update_period_ms'] = self::int32($payload, $offset);
        $config['offline_blur_timeout_ms'] = self::int32($payload, $offset);
        $config['offline_idle_timeout_ms'] = self::int32($payload, $offset);
        $config['online_cloud_timeout_ms'] = self::int32($payload, $offset);
        $config['notify_cloud_delay_ms'] = self::int32($payload, $offset);
        $config['notify_default_delay_ms'] = self::int32($payload, $offset);
        $config['push_chat_period_ms'] = self::int32($payload, $offset);
        $config['push_chat_limit'] = self::int32($payload, $offset);
        $config['edit_time_limit'] = self::int32($payload, $offset);
        $config['revoke_time_limit'] = self::int32($payload, $offset);
        $config['revoke_pm_time_limit'] = self::int32($payload, $offset);
        $config['rating_e_decay'] = self::int32($payload, $offset);
        $config['stickers_recent_limit'] = self::int32($payload, $offset);
        $config['channels_read_media_period'] = self::int32($payload, $offset);

        if ($flags & (1 << 0)) {
            $config['tmp_sessions'] = self::int32($payload, $offset);
        }

        $config['call_receive_timeout_ms'] = self::int32($payload, $offset);
        $config['call_ring_timeout_ms'] = self::int32($payload, $offset);
        $config['call_connect_timeout_ms'] = self::int32($payload, $offset);
        $config['call_packet_timeout_ms'] = self::int32($payload, $offset);

        $config['me_url_prefix'] = self::bytes($payload, $offset);

        if ($flags & (1 << 7)) {
            $config['autoupdate_url_prefix'] = self::bytes($payload, $offset);
        }
        if ($flags & (1 << 9)) {
            $config['gif_search_username'] = self::bytes($payload, $offset);
        }
        if ($flags & (1 << 10)) {
            $config['venue_search_username'] = self::bytes($payload, $offset);
        }
        if ($flags & (1 << 11)) {
            $config['img_search_username'] = self::bytes($payload, $offset);
        }
        if ($flags & (1 << 12)) {
            $config['static_maps_provider'] = self::bytes($payload, $offset);
        }

        $config['caption_length_max'] = self::int32($payload, $offset);
        $config['message_length_max'] = self::int32($payload, $offset);
        $config['webfile_dc_id'] = self::int32($payload, $offset);

        if ($flags & (1 << 2)) {
            $config['suggested_lang_code'] = self::bytes($payload, $offset);
            $config['lang_pack_version'] = self::int32($payload, $offset);
            $config['base_lang_pack_version'] = self::int32($payload, $offset);
        }

        return $config;
    }

    /**
     * Десериализует msg_container.
     * @return array Массив вложенных сообщений, каждое со своим телом (body).
     */
    public static function deserializeMessageContainer(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset);
        if ($constructor !== Constructors::MSG_CONTAINER) {
            throw new \RuntimeException("Expected msg_container");
        }

        $count = self::int32($payload, $offset);
        $messages = [];

        for ($i = 0; $i < $count; $i++) {
            $msg_id = self::int64($payload, $offset);
            $seqno = self::int32($payload, $offset);
            $length = self::int32($payload, $offset);

            if (strlen($payload) < $offset + $length) {
                throw new \RuntimeException("Container message truncated");
            }

            $body = substr($payload, $offset, $length);
            $offset += $length;

            $messages[] = [
                'msg_id' => $msg_id,
                'seqno' => $seqno,
                'length' => $length,
                'body' => $body,
            ];
        }

        return $messages;
    }

    public static function deserializeNewSessionCreated(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset);
        if ($constructor !== 0x9ec20908) {
            throw new \RuntimeException("Expected new_session_created constructor, but got " . dechex($constructor));
        }

        return [
            '_' => 'new_session_created',
            'first_msg_id' => self::int64($payload, $offset),
            'unique_id' => self::int64($payload, $offset),
            'server_salt' => self::int64($payload, $offset),
        ];
    }

    public static function deserializeMsgDetailedInfo(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset);

        return [
            '_' => 'msg_detailed_info',
            'msg_id' => self::int64($payload, $offset),
            'answer_msg_id' => self::int64($payload, $offset),
            'bytes' => self::int32($payload, $offset),
            'status' => self::int32($payload, $offset),
        ];
    }

    public static function deserializeMsgNewDetailedInfo(string $payload, int &$offset): array
    {
        $constructor = self::int32($payload, $offset);

        return [
            '_' => 'msg_new_detailed_info',
            'answer_msg_id' => self::int64($payload, $offset),
            'bytes' => self::int32($payload, $offset),
            'status' => self::int32($payload, $offset),
        ];
    }
}
