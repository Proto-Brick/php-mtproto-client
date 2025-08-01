<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/SecurePasswordKdfAlgo
 */
abstract class AbstractSecurePasswordKdfAlgo extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            SecurePasswordKdfAlgoUnknown::CONSTRUCTOR_ID => SecurePasswordKdfAlgoUnknown::deserialize($deserializer, $stream),
            SecurePasswordKdfAlgoPBKDF2HMACSHA512iter100000::CONSTRUCTOR_ID => SecurePasswordKdfAlgoPBKDF2HMACSHA512iter100000::deserialize($deserializer, $stream),
            SecurePasswordKdfAlgoSHA512::CONSTRUCTOR_ID => SecurePasswordKdfAlgoSHA512::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type SecurePasswordKdfAlgo: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}