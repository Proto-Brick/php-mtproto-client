<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

use phpseclib3\Math\BigInteger;

class Rsa
{
    private const TELEGRAM_PUBLIC_KEYS = [
        "-----BEGIN RSA PUBLIC KEY-----\n" .
        "MIIBCgKCAQEA6LszBcC1LGzyr992NzE0ieY+BSaOW622Aa9Bd4ZHLl+TuFQ4lo4g\n" .
        "5nKaMBwK/BIb9xUfg0Q29/2mgIR6Zr9krM7HjuIcCzFvDtr+L0GQjae9H0pRB2OO\n" .
        "62cECs5HKhT5DZ98K33vmWiLowc621dQuwKWSQKjWf50XYFw42h21P2KXUGyp2y/\n" .
        "+aEyZ+uVgLLQbRA1dEjSDZ2iGRy12Mk5gpYc397aYp438fsJoHIgJ2lgMv5h7WY9\n" .
        "t6N/byY9Nw9p21Og3AoXSL2q/2IJ1WRUhebgAdGVMlV1fkuOQoEzR7EdpqtQD9Cs\n" .
        "5+bfo3Nhmcyvk5ftB0WkJ9z6bNZ7yxrP8wIDAQAB\n" .
        '-----END RSA PUBLIC KEY-----',
    ];

    private const TELEGRAM_TEST_PUBLIC_KEYS = [
        "-----BEGIN RSA PUBLIC KEY-----\n" .
        "MIIBCgKCAQEAyMEdY1aR+sCR3ZSJrtztKTKqigvO/vBfqACJLZtS7QMgCGXJ6XIR\n" .
        "yy7mx66W0/sOFa7/1mAZtEoIokDP3ShoqF4fVNb6XeqgQfaUHd8wJpDWHcR2OFwv\n" .
        "plUUI1PLTktZ9uW2WE23b+ixNwJjJGwBDJPQEQFBE+vfmH0JP503wr5INS1poWg/\n" .
        "j25sIWeYPHYeOrFp/eXaqhISP6G+q2IeTaWTXpwZj4LzXq5YOpk4bYEQ6mvRq7D1\n" .
        "aHWfYmlEGepfaYR8Q0YqvvhYtMte3ITnuSJs171+GDqpdKcSwHnd6FudwGO4pcCO\n" .
        "j4WcDuXc2CTHgH8gFTNhp/Y8/SpDOhvn9QIDAQAB\n" .
        '-----END RSA PUBLIC KEY-----',
    ];

    public function findKeyByFingerprint(int $fingerprint): ?string
    {

        // Убрал отладочный вывод для чистоты
        foreach (self::TELEGRAM_PUBLIC_KEYS as $keyIndex => $keyPem) {
            $details = openssl_pkey_get_details(openssl_pkey_get_public($keyPem));
            if (!$details || !isset($details['rsa'])) {
                continue;
            }

            $n = $details['rsa']['n'];
            $e = $details['rsa']['e'];

            $n_tl_bytes = $this->serializeBytes($n);
            $e_tl_bytes = $this->serializeBytes($e);
            $dataForHash = $n_tl_bytes . $e_tl_bytes;

            if (\strlen($n) === 257 && $n[0] === "\0") {
                $n = substr($n, 1);
                echo "  n after normalization (len=" . \strlen($n) . "): " . bin2hex($n) . "\n";
            }

            // Вычисляем SHA1 и берем последние 8 байт (64 младших бита)
            $fingerprint_part_be = substr(sha1($dataForHash, true), -8);
            $calculatedFingerprint_int = unpack('q', $fingerprint_part_be)[1];

            if ($calculatedFingerprint_int === $fingerprint) {
                return $keyPem;
            }
        }

        return null;
    }

    // Вспомогательный метод для сериализации байтовой строки по правилам TL.
    // Эта логика взята из вашего TL\Serializer::bytes
    private function serializeBytes(string $value): string
    {
        $len = \strlen($value);
        if ($len <= 253) {
            $prefix = \chr($len);
            $paddingLen = (4 - (($len + 1) % 4)) % 4;
        } else {
            $prefix = "\xfe" . substr(pack('V', $len), 0, 3);
            $paddingLen = (4 - $len % 4) % 4;
        }
        return $prefix . $value . str_repeat("\x00", $paddingLen);
    }


    public function encryptPqInnerData(string $data, string $publicKeyPem): string
    {
        $details = openssl_pkey_get_details(openssl_pkey_get_public($publicKeyPem));
        if (!$details || !isset($details['rsa']['n'])) {
            throw new \RuntimeException("Could not get RSA key details.");
        }
        $modulus_n = new BigInteger($details['rsa']['n'], 256);

        while (true) {
            if (\strlen($data) > 144) { // Официальная документация указывает на 192, но примеры показывают, что данные обычно короче
                throw new \InvalidArgumentException("Data for RSA_PAD must not exceed 144 bytes for this step.");
            }
            $data_with_padding = $data . random_bytes(192 - \strlen($data));

            $data_pad_reversed = strrev($data_with_padding);
            $temp_key = random_bytes(32);
            $data_with_hash = $data_pad_reversed . hash('sha256', $temp_key . $data_with_padding, true);

            $ige = Ige::create($temp_key, str_repeat("\0", 32));
            $aes_encrypted = $ige->encrypt($data_with_hash);

            $temp_key_xor = $temp_key ^ hash('sha256', $aes_encrypted, true);
            $key_aes_encrypted = $temp_key_xor . $aes_encrypted;

            if ((new BigInteger($key_aes_encrypted, 256))->compare($modulus_n) < 0) {
                break;
            }
        }

        $encryptedData = '';
        if (!openssl_public_encrypt($key_aes_encrypted, $encryptedData, $publicKeyPem, OPENSSL_NO_PADDING)) {
            throw new \RuntimeException("Failed to encrypt with RSA: " . openssl_error_string());
        }

        if (\strlen($encryptedData) !== 256) {
            throw new \RuntimeException("RSA encryption result is not 256 bytes long.");
        }

        return $encryptedData;
    }
}
