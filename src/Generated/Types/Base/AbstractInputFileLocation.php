<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
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
            InputFileLocation::CONSTRUCTOR_ID => InputFileLocation::deserialize($stream),
            InputEncryptedFileLocation::CONSTRUCTOR_ID => InputEncryptedFileLocation::deserialize($stream),
            InputDocumentFileLocation::CONSTRUCTOR_ID => InputDocumentFileLocation::deserialize($stream),
            InputSecureFileLocation::CONSTRUCTOR_ID => InputSecureFileLocation::deserialize($stream),
            InputTakeoutFileLocation::CONSTRUCTOR_ID => InputTakeoutFileLocation::deserialize($stream),
            InputPhotoFileLocation::CONSTRUCTOR_ID => InputPhotoFileLocation::deserialize($stream),
            InputPhotoLegacyFileLocation::CONSTRUCTOR_ID => InputPhotoLegacyFileLocation::deserialize($stream),
            InputPeerPhotoFileLocation::CONSTRUCTOR_ID => InputPeerPhotoFileLocation::deserialize($stream),
            InputStickerSetThumb::CONSTRUCTOR_ID => InputStickerSetThumb::deserialize($stream),
            InputGroupCallStream::CONSTRUCTOR_ID => InputGroupCallStream::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputFileLocation. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}