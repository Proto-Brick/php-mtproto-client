<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

/**
 * Manual AES-256-IGE implementation using OpenSSL ECB mode.
 * Fallback for environments lacking native 'aes-256-ige' support.
 *
 * Benchmarks (Native vs. Phpseclib-ECB-Fallback):
 * - Faster than Phpseclib by stripping abstraction overhead.
 * - Encryption: Native is ~5.2x faster
 * - Decryption: Native is ~1.25x faster
 */
final class IgeOpenSslEcb
{
    private const CIPHER = 'aes-256-ecb';
    private const FLAGS = OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING;

    private string $iv1;
    private string $iv2;

    public function __construct(
        private readonly string $key,
        string $iv
    ) {
        $this->iv1 = substr($iv, 0, 16);
        $this->iv2 = substr($iv, 16, 16);
    }

    public function encrypt(string $plaintext): string
    {
        if ($plaintext === '') {
            return '';
        }

        $iv1 = $this->iv1;
        $iv2 = $this->iv2;
        $key = $this->key;

        $result = '';
        $len = strlen($plaintext);

        for ($i = 0; $i < $len; $i += 16) {
            $block = substr($plaintext, $i, 16);

            // AES-IGE Encryption:
            // C_i = Enc(P_i ^ C_{i-1}) ^ M_{i-1}
            $encrypted = openssl_encrypt($block ^ $iv1, self::CIPHER, $key, self::FLAGS);

            $iv1 = $encrypted ^ $iv2;
            $iv2 = $block;

            $result .= $iv1;
        }

        $this->iv1 = $iv1;
        $this->iv2 = $iv2;

        return $result;
    }

    public function decrypt(string $ciphertext): string
    {
        if ($ciphertext === '') {
            return '';
        }

        $iv1 = $this->iv1;
        $iv2 = $this->iv2;
        $key = $this->key;

        $result = '';
        $len = strlen($ciphertext);

        for ($i = 0; $i < $len; $i += 16) {
            $block = substr($ciphertext, $i, 16);

            // AES-IGE Decryption:
            // P_i = Dec(C_i ^ M_{i-1}) ^ C_{i-1}
            $decrypted = openssl_decrypt($block ^ $iv2, self::CIPHER, $key, self::FLAGS);

            $plaintextBlock = $decrypted ^ $iv1;

            $iv1 = $block;
            $iv2 = $plaintextBlock;

            $result .= $plaintextBlock;
        }

        $this->iv1 = $iv1;
        $this->iv2 = $iv2;

        return $result;
    }
}