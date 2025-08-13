<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use RuntimeException;
use ValueError;

/**
 * @see https://core.telegram.org/type/BaseTheme
 */
enum BaseTheme: int implements TlObjectInterface
{
    case BaseThemeClassic = 0xc3a12462;
    case BaseThemeDay = 0xfbd81688;
    case BaseThemeNight = 0xb7b31ea8;
    case BaseThemeTinted = 0x6d5f77ee;
    case BaseThemeArctic = 0x5b11125a;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        try {
            return self::from($constructorId);
        } catch (ValueError $e) {
            throw new RuntimeException(sprintf(
                'Unknown constructor ID for enum %s. Received ID: 0x%s (signed: %d)',
                self::class,
                dechex(unpack('V', pack('l', $constructorId))[1]),
                $constructorId
            ), 0, $e);
        }
    }
    
    public function getConstructorId(): int
    {
        return $this->value;
    }
    
    public function getPredicate(): string
    {
        return match($this) {
            self::BaseThemeClassic => 'baseThemeClassic',
            self::BaseThemeDay => 'baseThemeDay',
            self::BaseThemeNight => 'baseThemeNight',
            self::BaseThemeTinted => 'baseThemeTinted',
            self::BaseThemeArctic => 'baseThemeArctic',
        };
    }
}