<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Crypto;
use Brick\Math\BigInteger;
use phpseclib3\Crypt\AES;

class Rsa
{
    private const TELEGRAM_PUBLIC_KEYS = [
        "-----BEGIN RSA PUBLIC KEY-----\n".
        "MIIBCgKCAQEA6LszBcC1LGzyr992NzE0ieY+BSaOW622Aa9Bd4ZHLl+TuFQ4lo4g\n".
        "5nKaMBwK/BIb9xUfg0Q29/2mgIR6Zr9krM7HjuIcCzFvDtr+L0GQjae9H0pRB2OO\n".
        "62cECs5HKhT5DZ98K33vmWiLowc621dQuwKWSQKjWf50XYFw42h21P2KXUGyp2y/\n".
        "+aEyZ+uVgLLQbRA1dEjSDZ2iGRy12Mk5gpYc397aYp438fsJoHIgJ2lgMv5h7WY9\n".
        "t6N/byY9Nw9p21Og3AoXSL2q/2IJ1WRUhebgAdGVMlV1fkuOQoEzR7EdpqtQD9Cs\n".
        "5+bfo3Nhmcyvk5ftB0WkJ9z6bNZ7yxrP8wIDAQAB\n".
        '-----END RSA PUBLIC KEY-----',
    ];

    private const TELEGRAM_TEST_PUBLIC_KEYS = [
        "-----BEGIN RSA PUBLIC KEY-----\n".
        "MIIBCgKCAQEAyMEdY1aR+sCR3ZSJrtztKTKqigvO/vBfqACJLZtS7QMgCGXJ6XIR\n".
        "yy7mx66W0/sOFa7/1mAZtEoIokDP3ShoqF4fVNb6XeqgQfaUHd8wJpDWHcR2OFwv\n".
        "plUUI1PLTktZ9uW2WE23b+ixNwJjJGwBDJPQEQFBE+vfmH0JP503wr5INS1poWg/\n".
        "j25sIWeYPHYeOrFp/eXaqhISP6G+q2IeTaWTXpwZj4LzXq5YOpk4bYEQ6mvRq7D1\n".
        "aHWfYmlEGepfaYR8Q0YqvvhYtMte3ITnuSJs171+GDqpdKcSwHnd6FudwGO4pcCO\n".
        "j4WcDuXc2CTHgH8gFTNhp/Y8/SpDOhvn9QIDAQAB\n".
        '-----END RSA PUBLIC KEY-----',
    ];

    public function findKeyByFingerprint(string $fingerprint): ?string
    {

        // --- ДОБАВЬТЕ ЭТОТ ОТЛАДОЧНЫЙ БЛОК ---
        echo "DEBUG: Rsa::findKeyByFingerprint is searching for: " . bin2hex($fingerprint) . "\n";
        // --- КОНЕЦ ОТЛАДОЧНОГО БЛОКА ---

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

            if (strlen($n) === 257 && $n[0] === "\0") {
                $n = substr($n, 1);
                echo "  n after normalization (len=" . strlen($n) . "): " . bin2hex($n) . "\n";
            }

            // Вычисляем SHA1 и берем последние 8 байт (64 младших бита)
            $fingerprint_part_be = substr(sha1($dataForHash, true), -8);
            $calculatedFingerprint = strrev($fingerprint_part_be);

            if ($calculatedFingerprint === $fingerprint) {
                return $keyPem;
            }
        }

        return null;
    }

// Вспомогательный метод для сериализации байтовой строки по правилам TL.
// Эта логика взята из вашего TL\Serializer::bytes
    private function serializeBytes(string $value): string
    {
        $len = strlen($value);
        if ($len <= 253) {
            $prefix = chr($len);
            $paddingLen = (4 - (($len + 1) % 4)) % 4;
        } else {
            $prefix = "\xfe" . substr(pack('V', $len), 0, 3);
            $paddingLen = (4 - $len % 4) % 4;
        }
        return $prefix . $value . str_repeat("\x00", $paddingLen);
    }

    public function encryptPqInnerData(string $data, string $publicKeyPem): string
    {
        // Реализация RSA_PAD для MTProto 2.0
        // Извлекаем модуль 'n' из публичного ключа для сравнения
        $details = openssl_pkey_get_details(openssl_pkey_get_public($publicKeyPem));
        if (!$details || !isset($details['rsa']['n'])) {
            throw new \RuntimeException("Could not get RSA key details.");
        }
        $modulus_n = BigInteger::fromBytes($details['rsa']['n'], false); // false = big-endian

        // --- НАЧАЛО ЦИКЛА ПРОВЕРКИ ---
        while (true) {
            // 1. Дополняем данные до 192 байт
            if (strlen($data) > 192) {
                throw new \InvalidArgumentException("Data for RSA_PAD must not exceed 192 bytes.");
            }
            $data_with_padding = $data . random_bytes(192 - strlen($data));

            // 2. Реверсируем байты
            $data_pad_reversed = strrev($data_with_padding);

            // 3. Генерируем временный ключ
            $temp_key = random_bytes(32);

            // 4. Формируем 224-байтный блок для AES-шифрования
            $data_with_hash = $data_pad_reversed . hash('sha256', $temp_key . $data_with_padding, true);

            // 5. Шифруем AES-256-IGE с нулевым вектором инициализации (IV)
            $ige = Ige::create($temp_key, str_repeat("\0", 32));
            $aes_encrypted = $ige->encrypt($data_with_hash);

            // 6. Модифицируем temp_key
            $temp_key_xor = $temp_key ^ hash('sha256', $aes_encrypted, true);

            // 7. Собираем 256-байтный блок (32 байта ключа + 224 байта данных)
            $key_aes_encrypted = $temp_key_xor . $aes_encrypted;

            // --- ДОБАВЛЕНА ПРОВЕРКА ---
            // Сравниваем наше число с модулем. Если оно меньше, выходим из цикла.
            if (BigInteger::fromBytes($key_aes_encrypted, false)->isLessThan($modulus_n)) {
                break;
            }
            // В противном случае, цикл начнется заново с новым random temp_key
            echo "DEBUG: key_aes_encrypted >= modulus, retrying...\n";
        }
        // --- КОНЕЦ ЦИКЛА ПРОВЕРКИ ---


        // 8. Финальное RSA-шифрование (теперь оно гарантированно сработает)
        $encryptedData = '';
        if (!openssl_public_encrypt($key_aes_encrypted, $encryptedData, $publicKeyPem, OPENSSL_NO_PADDING)) {
            // Эта ошибка теперь не должна возникать, но оставим проверку для надежности
            throw new \RuntimeException("Failed to encrypt with RSA: " . openssl_error_string());
        }

        if (strlen($encryptedData) !== 256) {
            throw new \RuntimeException("RSA encryption result is not 256 bytes long.");
        }

        return $encryptedData;
    }
}