<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Crypto;

final class Ige
{
    private static ?string $implementationClass = null;

    public static function create(string $key, string $iv)
    {
        if (self::$implementationClass === null) {
            if (extension_loaded('openssl')) {
                // - Зашифровка: в 12 раз быстрее
                // - Расшифровка: в 2.3 раза быстрее
                self::$implementationClass = IgeOpenSslEcb::class;
            } else {
                self::$implementationClass = IgePhpseclib::class;
            }
        }

        return new self::$implementationClass($key, $iv);
    }
}