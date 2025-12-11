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
        "-----BEGIN RSA PUBLIC KEY-----\n" .
        "MIIBCgKCAQEAyMEdY1aR+sCR3ZSJrtztKTKqigvO/vBfqACJLZtS7QMgCGXJ6XIR\n" .
        "yy7mx66W0/sOFa7/1mAZtEoIokDP3ShoqF4fVNb6XeqgQfaUHd8wJpDWHcR2OFwv\n" .
        "plUUI1PLTktZ9uW2WE23b+ixNwJjJGwBDJPQEQFBE+vfmH0JP503wr5INS1poWg/\n" .
        "j25sIWeYPHYeOrFp/eXaqhISP6G+q2IeTaWTXpwZj4LzXq5YOpk4bYEQ6mvRq7D1\n" .
        "aHWfYmlEGepfaYR8Q0YqvvhYtMte3ITnuSJs171+GDqpdKcSwHnd6FudwGO4pcCO\n" .
        "j4WcDuXc2CTHgH8gFTNhp/Y8/SpDOhvn9QIDAQAB\n" .
        '-----END RSA PUBLIC KEY-----',
    ];

    private bool $useOpenSsl;

    public function __construct()
    {
        $this->useOpenSsl = extension_loaded('openssl');
    }

    public function findKeyByFingerprint(int $fingerprint): ?string
    {
        foreach (self::TELEGRAM_PUBLIC_KEYS as $keyPem) {
            if ($this->useOpenSsl) {
                $details = openssl_pkey_get_details(openssl_pkey_get_public($keyPem));
                if (!$details || !isset($details['rsa'])) {
                    continue;
                }

                $n = $details['rsa']['n'];
                $e = $details['rsa']['e'];

                if (\strlen($n) === 257 && $n[0] === "\0") {
                    $n = substr($n, 1);
                }
            } else {
                try {
                    /** @var PhpseclibPublicKey $key */
                    $key = PublicKeyLoader::load($keyPem);
                    $raw = $key->toString('Raw');

                    if (!isset($raw['n'], $raw['e'])) {
                        continue;
                    }

                    $n = $raw['n']->toBytes();
                    $e = $raw['e']->toBytes();
                } catch (\Throwable) {
                    continue;
                }
            }

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
        $phpseclibKey = null;

        if ($this->useOpenSsl) {
            $details = openssl_pkey_get_details(openssl_pkey_get_public($publicKeyPem));
            if (!$details || !isset($details['rsa']['n'])) {
                throw new \RuntimeException("Could not get RSA key details via OpenSSL.");
            }

            $modulusBigInt = new BigInteger($details['rsa']['n'], 256);
        } else {
            /** @var PhpseclibPublicKey $phpseclibKey */
            $phpseclibKey = PublicKeyLoader::load($publicKeyPem);

            $raw = $phpseclibKey->toString('Raw');
            if (!isset($raw['n'])) {
                throw new \RuntimeException("Invalid RSA key format in phpseclib.");
            }
            $modulusBigInt = $raw['n'];
        }

        if (\strlen($data) > 144) {
            throw new \InvalidArgumentException("Data for RSA_PAD must not exceed 144 bytes.");
        }

        $paddingLen = 192 - \strlen($data);

        for ($i = 0; $i < 20; $i++) {
            $data_with_padding = $data . random_bytes($paddingLen);
            $data_pad_reversed = strrev($data_with_padding);
            $temp_key = random_bytes(32);
            $data_with_hash = $data_pad_reversed . hash('sha256', $temp_key . $data_with_padding, true);

            $ige = Ige::create($temp_key, str_repeat("\0", 32));
            $aes_encrypted = $ige->encrypt($data_with_hash);

            $temp_key_xor = $temp_key ^ hash('sha256', $aes_encrypted, true);
            $key_aes_encrypted = $temp_key_xor . $aes_encrypted;

            if ((new BigInteger($key_aes_encrypted, 256))->compare($modulusBigInt) < 0) {
                if ($this->useOpenSsl) {
                    $encryptedData = '';
                    if (!openssl_public_encrypt(
                        $key_aes_encrypted,
                        $encryptedData,
                        $publicKeyPem,
                        OPENSSL_NO_PADDING
                    )) {
                        throw new \RuntimeException("Failed to encrypt with RSA OpenSSL: " . openssl_error_string());
                    }
                    if (\strlen($encryptedData) !== 256) {
                        throw new \RuntimeException("RSA encryption result is not 256 bytes long.");
                    }
                    return $encryptedData;
                }

                $key = $phpseclibKey->withPadding(PhpseclibRSA::ENCRYPTION_NONE);
                $encryptedData = $key->encrypt($key_aes_encrypted);

                return $encryptedData;
            }
        }

        throw new \RuntimeException(
            "Failed to generate a valid RSA-encrypted payload (m < n check) within 20 attempts."
        );
    }
}