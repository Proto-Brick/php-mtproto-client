<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/SecureValueError
 */
abstract class AbstractSecureValueError extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            SecureValueErrorData::CONSTRUCTOR_ID => SecureValueErrorData::deserialize($deserializer, $stream),
            SecureValueErrorFrontSide::CONSTRUCTOR_ID => SecureValueErrorFrontSide::deserialize($deserializer, $stream),
            SecureValueErrorReverseSide::CONSTRUCTOR_ID => SecureValueErrorReverseSide::deserialize($deserializer, $stream),
            SecureValueErrorSelfie::CONSTRUCTOR_ID => SecureValueErrorSelfie::deserialize($deserializer, $stream),
            SecureValueErrorFile::CONSTRUCTOR_ID => SecureValueErrorFile::deserialize($deserializer, $stream),
            SecureValueErrorFiles::CONSTRUCTOR_ID => SecureValueErrorFiles::deserialize($deserializer, $stream),
            SecureValueError::CONSTRUCTOR_ID => SecureValueError::deserialize($deserializer, $stream),
            SecureValueErrorTranslationFile::CONSTRUCTOR_ID => SecureValueErrorTranslationFile::deserialize($deserializer, $stream),
            SecureValueErrorTranslationFiles::CONSTRUCTOR_ID => SecureValueErrorTranslationFiles::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type SecureValueError: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}