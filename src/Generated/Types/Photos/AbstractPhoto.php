<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Photos;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/photos.Photo
 */
abstract class AbstractPhoto extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            Photo::CONSTRUCTOR_ID => Photo::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type photos.Photo: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}