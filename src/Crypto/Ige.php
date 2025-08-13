<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Crypto;

/**
 * Ручная реализация режима шифрования AES-IGE.
 *
 * Этот класс использует базовый режим ECB из phpseclib для поблочного шифрования,
 * а всю логику "цепочки" IGE реализует самостоятельно.
 * Это гарантирует работу независимо от версии phpseclib или поддержки IGE в системном OpenSSL.
 */
final class Ige
{
    private static ?bool $isOpensslSupported = null;

    /**
     * Создает экземпляр IGE, выбирая наилучшую доступную реализацию.
     */
    public static function create(string $key, string $iv)
    {
        if (self::isOpensslIgeSupported()) {
            return new IgeOpenSsl($key, $iv);
        }
        return new IgePhpseclib($key, $iv);
    }

    /**
     * Проверяет, поддерживает ли системный OpenSSL режим AES-256-IGE.
     * Результат кешируется для производительности.
     */
    public static function isOpensslIgeSupported(): bool
    {
        if (self::$isOpensslSupported === null) {
            self::$isOpensslSupported = \function_exists('openssl_get_cipher_methods')
                && \in_array('aes-256-ige', openssl_get_cipher_methods(), true);
        }
        return self::$isOpensslSupported;
    }
}
