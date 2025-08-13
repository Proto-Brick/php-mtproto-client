<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL;

use ProtoBrick\MTProtoClient\TL\MTProto\Constructors;

class Deserializer
{
    public static function peekInt32(string $stream): int
    {
        if (\strlen($stream) < 4) {
            throw new \RuntimeException("Not enough data to peek int32");
        }
        return unpack('V', substr($stream, 0, 4))[1];
    }

    public static function deserializeBool(string &$payload): bool
    {
        $constructorId = self::consumeConstructor($payload);
        if ($constructorId === 0x997275b5) { // boolTrue
            return true;
        }
        if ($constructorId === 0xbc799737) { // boolFalse
            return false;
        }
        throw new \RuntimeException("Expected bool, but got constructor " . dechex($constructorId));
    }

    public static function int32(string &$stream): int
    {
        $value_bin = substr($stream, 0, 4);
        $stream = substr($stream, 4);
        return unpack('V', $value_bin)[1]; // Распаковка как 32-bit беззнаковый little-endian integer.
    }

    public static function int64(string &$stream): int
    {
        $value_bin = substr($stream, 0, 8);
        $stream = substr($stream, 8);
        return unpack('q', $value_bin)[1]; // Преобразует Little-Endian (из сети) в Big-Endian (для PHP)
        //return unpack('q', $value_bin)[1]; // Преобразует Little-Endian (из сети) в Big-Endian (для PHP)
    }

    public static function int128(string &$stream): string
    {
        $value_bin = substr($stream, 0, 16);
        $stream = substr($stream, 16);
        return strrev($value_bin); // Преобразует Little-Endian (из сети) в Big-Endian (для PHP)
    }

    public static function double(string &$stream): float
    {
        $value_bin = substr($stream, 0, 8);
        $stream = substr($stream, 8);
        return unpack('d', $value_bin)[1];
    }

    /**
     * НОВЫЙ МЕТОД: Читает 16 "сырых" байт и возвращает их как есть.
     */
    public static function raw128(string &$payload): string
    {
        $value = substr($payload, 0, 16);
        $payload = substr($payload, 16);
        return $value; // Без strrev!
    }

    public static function bytes(string &$stream): string
    {
        $firstByte = \ord($stream[0]);
        $stream = substr($stream, 1);

        if ($firstByte <= 253) {
            $len = $firstByte;
            $padding = (4 - (($len + 1) % 4)) % 4;
        } else {
            if ($firstByte === 254) {
                $len = unpack('V', substr($stream, 0, 3) . "\x00")[1];
                $stream = substr($stream, 3);
                $padding = (4 - $len % 4) % 4;
            } else {
                throw new \RuntimeException("Invalid length prefix for TL-string: " . dechex($firstByte));
            }
        }

        $data = substr($stream, 0, $len);
        $stream = substr($stream, $len);

        if ($padding > 0) {
            $stream = substr($stream, $padding);
        }

        return $data;
    }

    /**
     * Заглядывает в поток и читает ID конструктора, не изменяя поток.
     */
    public static function peekConstructor(string $stream): int
    {
        return self::peekInt32($stream);
    }

    /**
     * Читает (потребляет) ID конструктора из потока.
     */
    public static function consumeConstructor(string &$stream): int
    {
        return self::int32($stream);
    }

    /**
     * Десериализует вектор TL-объектов.
     * @param string $payload - Бинарная строка (передается по ссылке)
     * @param callable $itemDeserializer - Функция для десериализации одного элемента,
     *                                     например, [AbstractMessage::class, 'deserialize']
     * @return array
     */
    public static function vectorOfObjects(string &$payload, callable $itemDeserializer): array
    {
        if (self::int32($payload) !== 0x1cb5c415) {
            throw new \RuntimeException('Invalid vector constructor ID');
        }

        $count = self::int32($payload);
        $result = [];

        for ($i = 0; $i < $count; $i++) {
//            var_dump(substr(bin2hex($payload), 0, 10));
            $result[] = $itemDeserializer($payload);
        }

        return $result;
    }

