<?php
declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Auth;

use DigitalStars\MtprotoClient\Crypto\Aes;
use DigitalStars\MtprotoClient\Crypto\Rsa;
use DigitalStars\MtprotoClient\Domain\Factorizer;
use DigitalStars\MtprotoClient\MessagePacker;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\Transport\Transport;
use Brick\Math\BigInteger;

class AuthKeyCreator
{
    /**
     * @param Aes $aes Зависимость добавлена для шага 4 (расшифровка ответа DH)
     */
    public function __construct(
        private readonly Transport $transport,
        private readonly Serializer $serializer,
        private readonly Deserializer $deserializer,
        private readonly Rsa $rsa,
        private readonly MessagePacker $messagePacker,
        private readonly Aes $aes // <-- НОВАЯ ЗАВИСИМОСТЬ
    )
    {
    }

    /**
     * Выполняет полный цикл создания ключа авторизации (шаги 1-4).
     */
    public function create(): AuthKey
    {
        // Шаг 1: req_pq_multi
        $resPQData = $this->sendReqPq();
        echo "Step 1 (req_pq): OK\n";

        // Шаг 2: Факторизация pq
        $pq = BigInteger::fromBytes($resPQData['pq'], false);
        list($p_val, $q_val) = Factorizer::factorize($pq);
        $p = $p_val->toBytes(false); // false для big-endian
        $q = $q_val->toBytes(false);
        echo "Step 2 (factorization): OK (p=$p_val, q=$q_val)\n";

        // Шаг 3: req_DH_params
        $serverDhParams = $this->sendReqDhParams($resPQData, $p, $q);
        echo "Step 3 (req_DH_params): OK\n";

        // Шаг 4: set_client_DH_params
        $authKey = $this->sendSetClientDhParams($resPQData, $serverDhParams);
        echo "Step 4 (set_client_DH_params): OK, AuthKey created!\n";

        return $authKey;
    }

    /**
     * Шаг 1: Отправка запроса req_pq_multi и получение ResPQ.
     */
    private function sendReqPq(): array
    {
        $nonce = random_bytes(16);

        // payload - это чистый TL-объект. Правильно.
        $payload = $this->serializer->int32(0xbe7e8ef1) . $this->serializer->int128($nonce);

        // MessagePacker теперь вернет [длина=40][MTProto-пакет_40_байт]
        $request = $this->messagePacker->packUnencrypted($payload);
        $this->transport->send($request);

        // Transport получит [длина=100][MTProto-пакет_100_байт] и вернет только MTProto-пакет
        $rawResponse = $this->transport->receive();

        // unpackUnencrypted просто вернет пакет как есть. Правильно.
        $responsePayload = $this->messagePacker->unpackUnencrypted($rawResponse);

        // Проверяем auth_key_id. Это важно.
        $auth_key_id = substr($responsePayload, 0, 8);
        if ($auth_key_id !== pack('P', 0)) {
            throw new \RuntimeException("Invalid auth_key_id in response. Expected 0, got " . bin2hex($auth_key_id));
        }

        // Отрезаем MTProto-конверт. Правильно.
        $tlObjectPayload = substr($responsePayload, 20);

        echo "DEBUG: Payload for Deserializer: " . bin2hex($tlObjectPayload) . "\n";

        $deserialized = $this->deserializer->deserializeResPQ($tlObjectPayload);

        if ($deserialized['nonce'] !== $nonce) {
            throw new \RuntimeException("Nonce mismatch in resPQ response.");
        }

        $deserialized['original_nonce'] = $nonce;
        return $deserialized;
    }

