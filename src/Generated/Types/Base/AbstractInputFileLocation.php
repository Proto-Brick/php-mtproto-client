<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputFileLocation
 */
abstract class AbstractInputFileLocation extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xdfdaabe1 => InputFileLocation::deserialize($__payload, $__offset),
            0xf5235d55 => InputEncryptedFileLocation::deserialize($__payload, $__offset),
            0xbad07584 => InputDocumentFileLocation::deserialize($__payload, $__offset),
            0xcbc7ee28 => InputSecureFileLocation::deserialize($__payload, $__offset),
            0x29be5899 => InputTakeoutFileLocation::deserialize($__payload, $__offset),
            0x40181ffe => InputPhotoFileLocation::deserialize($__payload, $__offset),
            0xd83466f3 => InputPhotoLegacyFileLocation::deserialize($__payload, $__offset),
            0x37257e99 => InputPeerPhotoFileLocation::deserialize($__payload, $__offset),
            0x9d84f3db => InputStickerSetThumb::deserialize($__payload, $__offset),
            0x598a92a => InputGroupCallStream::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputFileLocation. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}