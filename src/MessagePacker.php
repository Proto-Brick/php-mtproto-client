<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient;

use DigitalStars\MtprotoClient\Auth\AuthKey;
use DigitalStars\MtprotoClient\Crypto\Aes;
use DigitalStars\MtprotoClient\Exception\TransportException;
use DigitalStars\MtprotoClient\Session\Session;

class MessagePacker
{
    public function __construct(
        private readonly Settings $settings,
        private readonly Session $session,
        private readonly Aes $aes
    ) {}

    public function packUnencrypted(string $payload): string
    {
        // Сборка MTProto-сообщения (auth_key_id=0, msg_id, length, payload)
        return pack('P', 0)
            . $this->session->generateMessageId()
            . pack('V', strlen($payload))
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

    public function packEncrypted(string $payload, AuthKey $authKey): string
    {
        // 1. Формируем внутреннюю часть: salt + session_id + message_id + seq_no + message_data_len + message_data
        $salt = $this->session->getServerSalt() ?? throw new \LogicException("Server salt is not set");
        $sessionId = $this->session->getId() ?? throw new \LogicException("Session ID is not set");

        // TODO: Определить, является ли сообщение "Content-related"
        $isContentRelated = true;

        $messageId = $this->session->generateMessageId();
        $sequence = $this->session->generateSequence($isContentRelated);

        $unpaddedPayload = $salt
            . $sessionId
            . $messageId
            . pack('V', $sequence)
            . pack('V', strlen($payload))
            . $payload;

        $paddingLength = 16 - (strlen($unpaddedPayload) % 16);
        if ($paddingLength < 12) {
            $paddingLength += 16;
        }
        $paddedPayload = $unpaddedPayload . random_bytes($paddingLength);

        // 2. Вычисляем msg_key
        $msgKey = substr(hash('sha256', substr($authKey->key, 88, 32) . $paddedPayload, true), 8, 16);

        // 3. Шифруем
        $encryptedData = $this->aes->encrypt($paddedPayload, $authKey, $msgKey);

        // 4. Собираем финальное сообщение для отправки по транспорту
        $mtprotoMessage = $authKey->id . $msgKey . $encryptedData;

        // 5. Оборачиваем в транспорт
        if ($this->settings->transport === 'Intermediate') {
            $header = hex2bin('eeeeeeee');
            $length = pack('V', strlen($mtprotoMessage));
            return $header . $length . $mtprotoMessage;
        }

        throw new \InvalidArgumentException("Transport {$this->settings->transport} is not supported for encrypted messages yet.");
    }

    public function unpackEncrypted(string $rawResponse, AuthKey $authKey): string
    {
        // 1. Разбираем MTProto-сообщение
        $authKeyId = substr($rawResponse, 0, 8);
        $msgKey = substr($rawResponse, 8, 16);
        $encryptedData = substr($rawResponse, 24);

        if ($authKeyId !== $authKey->id) {
            throw new \RuntimeException("Invalid auth_key_id in response");
        }

        // 2. Расшифровываем
        $decryptedPayload = $this->aes->decrypt($encryptedData, $authKey, $msgKey);

        // 3. Проверяем msg_key
        $expectedMsgKey = substr(hash('sha256', substr($authKey->key, 96, 32) . $decryptedPayload, true), 8, 16);
        if ($msgKey !== $expectedMsgKey) {
            throw new \RuntimeException("MsgKey mismatch on received message.");
        }

        // 4. Парсим расшифрованные данные
        // salt (8) + session_id (8) + msg_id (8) + seq_no (4) + msg_len (4)
        $serverSalt = substr($decryptedPayload, 0, 8);
        $this->session->setServerSalt($serverSalt);

        // Возвращаем только полезную нагрузку (само тело TL-ответа)
        return substr($decryptedPayload, 32);
    }
}