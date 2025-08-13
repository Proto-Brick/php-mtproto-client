<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/EmailVerifyPurpose
 */
abstract class AbstractEmailVerifyPurpose extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x4345be73 => EmailVerifyPurposeLoginSetup::deserialize($stream),
            0x527d22eb => EmailVerifyPurposeLoginChange::deserialize($stream),
            0xbbf51685 => EmailVerifyPurposePassport::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type EmailVerifyPurpose. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}