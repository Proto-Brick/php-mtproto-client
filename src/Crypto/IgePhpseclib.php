<?php
declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Crypto;

use phpseclib3\Crypt\AES;

/**
 * Ручная реализация AES-IGE с использованием phpseclib в режиме ECB.
 * Используется как fallback, если OpenSSL не поддерживает IGE.
 */
final class IgePhpseclib
{
    private AES $aes;
    private string $iv_part_1;
    private string $iv_part_2;

    public function __construct(string $key, string $iv)
    {
        $this->aes = new AES('ecb');
        $this->aes->setKey($key);
        $this->aes->disablePadding();

        $this->iv_part_1 = substr($iv, 0, 16);
        $this->iv_part_2 = substr($iv, 16);
    }

    public function encrypt(string $plaintext): string
    {
        $ciphertext = '';
        for ($i = 0, $iMax = strlen($plaintext); $i < $iMax; $i += 16) {
            $block = substr($plaintext, $i, 16);
            $encrypted_block = $this->aes->encrypt($block ^ $this->iv_part_1) ^ $this->iv_part_2;
            $ciphertext .= $encrypted_block;

            $this->iv_part_1 = $encrypted_block;
            $this->iv_part_2 = $block;
        }
        return $ciphertext;
    }

    public function decrypt(string $ciphertext): string
    {
        $plaintext = '';
        for ($i = 0, $iMax = strlen($ciphertext); $i < $iMax; $i += 16) {
            $block = substr($ciphertext, $i, 16);
            $decrypted_block = $this->aes->decrypt($block ^ $this->iv_part_2) ^ $this->iv_part_1;
            $plaintext .= $decrypted_block;

            $this->iv_part_1 = $block;
            $this->iv_part_2 = $decrypted_block;
        }
        return $plaintext;
    }
}