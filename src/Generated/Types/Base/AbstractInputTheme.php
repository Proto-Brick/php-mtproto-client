<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputTheme
 */
abstract class AbstractInputTheme extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputTheme::CONSTRUCTOR_ID => InputTheme::deserialize($deserializer, $stream),
            InputThemeSlug::CONSTRUCTOR_ID => InputThemeSlug::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputTheme: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}