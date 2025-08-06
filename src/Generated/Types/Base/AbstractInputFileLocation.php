<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputFileLocation
 */
abstract class AbstractInputFileLocation extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            InputFileLocation::CONSTRUCTOR_ID => InputFileLocation::deserialize($deserializer, $stream),
            InputEncryptedFileLocation::CONSTRUCTOR_ID => InputEncryptedFileLocation::deserialize($deserializer, $stream),
            InputDocumentFileLocation::CONSTRUCTOR_ID => InputDocumentFileLocation::deserialize($deserializer, $stream),
            InputSecureFileLocation::CONSTRUCTOR_ID => InputSecureFileLocation::deserialize($deserializer, $stream),
            InputTakeoutFileLocation::CONSTRUCTOR_ID => InputTakeoutFileLocation::deserialize($deserializer, $stream),
            InputPhotoFileLocation::CONSTRUCTOR_ID => InputPhotoFileLocation::deserialize($deserializer, $stream),
            InputPhotoLegacyFileLocation::CONSTRUCTOR_ID => InputPhotoLegacyFileLocation::deserialize($deserializer, $stream),
            InputPeerPhotoFileLocation::CONSTRUCTOR_ID => InputPeerPhotoFileLocation::deserialize($deserializer, $stream),
            InputStickerSetThumb::CONSTRUCTOR_ID => InputStickerSetThumb::deserialize($deserializer, $stream),
            InputGroupCallStream::CONSTRUCTOR_ID => InputGroupCallStream::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputFileLocation. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}