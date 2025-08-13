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
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xdfdaabe1 => InputFileLocation::deserialize($stream),
            0xf5235d55 => InputEncryptedFileLocation::deserialize($stream),
            0xbad07584 => InputDocumentFileLocation::deserialize($stream),
            0xcbc7ee28 => InputSecureFileLocation::deserialize($stream),
            0x29be5899 => InputTakeoutFileLocation::deserialize($stream),
            0x40181ffe => InputPhotoFileLocation::deserialize($stream),
            0xd83466f3 => InputPhotoLegacyFileLocation::deserialize($stream),
            0x37257e99 => InputPeerPhotoFileLocation::deserialize($stream),
            0x9d84f3db => InputStickerSetThumb::deserialize($stream),
            0x598a92a => InputGroupCallStream::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputFileLocation. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}