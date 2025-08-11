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
            SecureValueErrorData::CONSTRUCTOR_ID => SecureValueErrorData::deserialize($stream),
            SecureValueErrorFrontSide::CONSTRUCTOR_ID => SecureValueErrorFrontSide::deserialize($stream),
            SecureValueErrorReverseSide::CONSTRUCTOR_ID => SecureValueErrorReverseSide::deserialize($stream),
            SecureValueErrorSelfie::CONSTRUCTOR_ID => SecureValueErrorSelfie::deserialize($stream),
            SecureValueErrorFile::CONSTRUCTOR_ID => SecureValueErrorFile::deserialize($stream),
            SecureValueErrorFiles::CONSTRUCTOR_ID => SecureValueErrorFiles::deserialize($stream),
            SecureValueError::CONSTRUCTOR_ID => SecureValueError::deserialize($stream),
            SecureValueErrorTranslationFile::CONSTRUCTOR_ID => SecureValueErrorTranslationFile::deserialize($stream),
            SecureValueErrorTranslationFiles::CONSTRUCTOR_ID => SecureValueErrorTranslationFiles::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type SecureValueError. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}