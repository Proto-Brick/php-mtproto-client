<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient;

use ProtoBrick\MTProtoClient\Auth\AuthKeyCreator;
use ProtoBrick\MTProtoClient\Auth\Storage\FileAuthKeyStorage;
use ProtoBrick\MTProtoClient\Crypto\Aes;
use ProtoBrick\MTProtoClient\Crypto\Rsa;
use ProtoBrick\MTProtoClient\Session\Session;
use ProtoBrick\MTProtoClient\Session\Storage\FileSessionStorage;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\Transport\TcpTransport;

class ClientFactory
{
    public static function create(Settings $settings, string $storagePath = './session'): Client
    {
        // Создаем папки, если их нет
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        $authKeyStorage = new FileAuthKeyStorage($storagePath . '/auth.key');
        $sessionStorage = new FileSessionStorage($storagePath);
        $transport = new TcpTransport($settings);
        $rsa = new Rsa();
        $aes = new Aes();
        $session = new Session($sessionStorage);
        $messagePacker = new MessagePacker($session, $aes);
        $authKeyCreator = new AuthKeyCreator($transport, $rsa, $messagePacker, $session);

        return new Client(
            $settings,
            $authKeyStorage,
            $session,
            $transport,
            $authKeyCreator,
            $messagePacker
        );
    }
}
