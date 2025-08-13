<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/PhoneCall
 */
abstract class AbstractPhoneCall extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x5366c915 => PhoneCallEmpty::deserialize($stream),
            0xc5226f17 => PhoneCallWaiting::deserialize($stream),
            0x14b0ed0c => PhoneCallRequested::deserialize($stream),
            0x3660c311 => PhoneCallAccepted::deserialize($stream),
            0x30535af5 => PhoneCall::deserialize($stream),
            0x50ca4de1 => PhoneCallDiscarded::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type PhoneCall. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}