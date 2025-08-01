<?php
declare(strict_types=1);

namespace DigitalStars\MtprotoClient\TL;

use DigitalStars\MtprotoClient\Exception\ResendRequiredException;
use DigitalStars\MtprotoClient\Exception\RpcErrorException;
use DigitalStars\MtprotoClient\Session\Session;
use DigitalStars\MtprotoClient\TL\Mtproto\Constructors;
use Exception;

class Deserializer
{
    public function peekInt32(string $stream): int
    {
        if (strlen($stream) < 4) {
            throw new \Exception("Not enough data to peek int32");
        }
        return unpack('V', substr($stream, 0, 4))[1];
    }

    public function int32(string &$stream): int
    {
        $value_bin = substr($stream, 0, 4);
        $stream = substr($stream, 4);
        return unpack('V', $value_bin)[1]; // Распаковка как 32-bit беззнаковый little-endian integer.
    }

    public function int64(string &$stream): int
    {
        $value_bin = substr($stream, 0, 8);
        $stream = substr($stream, 8);
        return unpack('q', $value_bin)[1]; // Преобразует Little-Endian (из сети) в Big-Endian (для PHP)
        //return unpack('q', $value_bin)[1]; // Преобразует Little-Endian (из сети) в Big-Endian (для PHP)
    }

    public function int128(string &$stream): string
    {
        $value_bin = substr($stream, 0, 16);
        $stream = substr($stream, 16);
        return strrev($value_bin); // Преобразует Little-Endian (из сети) в Big-Endian (для PHP)
    }

    /**
     * НОВЫЙ МЕТОД: Читает 16 "сырых" байт и возвращает их как есть.
     */
    public function raw128(string &$payload): string
    {
        $value = substr($payload, 0, 16);
        $payload = substr($payload, 16);
        return $value; // Без strrev!
    }

