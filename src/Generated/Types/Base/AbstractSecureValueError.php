<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/SecureValueError
 */
abstract class AbstractSecureValueError extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xe8a40bd9 => SecureValueErrorData::deserialize($stream),
            0xbe3dfa => SecureValueErrorFrontSide::deserialize($stream),
            0x868a2aa5 => SecureValueErrorReverseSide::deserialize($stream),
            0xe537ced6 => SecureValueErrorSelfie::deserialize($stream),
            0x7a700873 => SecureValueErrorFile::deserialize($stream),
            0x666220e9 => SecureValueErrorFiles::deserialize($stream),
            0x869d758f => SecureValueError::deserialize($stream),
            0xa1144770 => SecureValueErrorTranslationFile::deserialize($stream),
            0x34636dd8 => SecureValueErrorTranslationFiles::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type SecureValueError. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}