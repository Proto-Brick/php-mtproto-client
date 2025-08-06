<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/EmailVerifyPurpose
 */
abstract class AbstractEmailVerifyPurpose extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            EmailVerifyPurposeLoginSetup::CONSTRUCTOR_ID => EmailVerifyPurposeLoginSetup::deserialize($deserializer, $stream),
            EmailVerifyPurposeLoginChange::CONSTRUCTOR_ID => EmailVerifyPurposeLoginChange::deserialize($deserializer, $stream),
            EmailVerifyPurposePassport::CONSTRUCTOR_ID => EmailVerifyPurposePassport::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type EmailVerifyPurpose. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}