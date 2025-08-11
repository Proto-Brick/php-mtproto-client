<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputEncryptedFile
 */
abstract class AbstractInputEncryptedFile extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputEncryptedFileEmpty::CONSTRUCTOR_ID => InputEncryptedFileEmpty::deserialize($stream),
            InputEncryptedFileUploaded::CONSTRUCTOR_ID => InputEncryptedFileUploaded::deserialize($stream),
            InputEncryptedFile::CONSTRUCTOR_ID => InputEncryptedFile::deserialize($stream),
            InputEncryptedFileBigUploaded::CONSTRUCTOR_ID => InputEncryptedFileBigUploaded::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputEncryptedFile. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}