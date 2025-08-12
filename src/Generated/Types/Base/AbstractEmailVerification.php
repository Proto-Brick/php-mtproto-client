<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/EmailVerification
 */
abstract class AbstractEmailVerification extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            EmailVerificationCode::CONSTRUCTOR_ID => EmailVerificationCode::deserialize($stream),
            EmailVerificationGoogle::CONSTRUCTOR_ID => EmailVerificationGoogle::deserialize($stream),
            EmailVerificationApple::CONSTRUCTOR_ID => EmailVerificationApple::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type EmailVerification. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}