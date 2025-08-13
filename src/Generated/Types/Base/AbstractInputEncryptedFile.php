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
            0x1837c364 => InputEncryptedFileEmpty::deserialize($stream),
            0x64bd0306 => InputEncryptedFileUploaded::deserialize($stream),
            0x5a17b5e5 => InputEncryptedFile::deserialize($stream),
            0x2dc173c8 => InputEncryptedFileBigUploaded::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputEncryptedFile. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}