    public function bytes(string &$stream): string
    {
        $firstByte = ord($stream[0]);
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
                throw new \Exception("Invalid length prefix for TL-string: " . dechex($firstByte));
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
     * Десериализует вектор TL-объектов.
     * @param string $payload - Бинарная строка (передается по ссылке)
     * @param callable $itemDeserializer - Функция для десериализации одного элемента,
     *                                     например, [AbstractMessage::class, 'deserialize']
     * @return array
     * @throws \Exception
     */
    public function vectorOfObjects(string &$payload, callable $itemDeserializer): array
    {
        if ($this->int32($payload) !== 0x1cb5c415) {
            throw new \Exception('Invalid vector constructor ID');
        }

        $count = $this->int32($payload);
        $result = [];

        for ($i = 0; $i < $count; $i++) {
            $result[] = $itemDeserializer($this, $payload);
        }

        return $result;
    }

    public function vectorOfInts(string &$payload): array
    {
        if ($this->int32($payload) !== 0x1cb5c415) throw new \Exception('Invalid vector constructor for Vector<int>');
        $count = $this->int32($payload);
        $result = [];
        for ($i = 0; $i < $count; $i++) { $result[] = $this->int32($payload); }
        return $result;
    }

    public function vectorOfLongs(string &$payload): array
    {
        if ($this->int32($payload) !== 0x1cb5c415) throw new \Exception('Invalid vector constructor for Vector<long>');
        $count = $this->int32($payload);
        $result = [];
        for ($i = 0; $i < $count; $i++) { $result[] = $this->int64($payload); }
        return $result;
    }

    public function vectorOfStrings(string &$payload): array
    {
        if ($this->int32($payload) !== 0x1cb5c415) throw new \Exception('Invalid vector constructor for Vector<string>');
        $count = $this->int32($payload);
        $result = [];
        for ($i = 0; $i < $count; $i++) { $result[] = $this->bytes($payload); } // string и bytes десериализуются одинаково
        return $result;
    }

    public function deserializeResPQ(string &$stream): array
    {
        $constructor = $this->int32($stream);
        if ($constructor !== 0x05162463) {
            throw new \Exception("Expected resPQ constructor, but got " . dechex($constructor));
        }

        $nonce = $this->raw128($stream);
        $server_nonce = $this->raw128($stream);
        $pq = $this->bytes($stream);

        $vector_constructor = $this->int32($stream);
        if ($vector_constructor !== 0x1cb5c415) {
            throw new \Exception(
                "Expected vector constructor, but got " . dechex($vector_constructor) . ". Stream state: " . bin2hex(
                    $stream
                )
            );
        }

        $count = $this->int32($stream);
        $fingerprints = [];
        for ($i = 0; $i < $count; $i++) {
            $fingerprints[] = $this->int64($stream);
        }

        return [
            'nonce' => $nonce,
            'server_nonce' => $server_nonce,
            'pq' => $pq,
            'fingerprints' => $fingerprints
        ];
    }

    /**
     * Десериализует ответ server_DH_params_ok.
     * @param string $stream
     * @return array
     * @throws \Exception
     */
    public function deserializeServerDhParamsOk(string &$stream): array
    {
        $constructor = $this->int32($stream);
        // Конструктор для server_DH_params_ok = 0xd0e8075c
        if ($constructor !== 0xd0e8075c) {
            throw new \Exception("Expected server_DH_params_ok constructor, but got " . dechex($constructor));
        }

        // Читаем поля в том порядке, в котором они идут в схеме
        $nonce = $this->raw128($stream);
        $server_nonce = $this->raw128($stream);
        $encrypted_answer = $this->bytes($stream);

        return [
            'nonce' => $nonce,
            'server_nonce' => $server_nonce,
            'encrypted_answer' => $encrypted_answer,
        ];
    }

    public function deserializeServerDhInnerData(string &$stream): array
    {
        $constructor = $this->int32($stream);
        if ($constructor !== 0xb5890dba) {
            throw new \Exception("Invalid constructor in DH answer: " . dechex($constructor));
        }
        $nonce = $this->raw128($stream);
        $server_nonce = $this->raw128($stream);
        $g = $this->int32($stream);
        $dh_prime = $this->bytes($stream);
        $g_a = $this->bytes($stream);
        $server_time = $this->int32($stream);

        return [
            'nonce' => $nonce,
            'server_nonce' => $server_nonce,
            'g' => $g,
            'dh_prime' => $dh_prime,
            'g_a' => $g_a,
            'server_time' => $server_time,
        ];
    }

    public function deserializeGzipPacked(string &$stream): string
    {
        $constructor = $this->int32($stream);
        if ($constructor !== 0x3072cfa1) { // gzip_packed
            throw new \Exception("Expected gzip_packed constructor, but got " . dechex($constructor));
        }

        $packed_data = $this->bytes($stream);
        $unpacked_data = gzdecode($packed_data);

        if ($unpacked_data === false) {
            throw new \Exception("Failed to gzdecode the response payload.");
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
     * @throws \Exception
     */
    public function deserializeDcOption(string &$stream): array
    {
        // В новой JSON-схеме ID конструктора 414687501, что равно 0x18b7a10d
        $constructor = $this->int32($stream);
        if ($constructor !== 0x18b7a10d) {
            throw new \Exception("Expected dcOption constructor (0x18b7a10d), but got " . dechex($constructor));
        }

        $flags = $this->int32($stream);
        $id = $this->int32($stream);
        $ip_address = $this->bytes($stream);
        $port = $this->int32($stream);

        $secret = null;
        // Поле 'secret' присутствует, если установлен 10-й бит (2^10 = 1024)
        if ($flags & (1 << 10)) {
            $secret = $this->bytes($stream);
        }

        return [
            '_' => 'dcOption', // Добавляем имя типа для удобства
            'id' => $id,
            'ip_address' => $ip_address,
            'port' => $port,
            'secret' => $secret,
            'flags' => $flags // Сохраняем флаги для отладки
        ];
    }

    /**
     * Десериализует bad_server_salt.
     */
    public function deserializeBadServerSalt(string &$stream): array
    {
        $constructor = $this->int32($stream);
        if ($constructor !== 0xedab447b) {
            throw new \Exception("Expected bad_server_salt constructor, but got " . dechex($constructor));
        }

        $bad_msg_id = $this->int64($stream);
        $bad_msg_seqno = $this->int32($stream);
        $error_code = $this->int32($stream);
        $new_server_salt = $this->int64($stream);

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
     * @throws \Exception
     */
    public function deserializeConfig(string &$stream): array
    {
        // ID конструктора -870702050 (signed int32) соответствует 0xcc1a241e (unsigned)
        $constructor = $this->int32($stream);
        if ($constructor !== 0xcc1a241e) {
            throw new \Exception("Expected config constructor (0xcc1a241e), but got " . dechex($constructor));
        }

        $config = ['_' => 'config']; // Начинаем собирать результат

        $flags = $this->int32($stream);
        $config['flags'] = $flags;

        // --- Безусловные поля (всегда присутствуют) ---
        $config['date'] = $this->int32($stream);
        $config['expires'] = $this->int32($stream);

        $test_mode_constructor = $this->int32($stream);
        $config['test_mode'] = ($test_mode_constructor === 0x997275b5); // boolTrue

        $config['this_dc'] = $this->int32($stream);

        // --- Вектор DcOption ---
        $vector_constructor = $this->int32($stream);
        if ($vector_constructor !== 0x1cb5c415) {
            throw new \Exception("Expected vector constructor for dc_options, but got " . dechex($vector_constructor));
        }
        $dc_options_count = $this->int32($stream);
        $dc_options = [];
        for ($i = 0; $i < $dc_options_count; $i++) {
            $dc_options[] = $this->deserializeDcOption($stream);
        }
        $config['dc_options'] = $dc_options;

        // --- Остальные безусловные поля (согласно схеме) ---
        $config['dc_txt_domain_name'] = $this->bytes($stream);
        $config['chat_size_max'] = $this->int32($stream);
        $config['megagroup_size_max'] = $this->int32($stream);
        $config['forwarded_count_max'] = $this->int32($stream);
        $config['online_update_period_ms'] = $this->int32($stream);
        $config['offline_blur_timeout_ms'] = $this->int32($stream);
        $config['offline_idle_timeout_ms'] = $this->int32($stream);
        $config['online_cloud_timeout_ms'] = $this->int32($stream);
        $config['notify_cloud_delay_ms'] = $this->int32($stream);
        $config['notify_default_delay_ms'] = $this->int32($stream);
        $config['push_chat_period_ms'] = $this->int32($stream);
        $config['push_chat_limit'] = $this->int32($stream);
        $config['edit_time_limit'] = $this->int32($stream);
        $config['revoke_time_limit'] = $this->int32($stream);
        $config['revoke_pm_time_limit'] = $this->int32($stream);
        $config['rating_e_decay'] = $this->int32($stream);
        $config['stickers_recent_limit'] = $this->int32($stream);
        $config['channels_read_media_period'] = $this->int32($stream);

        // --- Поля, зависящие от флагов ---
        // (name: "tmp_sessions", type: "flags.0?int")
        if ($flags & (1 << 0)) {
            $config['tmp_sessions'] = $this->int32($stream);
        }

        // (name: "call_receive_timeout_ms", type: "int") - это поле стало безусловным в новых схемах
        $config['call_receive_timeout_ms'] = $this->int32($stream);
        $config['call_ring_timeout_ms'] = $this->int32($stream);
        $config['call_connect_timeout_ms'] = $this->int32($stream);
        $config['call_packet_timeout_ms'] = $this->int32($stream);

        $config['me_url_prefix'] = $this->bytes($stream);

        // (name: "autoupdate_url_prefix", type: "flags.7?string")
        if ($flags & (1 << 7)) {
            $config['autoupdate_url_prefix'] = $this->bytes($stream);
        }
        // (name: "gif_search_username", type: "flags.9?string")
        if ($flags & (1 << 9)) {
            $config['gif_search_username'] = $this->bytes($stream);
        }
        // (name: "venue_search_username", type: "flags.10?string")
        if ($flags & (1 << 10)) {
            $config['venue_search_username'] = $this->bytes($stream);
        }
        // (name: "img_search_username", type: "flags.11?string")
        if ($flags & (1 << 11)) {
            $config['img_search_username'] = $this->bytes($stream);
        }
        // (name: "static_maps_provider", type: "flags.12?string")
        if ($flags & (1 << 12)) {
            $config['static_maps_provider'] = $this->bytes($stream);
        }

        $config['caption_length_max'] = $this->int32($stream);
        $config['message_length_max'] = $this->int32($stream);
        $config['webfile_dc_id'] = $this->int32($stream);

        // (name: "suggested_lang_code", type: "flags.2?string")
        if ($flags & (1 << 2)) {
            $config['suggested_lang_code'] = $this->bytes($stream);
        }
        // (name: "lang_pack_version", type: "flags.2?int")
        if ($flags & (1 << 2)) {
            $config['lang_pack_version'] = $this->int32($stream);
        }
        // (name: "base_lang_pack_version", type: "flags.2?int")
        if ($flags & (1 << 2)) {
            $config['base_lang_pack_version'] = $this->int32($stream);
        }

        // (name: "reactions_default", type: "flags.15?Reaction") - более сложный тип, пока пропустим
        // (name: "autologin_token", type: "flags.16?string") - тоже пропустим

        return $config;
    }

    /**
     * Десериализует msg_container.
     * @return array Массив вложенных сообщений, каждое со своим телом (body).
     */
    public function deserializeMessageContainer(string &$stream): array
    {
        $constructor = $this->int32($stream);
        if ($constructor !== \DigitalStars\MtprotoClient\TL\Mtproto\Constructors::MSG_CONTAINER) {
            throw new \Exception("Expected msg_container constructor, but got " . dechex($constructor));
        }

        $count = $this->int32($stream); // Количество сообщений в контейнере
        $messages = [];

        for ($i = 0; $i < $count; $i++) {
            // Парсим каждое вложенное сообщение
            $msg_id = $this->int64($stream); // В MTProto long - 64-бита, читаем как бинарную строку
            $seqno = $this->int32($stream);
            $length = $this->int32($stream);

            if (strlen($stream) < $length) {
                throw new \Exception("Not enough data in stream to read message of length {$length}.");
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
    public function deserializeNewSessionCreated(string &$stream): array
    {
        $constructor = $this->int32($stream);
        if ($constructor !== 0x9ec20908) {
            throw new \Exception("Expected new_session_created constructor, but got " . dechex($constructor));
        }

        $first_msg_id = $this->int64($stream);
        $unique_id = $this->int64($stream);
        $server_salt = $this->int64($stream);

        return [
            '_' => 'new_session_created',
            'first_msg_id' => $first_msg_id,
            'unique_id' => $unique_id,
            'server_salt' => $server_salt,
        ];
    }
}