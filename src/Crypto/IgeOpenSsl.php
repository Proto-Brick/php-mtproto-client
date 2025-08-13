<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

/**
 * Реализация AES-IGE с использованием нативного расширения OpenSSL.
 * Используется, когда системная библиотека OpenSSL поддерживает режим 'aes-256-ige'.
 */
final readonly class IgeOpenSsl
{
    public function __construct(
        private string $key,
        private string $iv,
    ) {}

    public function encrypt(string $plaintext): string
    {
        $result = openssl_encrypt($plaintext, 'aes-256-ige', $this->key, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, $this->iv);
        if ($result === false) {
            throw new \RuntimeException("OpenSSL IGE encryption failed.");
        }
        return $result;
    }

    public function decrypt(string $ciphertext): string
    {
        $result = openssl_decrypt($ciphertext, 'aes-256-ige', $this->key, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, $this->iv);
        if ($result === false) {
            throw new \RuntimeException("OpenSSL IGE decryption failed.");
        }
        return $result;
    }
}