    public static function vectorOfInts(string &$payload): array
    {
        if (self::int32($payload) !== 0x1cb5c415) {
            throw new \RuntimeException('Invalid vector constructor for Vector<int>');
        }
        $count = self::int32($payload);
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = self::int32($payload);
        }
        return $result;
    }

    public static function vectorOfLongs(string &$payload): array
    {
        if (self::int32($payload) !== 0x1cb5c415) {
            throw new \RuntimeException('Invalid vector constructor for Vector<long>');
        }
        $count = self::int32($payload);
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = self::int64($payload);
        }
        return $result;
    }

    public static function vectorOfStrings(string &$payload): array
    {
        if (self::int32($payload) !== 0x1cb5c415) {
            throw new \RuntimeException('Invalid vector constructor for Vector<string>');
        }
        $count = self::int32($payload);
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = self::bytes($payload);
        } // string и bytes десериализуются одинаково
        return $result;
    }

    /**
     * Десериализует сложный TL-тип JSONValue рекурсивно.
     * Умеет обрабатывать все современные JSON-конструкторы.
     */
    public static function deserializeJsonValue(string &$stream): mixed
    {
        // Заглядываем в поток, чтобы узнать, какой тип JSON-элемента нас ждет
        $constructorId = self::peekInt32($stream);

        switch ($constructorId) {
            case 0x3f6d7b68: // jsonNull#3f6d7b68 = JSONValue;
                self::int32($stream); // "Съедаем" ID
                return null;

            case 0xc7345e6a: // jsonBool#c7345e6a value:Bool = JSONValue;
                self::int32($stream); // "Съедаем" ID
                // Читаем значение типа Bool (которое тоже является TL-объектом)
                $boolConstructor = self::int32($stream);
                if ($boolConstructor === 0x997275b5) {
                    return true;
                } // boolTrue
                if ($boolConstructor === 0xbc799737) {
                    return false;
                } // boolFalse
                throw new \RuntimeException("Invalid constructor for Bool inside jsonBool");

            case 0x2be0dfa4: // jsonNumber#2be0dfa4 value:double = JSONValue;
                self::int32($stream); // "Съедаем" ID
                return self::double($stream);

                // --- ДОБАВЛЕНО: Обработка нового конструктора для строк ---
            case 0xb71e767a: // jsonString#b71e767a value:string = JSONValue;
                self::int32($stream); // "Съедаем" ID
                return self::bytes($stream);

            case 0xf7444763: // jsonArray#f7444763 value:vector<JSONValue> = JSONValue;
                self::int32($stream); // "Съедаем" ID

                // Это вектор<JSONValue>
                if (self::int32($stream) !== 0x1cb5c415) { // Проверяем ID вектора
                    throw new \RuntimeException('Invalid vector constructor in jsonArray');
                }
                $count = self::int32($stream);
                $result = [];
                for ($i = 0; $i < $count; $i++) {
                    // Рекурсивно вызываем себя для каждого элемента массива
                    $result[] = self::deserializeJsonValue($stream);
                }
                return $result;

            case 0x99c1d49d: // jsonObject#99c1d49d value:vector<JSONObjectValue> = JSONValue;
                self::int32($stream); // "Съедаем" ID

                // Это вектор<JSONObjectValue>
                if (self::int32($stream) !== 0x1cb5c415) { // Проверяем ID вектора
                    throw new \RuntimeException('Invalid vector constructor in jsonObject');
                }
                $count = self::int32($stream);
                $result = [];
                for ($i = 0; $i < $count; $i++) {
                    // Десериализуем пару ключ-значение (JSONObjectValue)
                    // jsonObjectValue#c0de1bd9 key:string value:JSONValue = JSONObjectValue;
                    if (self::int32($stream) !== 0xc0de1bd9) {
                        throw new \RuntimeException('Invalid constructor for JSONObjectValue');
                    }
                    $key = self::bytes($stream);
                    // Рекурсивно вызываем себя для значения
                    $value = self::deserializeJsonValue($stream);
                    $result[$key] = $value;
                }
                return $result;

            case 0x7d748d04: // dataJSON#7d748d04 data:string = DataJSON; (псевдоним для JSONValue)
                self::int32($stream); // "Съедаем" ID
                $data = self::bytes($stream);
                return json_decode($data, true) ?: []; // Парсим строку как JSON

            default:
                throw new \RuntimeException('Unknown JSONValue constructor: ' . dechex($constructorId));
        }
    }

    public static function deserializeDataJSON(string &$stream): array
    {
        return json_decode(self::bytes($stream), true) ?: [];
    }

    public static function deserializeResPQ(string &$stream): array
    {
        $constructor = self::int32($stream);
        if ($constructor !== 0x05162463) {
            throw new \RuntimeException("Expected resPQ constructor, but got " . dechex($constructor));
        }

        $nonce = self::raw128($stream);
        $server_nonce = self::raw128($stream);
        $pq = self::bytes($stream);

        $vector_constructor = self::int32($stream);
        if ($vector_constructor !== 0x1cb5c415) {
            throw new \RuntimeException(
                "Expected vector constructor, but got " . dechex($vector_constructor) . ". Stream state: " . bin2hex(
                    $stream,
                ),
            );
        }

        $count = self::int32($stream);
        $fingerprints = [];
        for ($i = 0; $i < $count; $i++) {
            $fingerprints[] = self::int64($stream);
        }

        return [
            'nonce' => $nonce,
            'server_nonce' => $server_nonce,
            'pq' => $pq,
            'fingerprints' => $fingerprints,
        ];
    }

    /**
     * Десериализует ответ server_DH_params_ok.
     * @param string $stream
     * @return array
     */
    public static function deserializeServerDhParamsOk(string &$stream): array
    {
        $constructor = self::int32($stream);
        // Конструктор для server_DH_params_ok = 0xd0e8075c
        if ($constructor !== 0xd0e8075c) {
            throw new \RuntimeException("Expected server_DH_params_ok constructor, but got " . dechex($constructor));
        }

        // Читаем поля в том порядке, в котором они идут в схеме
        $nonce = self::raw128($stream);
        $server_nonce = self::raw128($stream);
        $encrypted_answer = self::bytes($stream);

        return [
            'nonce' => $nonce,
            'server_nonce' => $server_nonce,
            'encrypted_answer' => $encrypted_answer,
        ];
    }

    public static function deserializeServerDhInnerData(string &$stream): array
    {
        $constructor = self::int32($stream);
        if ($constructor !== 0xb5890dba) {
            throw new \RuntimeException("Invalid constructor in DH answer: " . dechex($constructor));
        }
        $nonce = self::raw128($stream);
        $server_nonce = self::raw128($stream);
        $g = self::int32($stream);
        $dh_prime = self::bytes($stream);
        $g_a = self::bytes($stream);
        $server_time = self::int32($stream);

        return [
            'nonce' => $nonce,
            'server_nonce' => $server_nonce,
            'g' => $g,
            'dh_prime' => $dh_prime,
            'g_a' => $g_a,
            'server_time' => $server_time,
        ];
    }

    public static function deserializeGzipPacked(string &$stream): string
    {
        $constructor = self::int32($stream);
        if ($constructor !== 0x3072cfa1) { // gzip_packed
            throw new \RuntimeException("Expected gzip_packed constructor, but got " . dechex($constructor));
        }

        $packed_data = self::bytes($stream);
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
     * @param string $stream
     * @return array
     */
    public static function deserializeDcOption(string &$stream): array
    {
        // В новой JSON-схеме ID конструктора 414687501, что равно 0x18b7a10d
        $constructor = self::int32($stream);
        if ($constructor !== 0x18b7a10d) {
            throw new \RuntimeException("Expected dcOption constructor (0x18b7a10d), but got " . dechex($constructor));
        }

        $flags = self::int32($stream);
        $id = self::int32($stream);
        $ip_address = self::bytes($stream);
        $port = self::int32($stream);

        $secret = null;
        // Поле 'secret' присутствует, если установлен 10-й бит (2^10 = 1024)
        if ($flags & (1 << 10)) {
            $secret = self::bytes($stream);
        }

        return [
            '_' => 'dcOption', // Добавляем имя типа для удобства
            'id' => $id,
            'ip_address' => $ip_address,
            'port' => $port,
            'secret' => $secret,
            'flags' => $flags, // Сохраняем флаги для отладки
        ];
    }

    /**
     * Десериализует bad_server_salt.
     */
    public static function deserializeBadServerSalt(string &$stream): array
    {
        $constructor = self::int32($stream);
        if ($constructor !== 0xedab447b) {
            throw new \RuntimeException("Expected bad_server_salt constructor, but got " . dechex($constructor));
        }

        $bad_msg_id = self::int64($stream);
        $bad_msg_seqno = self::int32($stream);
        $error_code = self::int32($stream);
        $new_server_salt = self::int64($stream);

        return [
            '_' => 'bad_server_salt',
            'bad_msg_id' => $bad_msg_id,
            'bad_msg_seqno' => $bad_msg_seqno,
            'error_code' => $error_code,
            'new_server_salt' => $new_server_salt,
        ];
    }

    /**
     * Десериализует объект Config.
     * Точно соответствует схеме:
     * config#cc1a241e flags:# ... = Config;
     *
     * @param string $stream
     * @return array
     */
    public static function deserializeConfig(string &$stream): array
    {
        // ID конструктора -870702050 (signed int32) соответствует 0xcc1a241e (unsigned)
        $constructor = self::int32($stream);
        if ($constructor !== 0xcc1a241e) {
            throw new \RuntimeException("Expected config constructor (0xcc1a241e), but got " . dechex($constructor));
        }

        $config = ['_' => 'config']; // Начинаем собирать результат

        $flags = self::int32($stream);
        $config['flags'] = $flags;

        // --- Безусловные поля (всегда присутствуют) ---
        $config['date'] = self::int32($stream);
        $config['expires'] = self::int32($stream);

        $test_mode_constructor = self::int32($stream);
        $config['test_mode'] = ($test_mode_constructor === 0x997275b5); // boolTrue

        $config['this_dc'] = self::int32($stream);

        // --- Вектор DcOption ---
        $vector_constructor = self::int32($stream);
        if ($vector_constructor !== 0x1cb5c415) {
            throw new \RuntimeException("Expected vector constructor for dc_options, but got " . dechex($vector_constructor));
        }
        $dc_options_count = self::int32($stream);
        $dc_options = [];
        for ($i = 0; $i < $dc_options_count; $i++) {
            $dc_options[] = self::deserializeDcOption($stream);
        }
        $config['dc_options'] = $dc_options;

        // --- Остальные безусловные поля (согласно схеме) ---
        $config['dc_txt_domain_name'] = self::bytes($stream);
        $config['chat_size_max'] = self::int32($stream);
        $config['megagroup_size_max'] = self::int32($stream);
        $config['forwarded_count_max'] = self::int32($stream);
        $config['online_update_period_ms'] = self::int32($stream);
        $config['offline_blur_timeout_ms'] = self::int32($stream);
        $config['offline_idle_timeout_ms'] = self::int32($stream);
        $config['online_cloud_timeout_ms'] = self::int32($stream);
        $config['notify_cloud_delay_ms'] = self::int32($stream);
        $config['notify_default_delay_ms'] = self::int32($stream);
        $config['push_chat_period_ms'] = self::int32($stream);
        $config['push_chat_limit'] = self::int32($stream);
        $config['edit_time_limit'] = self::int32($stream);
        $config['revoke_time_limit'] = self::int32($stream);
        $config['revoke_pm_time_limit'] = self::int32($stream);
        $config['rating_e_decay'] = self::int32($stream);
        $config['stickers_recent_limit'] = self::int32($stream);
        $config['channels_read_media_period'] = self::int32($stream);

        // --- Поля, зависящие от флагов ---
        // (name: "tmp_sessions", type: "flags.0?int")
        if ($flags & (1 << 0)) {
            $config['tmp_sessions'] = self::int32($stream);
        }

        // (name: "call_receive_timeout_ms", type: "int") - это поле стало безусловным в новых схемах
        $config['call_receive_timeout_ms'] = self::int32($stream);
        $config['call_ring_timeout_ms'] = self::int32($stream);
        $config['call_connect_timeout_ms'] = self::int32($stream);
        $config['call_packet_timeout_ms'] = self::int32($stream);

        $config['me_url_prefix'] = self::bytes($stream);

        // (name: "autoupdate_url_prefix", type: "flags.7?string")
        if ($flags & (1 << 7)) {
            $config['autoupdate_url_prefix'] = self::bytes($stream);
        }
        // (name: "gif_search_username", type: "flags.9?string")
        if ($flags & (1 << 9)) {
            $config['gif_search_username'] = self::bytes($stream);
        }
        // (name: "venue_search_username", type: "flags.10?string")
        if ($flags & (1 << 10)) {
            $config['venue_search_username'] = self::bytes($stream);
        }
        // (name: "img_search_username", type: "flags.11?string")
        if ($flags & (1 << 11)) {
            $config['img_search_username'] = self::bytes($stream);
        }
        // (name: "static_maps_provider", type: "flags.12?string")
        if ($flags & (1 << 12)) {
            $config['static_maps_provider'] = self::bytes($stream);
        }

        $config['caption_length_max'] = self::int32($stream);
        $config['message_length_max'] = self::int32($stream);
        $config['webfile_dc_id'] = self::int32($stream);

        // (name: "suggested_lang_code", type: "flags.2?string")
        if ($flags & (1 << 2)) {
            $config['suggested_lang_code'] = self::bytes($stream);
        }
        // (name: "lang_pack_version", type: "flags.2?int")
        if ($flags & (1 << 2)) {
            $config['lang_pack_version'] = self::int32($stream);
        }
        // (name: "base_lang_pack_version", type: "flags.2?int")
        if ($flags & (1 << 2)) {
            $config['base_lang_pack_version'] = self::int32($stream);
        }

        // (name: "reactions_default", type: "flags.15?Reaction") - более сложный тип, пока пропустим
        // (name: "autologin_token", type: "flags.16?string") - тоже пропустим

        return $config;
    }

    /**
     * Десериализует msg_container.
     * @return array Массив вложенных сообщений, каждое со своим телом (body).
     */
    public static function deserializeMessageContainer(string &$stream): array
    {
        $constructor = self::int32($stream);
        if ($constructor !== Constructors::MSG_CONTAINER) {
            throw new \RuntimeException("Expected msg_container constructor, but got " . dechex($constructor));
        }

        $count = self::int32($stream); // Количество сообщений в контейнере
        $messages = [];

        for ($i = 0; $i < $count; $i++) {
            // Парсим каждое вложенное сообщение
            $msg_id = self::int64($stream); // В MTProto long - 64-бита, читаем как бинарную строку
            $seqno = self::int32($stream);
            $length = self::int32($stream);

            if (\strlen($stream) < $length) {
                throw new \RuntimeException("Not enough data in stream to read message of length {$length}.");
            }

            $body = substr($stream, 0, $length);
            $stream = substr($stream, $length);

            $messages[] = [
                'msg_id' => $msg_id,
                'seqno' => $seqno,
                'length' => $length,
                'body' => $body, // Тело сообщения - это "сырые" бинарные данные
            ];
        }

        return $messages;
    }

    /**
     * Десериализует new_session_created.
     */
    public static function deserializeNewSessionCreated(string &$stream): array
    {
        $constructor = self::int32($stream);
        if ($constructor !== 0x9ec20908) {
            throw new \RuntimeException("Expected new_session_created constructor, but got " . dechex($constructor));
        }

        $first_msg_id = self::int64($stream);
        $unique_id = self::int64($stream);
        $server_salt = self::int64($stream);

        return [
            '_' => 'new_session_created',
            'first_msg_id' => $first_msg_id,
            'unique_id' => $unique_id,
            'server_salt' => $server_salt,
        ];
    }
}
