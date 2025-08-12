<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PasswordKdfAlgo
 */
abstract class AbstractPasswordKdfAlgo extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            PasswordKdfAlgoUnknown::CONSTRUCTOR_ID => PasswordKdfAlgoUnknown::deserialize($stream),
            PasswordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow::CONSTRUCTOR_ID => PasswordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PasswordKdfAlgo. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}