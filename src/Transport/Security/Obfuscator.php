<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport\Security;

use Amp\Socket\Socket;
use ProtoBrick\MTProtoClient\Crypto\AesCtr;
use ProtoBrick\MTProtoClient\Transport\Stream\ObfuscatedStream;
use ProtoBrick\MTProtoClient\Transport\Stream\SocketStreamAdapter;
use ProtoBrick\MTProtoClient\Transport\Stream\StreamInterface;

class Obfuscator
{
    private const FORBIDDEN_START = [
        'PVrG', 'GET ', 'POST', 'HEAD', 'PUT ', 'OPTI', 'DELE', 'TRAC', 'CONN',
        "\xef\xef\xef\xef", "\xdd\xdd\xdd\xdd", "\xee\xee\xee\xee", "\x02\x01\x03\x01",
    ];

    public function handshake(
        Socket $socket,
        string $protocolTag,
        ?string $secret = null,
        int $dcId = 2
    ): StreamInterface {
        do {
            $random = random_bytes(64);
            $start = substr($random, 0, 4);
            $isForbidden = ord($random[0]) === 0xef || substr($random, 4, 4) === "\0\0\0\0";
            foreach (self::FORBIDDEN_START as $bad) {
                if ($start === $bad) {
                    $isForbidden = true;
                    break;
                }
            }
        } while ($isForbidden);

        // Подготовка тега
        if (strlen($protocolTag) === 1) {
            $protocolTag = str_repeat($protocolTag, 4);
        }

        $random[56] = $protocolTag[0];
        $random[57] = $protocolTag[1];
        $random[58] = $protocolTag[2];
        $random[59] = $protocolTag[3];

        $dcBytes = pack('v', $dcId);
        $random[60] = $dcBytes[0];
        $random[61] = $dcBytes[1];

        // --- ИСПРАВЛЕНИЕ: Генерация ключей ---

        // Ключи шифрации (Client -> Server) берутся из прямого init
        $encryptKey = substr($random, 8, 32);
        $encryptIv  = substr($random, 40, 16);

        // Ключи дешифрации (Server -> Client) берутся из ПОЛНОСТЬЮ реверсированного init
        $reversed = strrev($random);
        $decryptKey = substr($reversed, 8, 32);
        $decryptIv  = substr($reversed, 40, 16);

        if ($secret !== null && $secret !== '') {
            $secretBytes = ctype_xdigit($secret) ? hex2bin($secret) : $secret;
            $encryptKey = hash('sha256', $encryptKey . $secretBytes, true);
            $decryptKey = hash('sha256', $decryptKey . $secretBytes, true);
        }

        $encryptor = new AesCtr($encryptKey, $encryptIv);
        $decryptor = new AesCtr($decryptKey, $decryptIv);

        // 1. Шифруем весь буфер (64 байта) для синхронизации состояния CTR
        $encryptedAll = $encryptor->encrypt($random);

        // 2. Подменяем зашифрованный хвост (56-63) в исходном буфере для отправки
        for ($i = 56; $i < 64; $i++) {
            $random[$i] = $encryptedAll[$i];
        }

        $socket->write($random);

        // Decryptor инициализирован с offset=0, что верно, так как поток от сервера
        // начинается сразу с данных, а не с зеркального handshake.

        $adapter = new SocketStreamAdapter($socket, '');
        return new ObfuscatedStream($adapter, $encryptor, $decryptor);
    }
}