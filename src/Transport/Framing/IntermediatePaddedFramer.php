<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport\Framing;

final class IntermediatePaddedFramer implements FramerInterface
{
    private int $lastBodyLen = 0;

    public function handshakeHeader(): string
    {
        return "\xDD\xDD\xDD\xDD";
    }

    public function frame(string $payload): string
    {
        $padLen = random_int(0, 15);
        $padding = $padLen > 0 ? random_bytes($padLen) : '';
        $total = \strlen($payload) + $padLen;
        return pack('V', $total) . $payload . $padding;
    }

    public function readPrefix(callable $readExactly): string
    {
        $val = unpack('V', $readExactly(4))[1];
        $len = $val & 0x7FFFFFFF; // ignore MSB
        $this->lastBodyLen = $len;
        return pack('V', $len);
    }

    public function readBody(callable $readExactly, int $length): string
    {
        // Invariants for Intermediate Padded:
        // - A random padding of 0..15 bytes is appended to the MTProto payload
        // - Length prefix contains payload+padding length (no MSB)
        // - Unencrypted packet body: [8 zero][8 msg_id][4 inner_len][inner_payload][padding]
        // - Encrypted packet body:   [8 auth_key_id][16 msg_key][ciphertext (16*n)][padding]
        $frameAll = $readExactly($length);

        // Unencrypted frame detection: auth_key_id == 0
        if (\strlen($frameAll) >= 20 && substr($frameAll, 0, 8) === pack('P', 0)) {
            $innerLen = unpack('V', substr($frameAll, 16, 4))[1];
            $payloadLen = 20 + $innerLen;
            return substr($frameAll, 0, $payloadLen);
        }

        // Encrypted frame: [8 auth_id][16 msg_key][ciphertext (16*n)] + padding
        if (\strlen($frameAll) < 24) {
            return $frameAll; // let upper layer fail
        }
        $encCandidate = \strlen($frameAll) - 24;
        $encLen = $encCandidate - ($encCandidate % 16);
        $payloadLen = 24 + $encLen;
        return substr($frameAll, 0, $payloadLen);
    }
}


