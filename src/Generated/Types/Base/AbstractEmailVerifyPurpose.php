<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/EmailVerifyPurpose
 */
abstract class AbstractEmailVerifyPurpose extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x4345be73 => EmailVerifyPurposeLoginSetup::deserialize($__payload, $__offset),
            0x527d22eb => EmailVerifyPurposeLoginChange::deserialize($__payload, $__offset),
            0xbbf51685 => EmailVerifyPurposePassport::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type EmailVerifyPurpose. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}