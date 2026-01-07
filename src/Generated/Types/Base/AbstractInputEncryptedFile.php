<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputEncryptedFile
 */
abstract class AbstractInputEncryptedFile extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x1837c364 => InputEncryptedFileEmpty::deserialize($__payload, $__offset),
            0x64bd0306 => InputEncryptedFileUploaded::deserialize($__payload, $__offset),
            0x5a17b5e5 => InputEncryptedFile::deserialize($__payload, $__offset),
            0x2dc173c8 => InputEncryptedFileBigUploaded::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputEncryptedFile. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}