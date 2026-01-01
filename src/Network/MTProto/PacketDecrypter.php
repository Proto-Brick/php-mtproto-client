<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network\MTProto;

use ProtoBrick\MTProtoClient\Auth\AuthKey;
use ProtoBrick\MTProtoClient\Crypto\Aes;
use ProtoBrick\MTProtoClient\Exception\TransportException;

class PacketDecrypter
{
    private Aes $aes;

    public function __construct(
        private SessionState $state
    ) {
        $this->aes = new Aes();
    }

    /**
     * Decrypts the raw bytes received from the transport.
     *
     * @return array{msg_id: int, seq_no: int, body: string}
     */
    public function decrypt(string $encryptedPacket, AuthKey $authKey): array
    {
        $t0 = hrtime(true);

        if (strlen($encryptedPacket) < 24) {
            throw new TransportException("Packet too short");
        }

        $authKeyId = substr($encryptedPacket, 0, 8);
        $msgKey = substr($encryptedPacket, 8, 16);
        $encryptedData = substr($encryptedPacket, 24);

        if ($authKeyId !== $authKey->id) {
            throw new TransportException("Auth Key ID mismatch");
        }

        // Decrypt using AES-IGE
        $decrypted = $this->aes->decrypt($encryptedData, $authKey, $msgKey);

        // Verify MsgKey (Integrity Check)
        // x = 8 for server->client
        $expectedMsgKeyLarge = hash('sha256', substr($authKey->key, 88 + 8, 32) . $decrypted, true);
        $expectedMsgKey = substr($expectedMsgKeyLarge, 8, 16);

        if ($msgKey !== $expectedMsgKey) {
            throw new TransportException("MsgKey verification failed. Packet corrupted or tampered.");
        }

        // Unpack headers
        // salt (8) + session_id (8) + msg_id (8) + seq_no (4) + length (4)
        $salt = unpack('P', substr($decrypted, 0, 8))[1];
        $sessionId = substr($decrypted, 8, 8);
        $msgId = unpack('P', substr($decrypted, 16, 8))[1];
        $seqNo = unpack('V', substr($decrypted, 24, 4))[1];
        $length = unpack('V', substr($decrypted, 28, 4))[1];

        if ($sessionId !== $this->state->getSessionId()) {
            // Note: In a real client, we might want to handle this gracefully (e.g. session restart)
            // For now, we log a warning but proceed if possible, or throw exception.
            // echo "[WARN] Session ID mismatch\n";
        }

        // Update server salt if changed
        $this->state->setServerSalt($salt);

        // Extract body
        $body = substr($decrypted, 32, $length);

        $timeMs = (hrtime(true) - $t0) / 1e+6;

        return [
            'msg_id' => $msgId,
            'seq_no' => $seqNo,
            'body'   => $body,
            'dec_time' => $timeMs
        ];
    }
}