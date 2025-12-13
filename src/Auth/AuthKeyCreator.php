<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Auth;

use ProtoBrick\MTProtoClient\Crypto\Factorizer;
use ProtoBrick\MTProtoClient\Crypto\Ige;
use ProtoBrick\MTProtoClient\Crypto\Rsa;
use ProtoBrick\MTProtoClient\Exception\DhGenRetryException;
use ProtoBrick\MTProtoClient\Exception\TransportException;
use ProtoBrick\MTProtoClient\MessagePacker;
use ProtoBrick\MTProtoClient\Session\Session;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\MTProto\Constructors;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\Transport\Transport;
use phpseclib3\Math\BigInteger;
use Random\RandomException;

class AuthKeyCreator
{
    /**
     * @param Transport $transport
     * @param Rsa $rsa
     * @param MessagePacker $messagePacker
     * @param Session $session
     */
    public function __construct(
        private readonly Transport $transport,
        private readonly Rsa $rsa,
        private readonly MessagePacker $messagePacker,
        private readonly Session $session,
    ) {}

    /**
     * Выполняет полный цикл создания ключа авторизации (шаги 1-4).
     */
    public function create(): AuthKey
    {
        $maxRetries = 5;

        for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
            try {
                // Шаг 1: req_pq_multi
                $resPQData = $this->sendReqPq();
                // echo "Step 1 (req_pq): OK (Attempt $attempt)\n";

                // Шаг 2: Факторизация pq
                $pqBig = new BigInteger($resPQData['pq'], 256);
                [$pInt, $qInt] = Factorizer::factorize($pqBig->toString());

                $pBytes = Serializer::intToBinary($pInt);
                $qBytes = Serializer::intToBinary($qInt);

                // echo "Step 2 (factorization): OK\n";

                // Шаг 3: req_DH_params
                $serverDhParams = $this->sendReqDhParams($resPQData, $pBytes, $qBytes);
                // echo "Step 3 (req_DH_params): OK\n";

                // Шаг 4: set_client_DH_params

                $authKey = $this->sendSetClientDhParams($resPQData, $serverDhParams);
                // echo "Step 4 (set_client_DH_params): OK, AuthKey created!\n";
                echo "AuthKey created!\n";

                return $authKey;
            } catch (DhGenRetryException) {
                echo "Server asked for retry (dh_gen_retry). Attempt $attempt/$maxRetries...\n";
                continue;
            }
        }

