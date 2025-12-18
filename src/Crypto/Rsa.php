<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA as PhpseclibRSA;
use phpseclib3\Crypt\Common\PublicKey as PhpseclibPublicKey;
use phpseclib3\Math\BigInteger;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        "-----BEGIN PUBLIC KEY-----\n" .
        "MIIBCgKCAQEAyMEdY1aR+sCR3ZSJrtztKTKqigvO/vBfqACJLZtS7QMgCGXJ6XIR\n" .
        "yy7mx66W0/sOFa7/1mAZtEoIokDP3ShoqF4fVNb6XeqgQfaUHd8wJpDWHcR2OFwv\n" .
        "plUUI1PLTktZ9uW2WE23b+ixNwJjJGwBDJPQEQFBE+vfmH0JP503wr5INS1poWg/\n" .
        "j25sIWeYPHYeOrFp/eXaqhISP6G+q2IeTaWTXpwZj4LzXq5YOpk4bYEQ6mvRq7D1\n" .
        "aHWfYmlEGepfaYR8Q0YqvvhYtMte3ITnuSJs171+GDqpdKcSwHnd6FudwGO4pcCO\n" .
        "j4WcDuXc2CTHgH8gFTNhp/Y8/SpDOhvn9QIDAQAB\n" .
        '-----END PUBLIC KEY-----',
    ];

    private bool $useOpenSsl;

    public function __construct()
    {
        $this->useOpenSsl = extension_loaded('openssl');
    }

    public function findKeyByFingerprint(int $fingerprint): ?string
    {
        foreach (self::TELEGRAM_PUBLIC_KEYS as $keyPem) {
            $n = null;
            $e = null;

            // 1. Сначала пробуем быстрый OpenSSL (если доступен)
            if ($this->useOpenSsl) {
                // Используем @ для подавления варнингов OpenSSL в логах
                $publicKey = @openssl_pkey_get_public($keyPem);

                if ($publicKey === false) {
                    while ($msg = openssl_error_string()) {
                        echo "OpenSSL Error: $msg\n";
                    }
                }

                if ($publicKey !== false) {
                    $details = openssl_pkey_get_details($publicKey);
                    if ($details && isset($details['rsa']['n'], $details['rsa']['e'])) {
                        $n = $details['rsa']['n'];
                        $e = $details['rsa']['e'];

                        // Убираем лидирующий ноль, если OpenSSL его добавил
                        if (\strlen($n) === 257 && $n[0] === "\0") {
                            $n = substr($n, 1);
                        }
                    }
                }
            }

            // 2. Fallback: Если OpenSSL не справился (вернул false) или выключен,
            // пробуем phpseclib. Он работает на чистом PHP и "всеяден".
            if ($n === null) {
                try {
                    /** @var PhpseclibPublicKey $key */
                    $key = PublicKeyLoader::load($keyPem);
                    $raw = $key->toString('Raw');

                    if (isset($raw['n'], $raw['e'])) {
                        $n = $raw['n']->toBytes();
                        $e = $raw['e']->toBytes();
                    }
                } catch (\Throwable) {
                    // Если даже phpseclib не смог прочитать — ключ реально битый
                    continue;
                }
            }

            // Если не удалось извлечь компоненты ни одним способом — пропускаем
            if ($n === null || $e === null) {
                continue;
            }

            // 3. Считаем фингерпринт
            $n_tl_bytes = Serializer::bytes($n);
            $e_tl_bytes = Serializer::bytes($e);
            $dataForHash = $n_tl_bytes . $e_tl_bytes;

            $fingerprint_part_be = substr(sha1($dataForHash, true), -8);
            $calculatedFingerprint_int = unpack('q', $fingerprint_part_be)[1];

            if ($calculatedFingerprint_int === $fingerprint) {
                return $keyPem;
            }
        }

        return null;
    }

    public function encryptPqInnerData(string $data, string $publicKeyPem): string
    {
        $start = hrtime(true);
        $modulusBigInt = null;
        $openSslKeyRes = null;
        $phpseclibKey = null;


        // 1. Попытка использовать OpenSSL (быстро)
        if ($this->useOpenSsl) {
            // @ - подавляем ошибки, если OpenSSL не понимает формат ключа
            $resource = @openssl_pkey_get_public($publicKeyPem);

            if ($resource !== false) {
                $details = openssl_pkey_get_details($resource);
                if (isset($details['rsa']['n'])) {
                    $openSslKeyRes = $resource;
                    $modulusBigInt = new BigInteger($details['rsa']['n'], 256);
                }
            }
        }

        // 2. Fallback на phpseclib (медленно, но надежно), если OpenSSL не справился
        if ($modulusBigInt === null) {
            try {
                /** @var PhpseclibPublicKey $phpseclibKey */
                $phpseclibKey = PublicKeyLoader::load($publicKeyPem);
                $raw = $phpseclibKey->toString('Raw');

                if (!isset($raw['n'])) {
                    throw new \RuntimeException("Invalid RSA key format in phpseclib.");
                }
                $modulusBigInt = $raw['n'];
            } catch (\Throwable $e) {
                throw new \RuntimeException("Failed to load RSA key via both OpenSSL and phpseclib.", 0, $e);
            }
        }

        if (\strlen($data) > 144) {
            throw new \InvalidArgumentException("Data for RSA_PAD must not exceed 144 bytes.");
        }

        $paddingLen = 192 - \strlen($data);

        // Попытки подобрать такой паддинг, чтобы (data < modulus)
        for ($i = 0; $i < 20; $i++) {
            $data_with_padding = $data . random_bytes($paddingLen);
            $data_pad_reversed = strrev($data_with_padding);
            $temp_key = random_bytes(32);
            $data_with_hash = $data_pad_reversed . hash('sha256', $temp_key . $data_with_padding, true);

            $ige = Ige::create($temp_key, str_repeat("\0", 32));
            $aes_encrypted = $ige->encrypt($data_with_hash);

            $temp_key_xor = $temp_key ^ hash('sha256', $aes_encrypted, true);
            $key_aes_encrypted = $temp_key_xor . $aes_encrypted;

            // Проверка условия RSA: m < n
            if ((new BigInteger($key_aes_encrypted, 256))->compare($modulusBigInt) < 0) {

                // ВЕТВЛЕНИЕ: Выбираем метод шифрования в зависимости от того, как загрузили ключ
                if ($openSslKeyRes !== null) {
                    $encryptedData = '';
                    if (!openssl_public_encrypt(
                        $key_aes_encrypted,
                        $encryptedData,
                        $openSslKeyRes,
                        OPENSSL_NO_PADDING
                    )) {
                        throw new \RuntimeException("Failed to encrypt with RSA OpenSSL: " . openssl_error_string());
                    }
                    if (\strlen($encryptedData) !== 256) {
                        throw new \RuntimeException("RSA encryption result is not 256 bytes long.");
                    }
                    $time = (hrtime(true) - $start) / 1e+6;
                    echo sprintf("[Crypto] OpenSSL RSA Encryption (with padding hunt): %.2fms\n", $time);
                    return $encryptedData;
                }

                // Используем phpseclib
                $key = $phpseclibKey->withPadding(PhpseclibRSA::ENCRYPTION_NONE);
                $encryptedData = $key->encrypt($key_aes_encrypted);
                $time = (hrtime(true) - $start) / 1e+6;
                echo sprintf("[Crypto] phpseclib RSA Encryption (with padding hunt): %.2fms\n", $time);
                return $encryptedData;
            }
        }

        throw new \RuntimeException(
            "Failed to generate a valid RSA-encrypted payload (m < n check) within 20 attempts."
        );
    }
}