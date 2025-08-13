<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


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
            0xe17e23c => PhotoSizeEmpty::deserialize($stream),
            0x75c78e60 => PhotoSize::deserialize($stream),
            0x21e1ad6 => PhotoCachedSize::deserialize($stream),
            0xe0b0bc2e => PhotoStrippedSize::deserialize($stream),
            0xfa3efb95 => PhotoSizeProgressive::deserialize($stream),
            0xd8214d41 => PhotoPathSize::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type PhotoSize. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}