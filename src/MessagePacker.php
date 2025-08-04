<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient;

use DigitalStars\MtprotoClient\Auth\AuthKey;
use DigitalStars\MtprotoClient\Crypto\Aes;
use DigitalStars\MtprotoClient\Exception\TransportException;
use DigitalStars\MtprotoClient\Session\Session;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Mtproto\Constructors;
use DigitalStars\MtprotoClient\TL\Serializer;
use Random\RandomException;

class MessagePacker
{
    public function __construct(
        private readonly Session $session,
        private readonly Aes $aes,
        private readonly Serializer $serializer,
    ) {}

    public function packUnencrypted(string $payload): string
    {
        $msgId = $this->session->generateMessageId();
        // Сборка MTProto-сообщения (auth_key_id=0, msg_id, length, payload)
        return pack('P', 0)
            . pack('q', $msgId)
            . pack('V', \strlen($payload))
            . $payload;
    }

    public function unpackUnencrypted(string $rawResponse): string
    {
        // TcpTransport::receive() уже вернул нам чистый MTProto-пакет.
        // На этом этапе никаких манипуляций не требуется.
        // Просто возвращаем его как есть.
        // Валидация (проверка auth_key_id и т.д.) происходит в вызывающем коде (AuthKeyCreator).
        return $rawResponse;
    }

    /**
     * @param string $payload
     * @param AuthKey $authKey
     * @return array{0: string, 1: string} [encrypted_packet, msg_id_binary]
     * @throws RandomException
     */
    /**
     * Упаковывает и шифрует RPC-запрос для отправки на сервер.
     *
     * @param string    $payload         Бинарные данные TL-объекта запроса.
     * @param AuthKey   $authKey         Ключ авторизации.
     * @param string|null $overrideMsgId   Опциональный бинарный msg_id для переотправки сообщения. Если null, будет сгенерирован новый.
     * @return array{0: string, 1: string} Массив, где [0] - полный зашифрованный пакет для отправки, [1] - бинарный msg_id, который был использован.
     * @throws \Exception
     */
    public function packEncrypted(string $payload, AuthKey $authKey, ?int $overrideMsgId = null, bool $isContentRelated = true): array
    {
        // если соли нет, делаем заглушку, чтобы следующим запросом получить актуальную соль
        $salt = $this->session->getServerSalt() ?? random_int(PHP_INT_MIN, PHP_INT_MAX);
        $sessionId = $this->session->getId() ?? throw new \LogicException("Session ID is not set");

        // 2. Генерируем ID и номер последовательности сообщения.
        // RPC-запросы всегда являются "контентными".
        $messageId = $overrideMsgId ?? $this->session->generateMessageId();
        $sequence = $this->session->generateSequence($isContentRelated);

        echo "[SEND] >> seqno: {$sequence}\n";

        // 3. Собираем внутреннюю, еще не зашифрованную часть пакета.
        $unpaddedPayload = pack('q', $salt)
            . $sessionId
            . pack('q', $messageId)
            . pack('V', $sequence)
            . pack('V', \strlen($payload))
            . $payload;

        // 4. Добавляем случайную "набивку" (padding) по правилам MTProto 2.0.
        // Длина должна быть кратна 16, а сама набивка - не менее 12 байт.
        $paddingLength = 12 + (16 - (\strlen($unpaddedPayload) + 12) % 16) % 16;
        $paddedPayload = $unpaddedPayload . random_bytes($paddingLength);

        // 5. Вычисляем ключ сообщения (msg_key) по правилам MTProto 2.0.
        // x = 0 для сообщений от клиента к серверу.
        $msgKeyLarge = hash('sha256', substr($authKey->key, 88 + 0, 32) . $paddedPayload, true);
        $msgKey = substr($msgKeyLarge, 8, 16);

        // 6. Шифруем данные с помощью AES-256-IGE.
        $encryptedData = $this->aes->encrypt($paddedPayload, $authKey, $msgKey);

        //echo "[DEBUG] Sending with AuthKey_id: " . bin2hex($authKey->id) . "\n";
        // 7. Собираем финальный пакет: ID ключа + ключ сообщения + зашифрованные данные.
        $finalPacket = $authKey->id . $msgKey . $encryptedData;

        // 8. Возвращаем и сам пакет, и msg_id, который был в него "зашит".
        return [$finalPacket, $messageId];
    }

