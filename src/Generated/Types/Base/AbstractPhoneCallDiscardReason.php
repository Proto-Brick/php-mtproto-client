<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PhoneCallDiscardReason
 */
abstract class AbstractPhoneCallDiscardReason extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x85e42301 => PhoneCallDiscardReasonMissed::deserialize($stream),
            0xe095c1a0 => PhoneCallDiscardReasonDisconnect::deserialize($stream),
            0x57adc690 => PhoneCallDiscardReasonHangup::deserialize($stream),
            0xfaf7e8c9 => PhoneCallDiscardReasonBusy::deserialize($stream),
            0x9fbbf1f7 => PhoneCallDiscardReasonMigrateConferenceCall::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PhoneCallDiscardReason. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}