<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/SecureValueError
 */
abstract class AbstractSecureValueError extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xe8a40bd9 => SecureValueErrorData::deserialize($__payload, $__offset),
            0xbe3dfa => SecureValueErrorFrontSide::deserialize($__payload, $__offset),
            0x868a2aa5 => SecureValueErrorReverseSide::deserialize($__payload, $__offset),
            0xe537ced6 => SecureValueErrorSelfie::deserialize($__payload, $__offset),
            0x7a700873 => SecureValueErrorFile::deserialize($__payload, $__offset),
            0x666220e9 => SecureValueErrorFiles::deserialize($__payload, $__offset),
            0x869d758f => SecureValueError::deserialize($__payload, $__offset),
            0xa1144770 => SecureValueErrorTranslationFile::deserialize($__payload, $__offset),
            0x34636dd8 => SecureValueErrorTranslationFiles::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type SecureValueError. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}