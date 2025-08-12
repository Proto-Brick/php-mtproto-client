<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Photos;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/photos.Photos
 */
abstract class AbstractPhotos extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            Photos::CONSTRUCTOR_ID => Photos::deserialize($stream),
            PhotosSlice::CONSTRUCTOR_ID => PhotosSlice::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type photos.Photos. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}