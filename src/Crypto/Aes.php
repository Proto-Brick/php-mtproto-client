<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Crypto;
use DigitalStars\MtprotoClient\Auth\AuthKey;

class Aes
{
    /**
     * Шифрует данные с использованием AES-256-IGE.
     * @param string $payload Данные для шифрования.
     * @param AuthKey $authKey Ключ авторизации.
     * @param string $msgKey 128-битный ключ сообщения.
     * @return string Зашифрованные данные.
     */
    public function encrypt(string $payload, AuthKey $authKey, string $msgKey): string
    {
        [$aesKey, $aesIv] = $this->getAesKeyIv($authKey->key, $msgKey);
        return Ige::create($aesKey, $aesIv)->encrypt($payload);
    }

    /**
     * Расшифровывает данные.
     */
    public function decrypt(string $encryptedPayload, AuthKey $authKey, string $msgKey): string
    {
        [$aesKey, $aesIv] = $this->getAesKeyIv($authKey->key, $msgKey, true); // `true` для ответа от сервера
        return Ige::create($aesKey, $aesIv)->decrypt($encryptedPayload);
    }

    /**
     * Вычисляет aes_key и aes_iv из authKey и msgKey по правилам MTProto 2.0.
     */
    private function getAesKeyIv(string $authKey, string $msgKey, bool $fromServer = false): array
    {
        // x = 0 для сообщений клиент->сервер, x = 8 для сообщений сервер->клиент
        $x = $fromServer ? 8 : 0;

        // sha256_a = sha256(msg_key + substr(auth_key, x, 36))
        $sha256a = hash('sha256', $msgKey . substr($authKey, $x, 36), true);

        // sha256_b = sha256(substr(auth_key, 40+x, 36) + msg_key)
        $sha256b = hash('sha256', substr($authKey, 40 + $x, 36) . $msgKey, true);

        // aes_key = substr(sha256_a, 0, 8) + substr(sha256_b, 8, 16) + substr(sha256_a, 24, 8)
        $aesKey = substr($sha256a, 0, 8) . substr($sha256b, 8, 16) . substr($sha256a, 24, 8);

        // aes_iv = substr(sha256_b, 0, 8) + substr(sha256_a, 8, 16) + substr(sha256_b, 24, 8)
        $aesIv = substr($sha256b, 0, 8) . substr($sha256a, 8, 16) . substr($sha256b, 24, 8);

        return [$aesKey, $aesIv];
    }
}