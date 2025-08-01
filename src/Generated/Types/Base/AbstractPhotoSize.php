<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PhotoSize
 */
abstract class AbstractPhotoSize extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PhotoSizeEmpty::CONSTRUCTOR_ID => PhotoSizeEmpty::deserialize($deserializer, $stream),
            PhotoSize::CONSTRUCTOR_ID => PhotoSize::deserialize($deserializer, $stream),
            PhotoCachedSize::CONSTRUCTOR_ID => PhotoCachedSize::deserialize($deserializer, $stream),
            PhotoStrippedSize::CONSTRUCTOR_ID => PhotoStrippedSize::deserialize($deserializer, $stream),
            PhotoSizeProgressive::CONSTRUCTOR_ID => PhotoSizeProgressive::deserialize($deserializer, $stream),
            PhotoPathSize::CONSTRUCTOR_ID => PhotoPathSize::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type PhotoSize: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}