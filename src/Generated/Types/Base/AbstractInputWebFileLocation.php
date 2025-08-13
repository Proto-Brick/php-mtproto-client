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
            0xc239d686 => InputWebFileLocation::deserialize($stream),
            0x9f2221c9 => InputWebFileGeoPointLocation::deserialize($stream),
            0xf46fe924 => InputWebFileAudioAlbumThumbLocation::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputWebFileLocation. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}