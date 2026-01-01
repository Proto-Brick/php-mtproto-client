<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA as PhpseclibRSA;
use phpseclib3\Math\BigInteger;
use ProtoBrick\MTProtoClient\TL\Serializer;

class Rsa
{
    private const TELEGRAM_PUBLIC_KEYS = [
        "-----BEGIN PUBLIC KEY-----\n" .
        "MIIBCgKCAQEA6LszBcC1LGzyr992NzE0ieY+BSaOW622Aa9Bd4ZHLl+TuFQ4lo4g\n" .
        "5nKaMBwK/BIb9xUfg0Q29/2mgIR6Zr9krM7HjuIcCzFvDtr+L0GQjae9H0pRB2OO\n" .
        "62cECs5HKhT5DZ98K33vmWiLowc621dQuwKWSQKjWf50XYFw42h21P2KXUGyp2y/\n" .
        "+aEyZ+uVgLLQbRA1dEjSDZ2iGRy12Mk5gpYc397aYp438fsJoHIgJ2lgMv5h7WY9\n" .
        "t6N/byY9Nw9p21Og3AoXSL2q/2IJ1WRUhebgAdGVMlV1fkuOQoEzR7EdpqtQD9Cs\n" .
        "5+bfo3Nhmcyvk5ftB0WkJ9z6bNZ7yxrP8wIDAQAB\n" .
        '-----END PUBLIC KEY-----',
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

    /**
     * Finds the PEM key by its fingerprint (lower 64 bits of SHA1(n+e)).
     */
    public function findKeyByFingerprint(int $fingerprint): ?string
    {
        foreach (self::TELEGRAM_PUBLIC_KEYS as $keyPem) {
            try {
                // phpseclib automatically detects key format (PKCS#1 or PKCS#8)
                /** @var PhpseclibRSA $key */
                $key = PublicKeyLoader::load($keyPem);

                $raw = $key->toString('Raw');
                /** @var BigInteger $n */
                $n = $raw['n'];
                /** @var BigInteger $e */
                $e = $raw['e'];

                $nBytes = Serializer::bytes($n->toBytes());
                $eBytes = Serializer::bytes($e->toBytes());

                $hash = sha1($nBytes . $eBytes, true);

                $fingerprintPart = substr($hash, -8);
                $calculatedFingerprint = unpack('q', $fingerprintPart)[1];

                if ($calculatedFingerprint === $fingerprint) {
                    return $keyPem;
                }
            } catch (\Throwable) {
                continue;
            }
        }

        return null;
    }

    /**
     * Encrypts P_Q_inner_data using "Padding Hunt" to ensure m < n.
     */
    public function encryptPqInnerData(string $data, string $publicKeyPem): string
    {
        $start = hrtime(true);

        try {
            // phpseclib automatically detects key format (PKCS#1 or PKCS#8)
            /** @var PhpseclibRSA $key */
            $key = PublicKeyLoader::load($publicKeyPem);

            $rawKey = $key->toString('Raw');
            /** @var BigInteger $modulus */
            $modulus = $rawKey['n'];

            // MTProto uses custom padding, disable standard PKCS#1/OAEP
            $key = $key->withPadding(PhpseclibRSA::ENCRYPTION_NONE);
        } catch (\Throwable $e) {
            throw new \RuntimeException("Failed to load RSA key.", 0, $e);
        }

        if (\strlen($data) > 144) {
            throw new \InvalidArgumentException("Data for RSA_PAD must not exceed 144 bytes.");
        }

        // 256 bytes (block) - 32 bytes (hash) - data_len
        $paddingLen = 192 - \strlen($data);

        for ($i = 0; $i < 20; $i++) {
            $data_with_padding = $data . random_bytes($paddingLen);

            // Reverse before hashing (MTProto specific)
            $data_pad_reversed = strrev($data_with_padding);

            $temp_key = random_bytes(32);
            $data_with_hash = $data_pad_reversed . hash('sha256', $temp_key . $data_with_padding, true);

            $ige = Ige::create($temp_key, str_repeat("\0", 32));
            $aes_encrypted = $ige->encrypt($data_with_hash);

            $temp_key_xor = $temp_key ^ hash('sha256', $aes_encrypted, true);
            $key_aes_encrypted = $temp_key_xor . $aes_encrypted;

            // Check m < n
            if ((new BigInteger($key_aes_encrypted, 256))->compare($modulus) < 0) {
                // phpseclib automatically uses OpenSSL/GMP/BCMath or Native PHP engine
                $encryptedData = $key->encrypt($key_aes_encrypted);

                $time = (hrtime(true) - $start) / 1e+6;
                echo sprintf("[Crypto] RSA Encryption: %.2fms\n", $time);

                return $encryptedData;
            }
        }

        throw new \RuntimeException(
            "Failed to generate a valid RSA-encrypted payload (m < n check) within 20 attempts."
        );
    }
}