    /**
     * Шаг 3: Отправка запроса req_DH_params.
     */
    private function sendReqDhParams(array $resPQData, string $p, string $q): array
    {
        $publicKeyPem = null;
        $foundFingerprint = null;

        echo "\n--- DEBUG: Server Fingerprints ---\n";
        echo "Server sent " . count($resPQData['fingerprints']) . " fingerprints:\n";
        foreach ($resPQData['fingerprints'] as $fp) {
            echo "- " . bin2hex($fp) . "\n";
        }
        echo "-----------------------------------\n\n";

        foreach ($resPQData['fingerprints'] as $fingerprint) {
            $key = $this->rsa->findKeyByFingerprint($fingerprint);
            if ($key !== null) {
                $publicKeyPem = $key;
                $foundFingerprint = $fingerprint;
                break; // Нашли совпадение, выходим из цикла
            }
        }

        if ($publicKeyPem === null) {
            // Если после перебора всех отпечатков совпадения так и не нашлось
            throw new \RuntimeException("Could not find a public key for any of the server's fingerprints.");
        }

        $newNonce = random_bytes(32);

        // Сборка p_q_inner_data
        $innerDataPayload =
            $this->serializer->int32(0xa9f55f95)
            . $this->serializer->bytes($resPQData['pq'])
            . $this->serializer->bytes($p)
            . $this->serializer->bytes($q)
            . $this->serializer->int128($resPQData['original_nonce'])
            . $this->serializer->int128($resPQData['server_nonce'])
            . $this->serializer->int256($newNonce)
            // -----------------------------------------------------------------
            . $this->serializer->int32(2);

        // --- ДОБАВЬТЕ ЭТОТ БЛОК ---
        echo "\n--- DEBUG: p_q_inner_data ---\n";
        echo "p_q_inner_data (len=" . strlen($innerDataPayload) . "): " . bin2hex($innerDataPayload) . "\n";
        echo "---------------------------\n";
        // --- КОНЕЦ БЛОКА ---

        // Шифрование inner_data
        $encryptedInnerData = $this->rsa->encryptPqInnerData($innerDataPayload, $publicKeyPem);

        // Сборка и отправка req_DH_params
        $payload =
            $this->serializer->int32(0xd712e4be) // req_DH_params
            . $this->serializer->int128($resPQData['nonce'])
            . $this->serializer->int128($resPQData['server_nonce'])
            . $this->serializer->bytes($p)
            . $this->serializer->bytes($q)
            . $foundFingerprint // fingerprint это уже 8-байтовая бинарная строка (long)
            . $this->serializer->bytes($encryptedInnerData);

        $request = $this->messagePacker->packUnencrypted($payload);
        $this->transport->send($request);
        $rawResponse = $this->transport->receive();
        $responsePayload = $this->messagePacker->unpackUnencrypted($rawResponse);

        // Снова пропускаем заголовок
        $responsePayload = substr($responsePayload, 20);

        // Десериализация ответа (Server_DH_Params)
        $constructor = $this->deserializer->int32($responsePayload);
        if ($constructor !== 0xd0e8075c) { // server_DH_params_ok
            throw new \RuntimeException("Server_DH_Params failed. Got constructor " . dechex($constructor));
        }

        if ($this->deserializer->int128($responsePayload) !== $resPQData['nonce']) {
            throw new \RuntimeException("Invalid nonce in Server_DH_Params response.");
        }
        if ($this->deserializer->int128($responsePayload) !== $resPQData['server_nonce']) {
            throw new \RuntimeException("Invalid server_nonce in Server_DH_Params response.");
        }

        $encryptedAnswer = $this->deserializer->bytes($responsePayload);

        return ['encrypted_answer' => $encryptedAnswer, 'new_nonce' => $newNonce];
    }

