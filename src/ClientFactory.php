<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient;

use DigitalStars\MtprotoClient\Auth\AuthKeyCreator;
use DigitalStars\MtprotoClient\Auth\Storage\FileAuthKeyStorage;
use DigitalStars\MtprotoClient\Crypto\Aes;
use DigitalStars\MtprotoClient\Crypto\Rsa;
use DigitalStars\MtprotoClient\Session\Session;
use DigitalStars\MtprotoClient\Session\Storage\FileSessionStorage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\Transport\TcpTransport;

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
