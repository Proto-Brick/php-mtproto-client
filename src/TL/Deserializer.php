<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\TL;

class Deserializer
{
    public function int32(string &$stream): int
    {
        $value_bin = substr($stream, 0, 4);
        $stream = substr($stream, 4);
        return unpack('V', $value_bin)[1];
    }

    public function int64(string &$stream): string
    {
        $value_bin = substr($stream, 0, 8);
        $stream = substr($stream, 8);
        return strrev($value_bin);
    }

    public function int128(string &$stream): string
    {
        $value_bin = substr($stream, 0, 16);
        $stream = substr($stream, 16);
        return strrev($value_bin);
    }

    public function bytes(string &$stream): string
    {
        $firstByte = ord($stream[0]);
        $stream = substr($stream, 1);

        if ($firstByte <= 253) {
            $len = $firstByte;
            $padding = (4 - (($len + 1) % 4)) % 4;
        } else if ($firstByte === 254) {
            $len = unpack('V', substr($stream, 0, 3) . "\x00")[1];
            $stream = substr($stream, 3);
            $padding = (4 - $len % 4) % 4;
        } else {
            throw new \Exception("Invalid length prefix for TL-string: " . dechex($firstByte));
        }

        $data = substr($stream, 0, $len);
        $stream = substr($stream, $len);

        if ($padding > 0) {
            $stream = substr($stream, $padding);
        }

        return $data;
    }

    public function deserializeResPQ(string &$stream): array
    {
        $constructor = $this->int32($stream);
        if ($constructor !== 0x05162463) {
            throw new \Exception("Expected resPQ constructor, but got " . dechex($constructor));
        }

        $nonce = $this->int128($stream);
        $server_nonce = $this->int128($stream);
        $pq = $this->bytes($stream);

        $vector_constructor = $this->int32($stream);
        if ($vector_constructor !== 0x1cb5c415) {
            throw new \Exception("Expected vector constructor, but got " . dechex($vector_constructor) . ". Stream state: " . bin2hex($stream));
        }

        $count = $this->int32($stream);
        $fingerprints = [];
        for ($i = 0; $i < $count; $i++) {
            $fingerprints[] = $this->int64($stream);
        }

        return [
            'nonce' => $nonce,
            'server_nonce' => $server_nonce,
            'pq' => $pq,
            'fingerprints' => $fingerprints
        ];
    }

    public function deserializeServerDhInnerData(string &$stream): array
    {
        $constructor = $this->int32($stream);
        if ($constructor !== 0xb5890dba) {
            throw new \Exception("Invalid constructor in DH answer: " . dechex($constructor));
        }
        $nonce = $this->int128($stream);
        $server_nonce = $this->int128($stream);
        $g = $this->int32($stream);
        $dh_prime = $this->bytes($stream);
        $g_a = $this->bytes($stream);
        $server_time = $this->int32($stream);

        return [
            'nonce' => $nonce, 'server_nonce' => $server_nonce, 'g' => $g,
            'dh_prime' => $dh_prime, 'g_a' => $g_a, 'server_time' => $server_time,
        ];
    }
}