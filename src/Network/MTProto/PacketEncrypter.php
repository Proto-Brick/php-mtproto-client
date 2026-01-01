<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network\MTProto;

use ProtoBrick\MTProtoClient\Auth\AuthKey;
use ProtoBrick\MTProtoClient\Crypto\Aes;

class PacketEncrypter
{
    private Aes $aes;

    public function __construct(
        private readonly SessionState $state
    ) {
        $this->aes = new Aes();
    }

    /**
     * Encrypts the payload and returns the encrypted packet AND the generated msg_id.
     * @return array{string, int} [encrypted_packet, msg_id]
     */
    public function encrypt(string $payload, AuthKey $authKey, bool $isContentRelated): array
    {
        $t0 = hrtime(true);

        $salt = $this->state->getServerSalt();
        $sessionId = $this->state->getSessionId();
        $msgId = $this->state->generateMessageId(); // We need this!
        $seqNo = $this->state->generateSeqNo($isContentRelated);
        $len = strlen($payload);

        $data = pack('P', $salt) . $sessionId . pack('P', $msgId) . pack('V', $seqNo) . pack('V', $len) . $payload;

        $paddingLen = 12 + (16 - (strlen($data) + 12) % 16) % 16;
        if (function_exists('openssl_random_pseudo_bytes')) {
            $strong_result = false;
            /** @noinspection CryptographicallySecureRandomnessInspection  */
            $paddingBytes = openssl_random_pseudo_bytes($paddingLen, $strong_result);
        } else {
            $paddingBytes = random_bytes($paddingLen);
        }

        $padded = $data . $paddingBytes;

        $msgKeyLarge = hash('sha256', substr($authKey->key, 88, 32) . $padded, true);
        $msgKey = substr($msgKeyLarge, 8, 16);

        $encryptedData = $this->aes->encrypt($padded, $authKey, $msgKey);

        $packet = $authKey->id . $msgKey . $encryptedData;

        $timeMs = (hrtime(true) - $t0) / 1e+6;

        return [$packet, $msgId, $seqNo, $timeMs];
    }
}