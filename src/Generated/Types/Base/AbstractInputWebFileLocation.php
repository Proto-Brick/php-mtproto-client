<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputWebFileLocation
 */
abstract class AbstractInputWebFileLocation extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputWebFileLocation::CONSTRUCTOR_ID => InputWebFileLocation::deserialize($deserializer, $stream),
            InputWebFileGeoPointLocation::CONSTRUCTOR_ID => InputWebFileGeoPointLocation::deserialize($deserializer, $stream),
            InputWebFileAudioAlbumThumbLocation::CONSTRUCTOR_ID => InputWebFileAudioAlbumThumbLocation::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputWebFileLocation: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}