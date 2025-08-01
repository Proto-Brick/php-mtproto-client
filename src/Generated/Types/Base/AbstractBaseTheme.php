<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/BaseTheme
 */
abstract class AbstractBaseTheme extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            BaseThemeClassic::CONSTRUCTOR_ID => BaseThemeClassic::deserialize($deserializer, $stream),
            BaseThemeDay::CONSTRUCTOR_ID => BaseThemeDay::deserialize($deserializer, $stream),
            BaseThemeNight::CONSTRUCTOR_ID => BaseThemeNight::deserialize($deserializer, $stream),
            BaseThemeTinted::CONSTRUCTOR_ID => BaseThemeTinted::deserialize($deserializer, $stream),
            BaseThemeArctic::CONSTRUCTOR_ID => BaseThemeArctic::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type BaseTheme: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}