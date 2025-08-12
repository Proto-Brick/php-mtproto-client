<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PhotoSize
 */
abstract class AbstractPhotoSize extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            PhotoSizeEmpty::CONSTRUCTOR_ID => PhotoSizeEmpty::deserialize($stream),
            PhotoSize::CONSTRUCTOR_ID => PhotoSize::deserialize($stream),
            PhotoCachedSize::CONSTRUCTOR_ID => PhotoCachedSize::deserialize($stream),
            PhotoStrippedSize::CONSTRUCTOR_ID => PhotoStrippedSize::deserialize($stream),
            PhotoSizeProgressive::CONSTRUCTOR_ID => PhotoSizeProgressive::deserialize($stream),
            PhotoPathSize::CONSTRUCTOR_ID => PhotoPathSize::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PhotoSize. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}