    private function sendSetClientDhParams(array $resPQData, array $serverDhParams): AuthKey
    {
        // --- Этап 1: Расшифровка ответа сервера (server_DH_inner_data) ---
        $tmp_aes_key = hash('sha256', $serverDhParams['new_nonce'] . $resPQData['server_nonce'], true);
        $tmp_aes_iv = substr(hash('sha256', $resPQData['server_nonce'] . $serverDhParams['new_nonce'], true), 0, 16)
            . substr(hash('sha256', $serverDhParams['new_nonce'] . $serverDhParams['new_nonce'], true), 0, 16);

        $decryptedAnswer = openssl_decrypt($serverDhParams['encrypted_answer'], 'aes-256-ige', $tmp_aes_key, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, $tmp_aes_iv);
        if ($decryptedAnswer === false) {
            throw new \RuntimeException("Failed to decrypt server_DH_inner_data.");
        }

        // --- Этап 2: Валидация хэша и парсинг server_DH_inner_data ---
        // В MTProto 1.0 хэш был SHA1 (20 байт). В 2.0 это SHA256 (32 байта).
        // Спецификация обмена ключами немного отстает, и серверы могут по-прежнему использовать SHA1.
        // Начнем с проверки SHA1, так как это самый частый случай на этом этапе.
        $answerHash = substr($decryptedAnswer, 0, 20);
        $innerDataWithPadding = substr($decryptedAnswer, 20);
        $streamForParsing = $innerDataWithPadding;

        $dhInnerData = $this->deserializer->deserializeServerDhInnerData($streamForParsing);
        $actualDataLength = strlen($innerDataWithPadding) - strlen($streamForParsing);
        $actualData = substr($innerDataWithPadding, 0, $actualDataLength);

        if (hash('sha1', $actualData, true) !== $answerHash) {
            throw new \RuntimeException("SHA1 hash mismatch in server_DH_inner_data.");
        }

        // --- Этап 3: Проверки безопасности и извлечение данных ---
        if ($dhInnerData['nonce'] !== $resPQData['nonce']) throw new \RuntimeException("Nonce mismatch in decrypted DH answer.");
        if ($dhInnerData['server_nonce'] !== $resPQData['server_nonce']) throw new \RuntimeException("Server nonce mismatch in decrypted DH answer.");

        $g = $dhInnerData['g'];
        $dh_prime_bytes = $dhInnerData['dh_prime'];
        $g_a_bytes = $dhInnerData['g_a'];
        $dh_prime = BigInteger::fromBytes($dh_prime_bytes, false);
        $g_a = BigInteger::fromBytes($g_a_bytes, false);

        // --- Этап 4: Вычисления по протоколу Диффи-Хеллмана ---
        $b = random_bytes(256);
        $b_bi = BigInteger::fromBytes($b, false);
        $g_bi = BigInteger::of($g);
        $auth_key_bi = $g_a->modPow($b_bi, $dh_prime);
        $authKeyBytes = str_pad($auth_key_bi->toBytes(false), 256, "\0", STR_PAD_LEFT);
        $g_b_bytes = $g_bi->modPow($b_bi, $dh_prime)->toBytes(false);

        // --- Этап 5: Формирование и шифрование нашего ответа (client_DH_inner_data) ---
        $clientInnerDataPayload =
            $this->serializer->int32(0x6643b654)
            . $this->serializer->int128($resPQData['nonce'])
            . $this->serializer->int128($resPQData['server_nonce'])
            . $this->serializer->int64(0)
            . $this->serializer->bytes($g_b_bytes);

        // Здесь тоже используется SHA1, согласно документации на этот шаг.
        $clientDataWithHash = hash('sha1', $clientInnerDataPayload, true) . $clientInnerDataPayload;
        $paddingLength = 16 - (strlen($clientDataWithHash) % 16);
        $paddedClientData = $clientDataWithHash . random_bytes($paddingLength);

        $encryptedClientInnerData = openssl_encrypt($paddedClientData, 'aes-256-ige', $tmp_aes_key, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING, $tmp_aes_iv);

        // --- Этап 6: Отправка финального запроса (set_client_DH_params) ---
        $finalPayload =
            $this->serializer->int32(0xf5045f1f)
            . $this->serializer->int128($resPQData['nonce'])
            . $this->serializer->int128($resPQData['server_nonce'])
            . $this->serializer->bytes($encryptedClientInnerData);
        $request = $this->messagePacker->packUnencrypted($finalPayload);
        $this->transport->send($request);

        // --- Этап 7: Получение и парсинг финального ответа сервера ---
        $rawResponse = $this->transport->receive();
        $responsePayload = $this->messagePacker->unpackUnencrypted($rawResponse);
        $responsePayload = substr($responsePayload, 20);
        $finalConstructor = $this->deserializer->int32($responsePayload);

        if ($finalConstructor !== 0x3bcbf734) { // dh_gen_ok
            throw new \RuntimeException("DH key exchange failed. Final response constructor: " . dechex($finalConstructor));
        }
        if ($this->deserializer->int128($responsePayload) !== $resPQData['nonce']) throw new \RuntimeException("Final nonce mismatch.");
        if ($this->deserializer->int128($responsePayload) !== $resPQData['server_nonce']) throw new \RuntimeException("Final server nonce mismatch.");

        $new_nonce_hash1_from_server = $this->deserializer->int128($responsePayload);

        // --- Этап 8: Финальная валидация (проверка new_nonce_hash1) ---
        // Важно: на этом последнем шаге используется SHA1 от auth_key, даже в MTProto 2.0
        $auth_key_hash_full = hash('sha1', $authKeyBytes, true); // <--- ИСПРАВЛЕНИЕ ЗДЕСЬ
        $auth_key_aux_hash = substr($auth_key_hash_full, 0, 8);
        $dataForHash = $serverDhParams['new_nonce'] . "\x01" . $auth_key_aux_hash;
        $new_nonce_hash1_calculated = substr(hash('sha1', $dataForHash, true), -16);

        if ($new_nonce_hash1_from_server !== $new_nonce_hash1_calculated) {
            throw new \RuntimeException("Final new_nonce_hash check failed. Possible MITM attack?");
        }

        // --- Этап 9: Все проверки пройдены, возвращаем ключ ---
        return new AuthKey($authKeyBytes);
    }
}