<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Crypto;

final class Ige
{
    /** Кеш имени класса реализации: 'IgeOpenSsl' | 'IgeOpenSslEcb' | 'IgePhpseclib' */
    private static ?string $implementationClass = null;

    public static function create(string $key, string $iv)
    {
        if (self::$implementationClass === null) {
            if (self::isNativeIgeSupported()) {
                self::$implementationClass = IgeOpenSsl::class;
            } elseif (extension_loaded('openssl')) {
                self::$implementationClass = IgeOpenSslEcb::class;
            } else {
                self::$implementationClass = IgePhpseclib::class;
            }
        }

        return new self::$implementationClass($key, $iv);
    }

    private static function isNativeIgeSupported(): bool
    {
        static $supported = null;
        return $supported ??= (
            extension_loaded('openssl') &&
            in_array('aes-256-ige', openssl_get_cipher_methods(), true)
        );
    }
}