<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Photos;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/photos.Photos
 */
abstract class AbstractPhotos extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            Photos::CONSTRUCTOR_ID => Photos::deserialize($deserializer, $stream),
            PhotosSlice::CONSTRUCTOR_ID => PhotosSlice::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type photos.Photos: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}