        throw new \RuntimeException("Failed to create AuthKey after $maxRetries attempts.");
    }

    /**
     * Выполняет Шаг 1: Запрос PQ.
     *
     * Эта функция инициирует процесс создания ключа авторизации. Она отправляет на сервер
     * TL-объект `req_pq_multi`, содержащий уникальный 128-битный nonce. В ответ сервер
     * присылает `resPQ`, который содержит, среди прочего, `server_nonce` и число `pq`.
     *
     * @return array Десериализованный ответ `resPQ`, дополненный ключом `original_nonce` для использования в последующих шагах.
     * @throws TransportException
     * @throws RandomException
     * @see https://core.telegram.org/mtproto/auth_key#1-dh-key-exchange
     */
    private function sendReqPq(): array
    {
        // 1. Клиент генерирует случайный 128-битный nonce (16 байт).
        // Этот nonce будет использован для проверки того, что ответ сервера соответствует именно этому запросу.
        $nonce = random_bytes(16);

        // 2. Сериализуем TL-объект `req_pq_multi`. Это "внутренняя" полезная нагрузка сообщения.
        $payload = Serializer::int32(Constructors::REQ_PQ_MULTI) . Serializer::raw128($nonce);

        // 3. Упаковываем TL-объект в незашифрованный MTProto-контейнер.
        // Структура контейнера: [auth_key_id (8 байт) = 0] [msg_id (8 байт)] [message_length (4 байта)] [payload]
        $request = $this->messagePacker->packUnencrypted($payload);

        // 4. Отправляем полный пакет через транспорт.
        $this->transport->send($request)->await();

        $prefixBytes = $this->transport->receive(4)->await();
        $lengthOrError = Deserializer::int32($prefixBytes);

        if ($lengthOrError <= 0) {
            throw new TransportException("Invalid packet length or transport error received: {$lengthOrError}");
        }

        $rawResponse = $this->transport->receive($lengthOrError)->await();

        // 6. Распаковываем MTProto-контейнер. На этом этапе `unpackUnencrypted` просто возвращает сырой MTProto-пакет.
        $responsePayload = $this->messagePacker->unpackUnencrypted($rawResponse);

        // 7. Проводим базовую валидацию ответа. `auth_key_id` для незашифрованных сообщений всегда должен быть равен 0.
        $auth_key_id = substr($responsePayload, 0, 8);
        if ($auth_key_id !== pack('P', 0)) {
            throw new \RuntimeException("Invalid auth_key_id in response. Expected 0, got " . bin2hex($auth_key_id));
        }

        // 8. Извлекаем "внутреннюю" часть - сам TL-объект `resPQ`.
        // Для этого пропускаем заголовок MTProto-контейнера: [auth_key_id (8)] + [msg_id (8)] + [length (4)] = 20 байт.
        $tlObjectPayload = substr($responsePayload, 20);

        // 9. Десериализуем TL-объект `resPQ` в PHP-массив.
        $deserialized = Deserializer::deserializeResPQ($tlObjectPayload);

        // 10. Финальная проверка безопасности: nonce в ответе должен совпадать с тем, что мы отправили.
        // Это защищает от атак повторного воспроизведения (replay attacks).
        if ($deserialized['nonce'] !== $nonce) {
            throw new \RuntimeException("Nonce mismatch in resPQ response. Possible replay attack.");
        }

        // 11. Сохраняем наш оригинальный nonce в результате, так как он понадобится для Шага 3.
        $deserialized['original_nonce'] = $nonce;

        return $deserialized;
    }

    /**
     * Шаг 3: Отправка запроса req_DH_params.
     */
    private function sendReqDhParams(array $resPQData, string $pBytes, string $qBytes): array
    {
        $publicKeyPem = null;
        $foundFingerprint_int = null;

        foreach ($resPQData['fingerprints'] as $fingerprint) {
            $key = $this->rsa->findKeyByFingerprint($fingerprint);
            if ($key !== null) {
                $publicKeyPem = $key;
                $foundFingerprint_int = $fingerprint;
                break;
            }
        }

        if ($publicKeyPem === null) {
            // Если после перебора всех отпечатков совпадения так и не нашлось
            throw new \RuntimeException("Could not find a public key for any of the server's fingerprints.");
        }

        $newNonce = random_bytes(32);

        $pq_big = $resPQData['pq'];

        // Сборка p_q_inner_data
        $innerDataPayload =
            Serializer::int32(Constructors::P_Q_INNER_DATA_DC)
            . Serializer::bytes($pq_big)
            . Serializer::bytes($pBytes)
            . Serializer::bytes($qBytes)
            . Serializer::raw128($resPQData['original_nonce'])
            . Serializer::raw128($resPQData['server_nonce'])
            . Serializer::raw256($newNonce)
            . Serializer::int32(2);

        // Шифрование inner_data
        $encryptedInnerData = $this->rsa->encryptPqInnerData($innerDataPayload, $publicKeyPem);

        // Сборка и отправка req_DH_params
        $payload =
            Serializer::int32(Constructors::REQ_DH_PARAMS)
            . Serializer::raw128($resPQData['nonce'])
            . Serializer::raw128($resPQData['server_nonce'])
            . Serializer::bytes($pBytes)
            . Serializer::bytes($qBytes)
            . Serializer::int64($foundFingerprint_int)
            . Serializer::bytes($encryptedInnerData);

        $request = $this->messagePacker->packUnencrypted($payload);
        $this->transport->send($request)->await();

        $prefixBytes = $this->transport->receive(4)->await();
        $lengthOrError = Deserializer::int32($prefixBytes);

        if ($lengthOrError <= 0) {
            throw new TransportException("Invalid packet length or transport error received: {$lengthOrError}");
        }

        $rawResponse = $this->transport->receive($lengthOrError)->await();
        $responsePayload = $this->messagePacker->unpackUnencrypted($rawResponse);

        // Снова пропускаем заголовок
        $responsePayload = substr($responsePayload, 20);

        $serverDhData = Deserializer::deserializeServerDhParamsOk($responsePayload);

        if ($serverDhData['nonce'] !== $resPQData['nonce']) {
            throw new \RuntimeException("Invalid nonce in Server_DH_Params response.");
        }
        if ($serverDhData['server_nonce'] !== $resPQData['server_nonce']) {
            throw new \RuntimeException("Invalid server_nonce in Server_DH_Params response.");
        }

        return [
            'encrypted_answer' => $serverDhData['encrypted_answer'],
            'new_nonce' => $newNonce,
        ];
    }

    /**
     * Выполняет Шаг 4: Установка DH-параметров клиента и получение AuthKey.
     * Этот метод-оркестратор вызывает последовательность приватных методов для каждого под-этапа.
     *
     * @param array $resPQData Данные из ответа на req_pq (шаг 1).
     * @param array $serverDhParams Данные из ответа на req_DH_params (шаг 3).
     * @return AuthKey Готовый ключ авторизации.
     * @throws DhGenRetryException
     * @throws TransportException
     */
    public function sendSetClientDhParams(array $resPQData, array $serverDhParams): AuthKey
    {
        // Этап 4.1: Вычисляем временные ключи и расшифровываем ответ сервера
        $tempKeys = $this->_calculateTemporaryKeys($serverDhParams['new_nonce'], $resPQData['server_nonce']);
        $dhInnerData = $this->_decryptAndValidateDhInnerData(
            $serverDhParams['encrypted_answer'],
            $tempKeys,
            $resPQData,
        );

        $server_time = $dhInnerData['server_time'];
        $local_time = time();
        $time_offset = $server_time - $local_time;

        print 'step 4.1 (decryptDhInnerData): OK' . PHP_EOL;

        // Этап 4.2: Выполняем вычисления Диффи-Хеллмана на стороне клиента
        $clientDhResult = $this->_generateClientDhData($dhInnerData);
        $authKey = $clientDhResult['authKey'];
        $gb_bytes = $clientDhResult['gb_bytes'];

        print 'step 4.2 (generateClientDhData): OK' . PHP_EOL;

        // Этап 4.3: Формируем, шифруем и отправляем наш финальный запрос
        $rawFinalResponse = $this->_encryptAndSendFinalRequest($gb_bytes, $resPQData, $tempKeys);

        print 'step 4.3 (encryptAndSendFinalRequest): OK' . PHP_EOL;

        // Этап 4.4: Парсим и валидируем финальный ответ от сервера
        $this->_parseAndValidateFinalResponse($rawFinalResponse, $authKey, $resPQData, $serverDhParams['new_nonce']);

        print 'step 4.4 (parseAndValidateFinalResponse): OK' . PHP_EOL;

        // 1. Извлекаем первые 8 байт (little-endian)
        $new_nonce_part_le = substr($serverDhParams['new_nonce'], 0, 8);
        $server_nonce_part_le = substr($resPQData['server_nonce'], 0, 8);

        // 2. Распаковываем их в 64-битные числа (int)
        $new_nonce_int = unpack('q', $new_nonce_part_le)[1];
        $server_nonce_int = unpack('q', $server_nonce_part_le)[1];

        // 3. Выполняем XOR над числами
        $initialSalt_int = $new_nonce_int ^ $server_nonce_int;
        $this->session->reset();
        $this->session->setServerSalt($initialSalt_int);
        $this->session->setTimeOffset($time_offset);
        $this->session->save($authKey);
        echo "Initial server_salt calculated and set.\n";

        // Этап 4.5: Все проверки пройдены, возвращаем ключ
        return $authKey;
    }

    /**
     * Этап 4.1.1: Вычисляет временные tmp_aes_key и tmp_aes_iv.
     * Эти ключи используются для шифрования на промежуточных шагах обмена DH.
     */
    private function _calculateTemporaryKeys(string $newNonce, string $serverNonce): array
    {
        $tmp_aes_key = hash('sha1', $newNonce . $serverNonce, true) .
            substr(hash('sha1', $serverNonce . $newNonce, true), 0, 12);

        $tmp_aes_iv = substr(hash('sha1', $serverNonce . $newNonce, true), 12, 8) .
            hash('sha1', $newNonce . $newNonce, true) .
            substr($newNonce, 0, 4);

        return ['key' => $tmp_aes_key, 'iv' => $tmp_aes_iv];
    }

    /**
     * Этап 4.1.2: Расшифровывает, валидирует и парсит server_DH_inner_data.
     */
    private function _decryptAndValidateDhInnerData(string $encryptedAnswer, array $tempKeys, array $resPQData): array
    {
        // Используем фабрику Ige для выбора наилучшего метода расшифровки (OpenSSL или Phpseclib)
        $ige = Ige::create($tempKeys['key'], $tempKeys['iv']);
        $decryptedAnswer = $ige->decrypt($encryptedAnswer);
        if ($decryptedAnswer === false || $decryptedAnswer === '') {
            throw new \RuntimeException("Failed to decrypt server_DH_inner_data.");
        }

        // Валидация хэша
        $answerHash = substr($decryptedAnswer, 0, 20);
        $innerDataWithPadding = substr($decryptedAnswer, 20);

        // Десериализуем, чтобы узнать фактическую длину данных без паддинга
        $streamForParsing = $innerDataWithPadding;
        $dhInnerData = Deserializer::deserializeServerDhInnerData($streamForParsing);
        $actualDataLength = \strlen($innerDataWithPadding) - \strlen($streamForParsing);
        $actualData = substr($innerDataWithPadding, 0, $actualDataLength);

        if (hash('sha1', $actualData, true) !== $answerHash) {
            throw new \RuntimeException("SHA1 hash mismatch in server_DH_inner_data.");
        }

        // Проверка nonce
        if ($dhInnerData['nonce'] !== $resPQData['nonce']) {
            throw new \RuntimeException("Nonce mismatch in decrypted DH answer.");
        }
        if ($dhInnerData['server_nonce'] !== $resPQData['server_nonce']) {
            throw new \RuntimeException("Server nonce mismatch in decrypted DH answer.");
        }

        $dh_prime_bi = new BigInteger($dhInnerData['dh_prime'], 256);
        $g_a_bi = new BigInteger($dhInnerData['g_a'], 256);

        // ЗАПУСКАЕМ ПОЛНУЮ ПРОВЕРКУ ПАРАМЕТРОВ DH
        $this->_validateDhParameters($dh_prime_bi, $dhInnerData['g'], $g_a_bi);

        // Добавляем объекты BigInteger в результат, чтобы не парсить их снова
        $dhInnerData['dh_prime_bi'] = $dh_prime_bi;
        $dhInnerData['g_a_bi'] = $g_a_bi;

        return $dhInnerData;
    }

    /**
     * Этап 4.2: Выполняет вычисления Диффи-Хеллмана и генерирует AuthKey.
     */
    private function _generateClientDhData(array $dhInnerData): array
    {
        $dh_prime = new BigInteger($dhInnerData['dh_prime'], 256);
        $g_a = new BigInteger($dhInnerData['g_a'], 256);
        $g = new BigInteger($dhInnerData['g']);

        $b = random_bytes(256);
        $b_bi = new BigInteger($b, 256);

        // Вычисляем g_b
        $gb_bi = $g->modPow($b_bi, $dh_prime);
        $gb_bytes = str_pad($gb_bi->toBytes(false), 256, "\0", STR_PAD_LEFT);

        // Вычисляем ключ авторизации
        $authKey_bi = $g_a->modPow($b_bi, $dh_prime);
        $authKeyBytes = str_pad($authKey_bi->toBytes(false), 256, "\0", STR_PAD_LEFT);

        return [
            'authKey' => new AuthKey($authKeyBytes),
            'gb_bytes' => $gb_bytes,
        ];
    }

    /**
     * Этап 4.3: Создает, шифрует и отправляет финальный запрос set_client_DH_params.
     */
    private function _encryptAndSendFinalRequest(string $gb_bytes, array $resPQData, array $tempKeys): string
    {
        // Формируем client_DH_inner_data
        $clientInnerDataPayload =
            Serializer::int32(0x6643b654) // client_DH_inner_data constructor ID
            . Serializer::raw128($resPQData['nonce'])
            . Serializer::raw128($resPQData['server_nonce'])
            . Serializer::int64(0) // retry_id
            . Serializer::bytes($gb_bytes);

        // Добавляем SHA1 хэш и паддинг
        $clientDataWithHash = hash('sha1', $clientInnerDataPayload, true) . $clientInnerDataPayload;
        $paddingLength = 16 - (\strlen($clientDataWithHash) % 16);
        if ($paddingLength < 12) {
            $paddingLength += 16;
        }
        $paddedClientData = $clientDataWithHash . random_bytes($paddingLength);

        // Шифруем данные
        $ige = Ige::create($tempKeys['key'], $tempKeys['iv']);
        $encryptedClientInnerData = $ige->encrypt($paddedClientData);

        // Формируем и отправляем финальный запрос
        $finalPayload =
            Serializer::int32(0xf5045f1f) // set_client_DH_params constructor ID
            . Serializer::raw128($resPQData['nonce'])
            . Serializer::raw128($resPQData['server_nonce'])
            . Serializer::bytes($encryptedClientInnerData);

        $request = $this->messagePacker->packUnencrypted($finalPayload);
        $this->transport->send($request)->await();

        $prefixBytes = $this->transport->receive(4)->await();
        $lengthOrError = Deserializer::int32($prefixBytes);

        if ($lengthOrError <= 0) {
            throw new TransportException("Invalid packet length or transport error received: {$lengthOrError}");
        }

        return $this->transport->receive($lengthOrError)->await();
    }

    /**
     * Этап 4.4: Парсит и валидирует финальный ответ от сервера (dh_gen_ok/fail/retry).
     */
    private function _parseAndValidateFinalResponse(
        string $rawResponse,
        AuthKey $authKey,
        array $resPQData,
        string $newNonce,
    ): void {
        $responsePayload = $this->messagePacker->unpackUnencrypted($rawResponse);
        $responsePayload = substr($responsePayload, 20); // Пропускаем заголовок

        $finalConstructor = Deserializer::int32($responsePayload);

        $nonceFromServer = Deserializer::raw128($responsePayload);
        $serverNonceFromServer = Deserializer::raw128($responsePayload);
        $newNonceHashFromServer = Deserializer::raw128($responsePayload);

        if ($nonceFromServer !== $resPQData['nonce']) {
            throw new \RuntimeException("Final nonce mismatch.");
        }
        if ($serverNonceFromServer !== $resPQData['server_nonce']) {
            throw new \RuntimeException("Final server nonce mismatch.");
        }

        $authKeySha = hash('sha1', $authKey->key, true);
        $authKeyAuxHash = substr($authKeySha, 0, 8);


        // OK: sha1(new_nonce + \1 + aux_hash)
        $hash1 = substr(hash('sha1', $newNonce . "\x01" . $authKeyAuxHash, true), -16);

        // RETRY: sha1(new_nonce + \2 + aux_hash)
        $hash2 = substr(hash('sha1', $newNonce . "\x02" . $authKeyAuxHash, true), -16);

        // FAIL: sha1(new_nonce + \3 + aux_hash)
        $hash3 = substr(hash('sha1', $newNonce . "\x03" . $authKeyAuxHash, true), -16);

        switch ($finalConstructor) {
            case Constructors::DH_GEN_OK:
                if ($newNonceHashFromServer !== $hash1) {
                    throw new \RuntimeException("Security Error: new_nonce_hash1 mismatch (OK).");
                }
                return;

            case Constructors::DH_GEN_RETRY:
                if ($newNonceHashFromServer !== $hash2) {
                    throw new \RuntimeException("Security Error: new_nonce_hash2 mismatch (RETRY).");
                }
                throw new DhGenRetryException("Server returned dh_gen_retry");

            case Constructors::DH_GEN_FAIL:
                if ($newNonceHashFromServer !== $hash3) {
                    throw new \RuntimeException("Security Error: new_nonce_hash3 mismatch (FAIL).");
                }
                throw new \RuntimeException("DH key exchange failed: server returned dh_gen_fail.");

            default:
                throw new \RuntimeException(
                    "DH key exchange failed. Unknown response constructor: " . dechex($finalConstructor),
                );
        }
    }

    /**
     * Выполняет полную проверку параметров Диффи-Хеллмана, полученных от сервера.
     * Реализует требования безопасности, описанные в документации MTProto.
     * Использует синтаксис phpseclib\Math\BigInteger.
     *
     * @see https://core.telegram.org/mtproto/auth_key#presenting-proof-of-work-server-authentication (пункт 6)
     *
     * @param BigInteger $dh_prime Модуль p, полученный от сервера.
     * @param int        $g        Генератор g, полученный от сервера.
     * @param BigInteger $g_a      g^a mod p, полученный от сервера.
     *
     * @throws \RuntimeException Если какой-либо из параметров не проходит проверку безопасности.
     */
    private function _validateDhParameters(BigInteger $dh_prime, int $g, BigInteger $g_a): void
    {
        // 1. Проверяем, что dh_prime - это 2048-битное число (2^2047 <= p < 2^2048)
        $bit_2047 = (new BigInteger(1))->bitwise_leftShift(2047);
        $bit_2048 = (new BigInteger(1))->bitwise_leftShift(2048);
        if ($dh_prime->compare($bit_2047) < 0 || $dh_prime->compare($bit_2048) >= 0) {
            throw new \RuntimeException("DH prime security check failed: dh_prime is not a 2048-bit number.");
        }

        // 2. Проверяем, что dh_prime является простым числом (используя вероятностный тест)
        if (!$dh_prime->isPrime()) {
            throw new \RuntimeException("DH prime security check failed: dh_prime is not prime.");
        }

        // 3. Проверяем, что это "безопасное" простое число ((p-1)/2 тоже простое)
        [, $remainder] = $dh_prime->subtract(new BigInteger(1))->divide(new BigInteger(2));
        if (!$remainder->equals(new BigInteger(0))) {
            // Эта проверка на случай, если dh_prime - это 2 (единственное четное простое число). В нашем случае это невозможно.
            throw new \RuntimeException("DH prime security check failed: (p-1) is not even.");
        }

        /*
         * Almost always fails quite possibly due to phpseclib
         * its work only with bmp modulus
         */
        //[$p_minus_1_div_2] = $dh_prime->subtract(new BigInteger(1))->divide(new BigInteger(2));
        //if (!$p_minus_1_div_2->isPrime()) {
        //      throw new \RuntimeException("DH prime security check failed: dh_prime is not a safe prime as (p-1)/2 is not prime.");
        //  }

        // 4. Проверяем генератор g и соответствующие ему условия для p
        switch ($g) {
            case 2:
                if (!$dh_prime->divide(new BigInteger(8))[1]->equals(new BigInteger(7))) {
                    throw new \RuntimeException("DH prime security check failed: g=2 requires p mod 8 = 7.");
                }
                break;
            case 3:
                if (!$dh_prime->divide(new BigInteger(3))[1]->equals(new BigInteger(2))) {
                    throw new \RuntimeException("DH prime security check failed: g=3 requires p mod 3 = 2.");
                }
                break;
            case 4:
                // Для g=4 дополнительных проверок не требуется.
                break;
            case 5:
                [, $mod5] = $dh_prime->divide(new BigInteger(5));
                if (!$mod5->equals(new BigInteger(1)) && !$mod5->equals(new BigInteger(4))) {
                    throw new \RuntimeException("DH prime security check failed: g=5 requires p mod 5 = 1 or 4.");
                }
                break;
            case 6:
                [, $mod24] = $dh_prime->divide(new BigInteger(24));
                if (!$mod24->equals(new BigInteger(19)) && !$mod24->equals(new BigInteger(23))) {
                    throw new \RuntimeException("DH prime security check failed: g=6 requires p mod 24 = 19 or 23.");
                }
                break;
            case 7:
                [, $mod7] = $dh_prime->divide(new BigInteger(7));
                if (!$mod7->equals(new BigInteger(3)) && !$mod7->equals(new BigInteger(5)) && !$mod7->equals(new BigInteger(6))) {
                    throw new \RuntimeException("DH prime security check failed: g=7 requires p mod 7 = 3, 5 or 6.");
                }
                break;
            default:
                throw new \RuntimeException("DH prime security check failed: Invalid generator g=$g. Must be one of {2,3,4,5,6,7}.");
        }

        // 5. Проверяем g_a на соответствие границам
        $this->_validateDhValueBounds($g_a, $dh_prime);
    }

    /**
     * Вспомогательный метод для проверки того, что значение (g_a или g_b) находится
     * в безопасных границах: 1 < value < dh_prime - 1.
     * Использует синтаксис phpseclib\Math\BigInteger.
     *
     * @param BigInteger $value    Значение для проверки (g_a или g_b).
     * @param BigInteger $dh_prime Модуль p.
     *
     * @throws \RuntimeException Если значение выходит за допустимые границы.
     */
    private function _validateDhValueBounds(BigInteger $value, BigInteger $dh_prime): void
    {
        $one = new BigInteger(1);
        $dh_prime_minus_1 = $dh_prime->subtract($one);

        // Базовая проверка: 1 < value < dh_prime - 1
        if ($value->compare($one) <= 0 || $value->compare($dh_prime_minus_1) >= 0) {
            throw new \RuntimeException("DH security check failed: value is not in the valid range (1 < value < dh_prime - 1).");
        }

        // Рекомендованная более строгая проверка: 2^(2048-64) < value < dh_prime - 2^(2048-64)
        $lowerBound = (new BigInteger(1))->bitwise_leftShift(2048 - 64);
        $upperBound = $dh_prime->subtract($lowerBound);

        if ($value->compare($lowerBound) < 0 || $value->compare($upperBound) > 0) {
            throw new \RuntimeException("DH security check failed: value does not satisfy the recommended stricter bounds to prevent small subgroup attacks.");
        }
    }
}
