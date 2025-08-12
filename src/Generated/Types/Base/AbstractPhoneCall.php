<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
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
            PhoneCallEmpty::CONSTRUCTOR_ID => PhoneCallEmpty::deserialize($stream),
            PhoneCallWaiting::CONSTRUCTOR_ID => PhoneCallWaiting::deserialize($stream),
            PhoneCallRequested::CONSTRUCTOR_ID => PhoneCallRequested::deserialize($stream),
            PhoneCallAccepted::CONSTRUCTOR_ID => PhoneCallAccepted::deserialize($stream),
            PhoneCall::CONSTRUCTOR_ID => PhoneCall::deserialize($stream),
            PhoneCallDiscarded::CONSTRUCTOR_ID => PhoneCallDiscarded::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PhoneCall. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}