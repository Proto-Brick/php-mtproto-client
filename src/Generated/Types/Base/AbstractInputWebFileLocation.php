<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputWebFileLocation
 */
abstract class AbstractInputWebFileLocation extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputWebFileLocation::CONSTRUCTOR_ID => InputWebFileLocation::deserialize($stream),
            InputWebFileGeoPointLocation::CONSTRUCTOR_ID => InputWebFileGeoPointLocation::deserialize($stream),
            InputWebFileAudioAlbumThumbLocation::CONSTRUCTOR_ID => InputWebFileAudioAlbumThumbLocation::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputWebFileLocation. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}