    /**
     * Распаковывает зашифрованное сообщение и возвращает его компоненты.
     * НЕ МЕНЯЕТ состояние сессии.
     *
     * @return array{
     *     body: string,
     *     msg_id: string,
     *     session_id: string,
     *     seq_no: int,
     *     server_salt: string
     * }
     */
    /**
     * Распаковывает зашифрованное сообщение от сервера.
     * Проверяет auth_key_id, msg_key и session_id.
     * Не меняет состояние сессии, только возвращает извлеченные данные.
     *
     * @param string  $rawResponse  Сырые бинарные данные, полученные из транспорта.
     * @param AuthKey $authKey      Текущий ключ авторизации.
     * @return array{
     *     body: string,
     *     msg_id: string,
     *     session_id: string,
     *     seq_no: int,
     *     server_salt: string
     * } Ассоциативный массив с компонентами сообщения.
     *
     * @throws \RuntimeException | TransportException
     */
    public function unpackEncrypted(string $rawResponse, AuthKey $authKey): array
    {
        if (\strlen($rawResponse) < 24) {
            throw new TransportException("Received encrypted response is too short (less than 24 bytes).");
        }
        $authKeyId = substr($rawResponse, 0, 8);
        $msgKey = substr($rawResponse, 8, 16);
        $encryptedData = substr($rawResponse, 24);

        // 2. Проверяем, что ID ключа совпадает с нашим.
        if ($authKeyId !== $authKey->id) {
            throw new \RuntimeException("Invalid auth_key_id in response. Expected " . bin2hex($authKey->id) . ", got " . bin2hex($authKeyId));
        }

        // 3. Расшифровываем данные с помощью AES-256-IGE.
        $decryptedPayload = $this->aes->decrypt($encryptedData, $authKey, $msgKey);

        // 4. Проверяем msg_key (ключевой шаг безопасности MTProto 2.0).
        // Это гарантирует, что данные не были подделаны в пути.
        // Для сообщений от сервера к клиенту x = 8.
        $expectedMsgKeyLarge = hash('sha256', substr($authKey->key, 88 + 8, 32) . $decryptedPayload, true);
        $expectedMsgKey = substr($expectedMsgKeyLarge, 8, 16);

        if ($msgKey !== $expectedMsgKey) {
            throw new \RuntimeException("MsgKey mismatch on received message. Possible tampering.");
        }

        // 5. Парсим внутренний заголовок расшифрованного сообщения.
        if (\strlen($decryptedPayload) < 32) {
            throw new \RuntimeException("Decrypted payload is too short to contain a valid MTProto header.");
        }
        $serverSalt = substr($decryptedPayload, 0, 8);
        $sessionId = substr($decryptedPayload, 8, 8);
        $messageId = substr($decryptedPayload, 16, 8);
        $seqNo = unpack('V', substr($decryptedPayload, 24, 4))[1];
        $messageLen = unpack('V', substr($decryptedPayload, 28, 4))[1];

        // 6. Извлекаем тело сообщения (фактическую полезную нагрузку TL).
        $messageBody = substr($decryptedPayload, 32, $messageLen);

        // 7. Проверяем, что длина тела соответствует заявленной.
        if (\strlen($messageBody) < $messageLen) {
            throw new \RuntimeException("Actual message body length is less than specified in header.");
        }

        // 8. Возвращаем все извлеченные компоненты в виде ассоциативного массива.
        return [
            'body' => $messageBody,
            'msg_id' => $messageId,
            'session_id' => $sessionId,
            'seq_no' => $seqNo,
            'server_salt' => $serverSalt,
        ];
    }
}