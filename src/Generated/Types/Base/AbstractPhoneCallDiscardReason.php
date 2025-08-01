<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PhoneCallDiscardReason
 */
abstract class AbstractPhoneCallDiscardReason extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PhoneCallDiscardReasonMissed::CONSTRUCTOR_ID => PhoneCallDiscardReasonMissed::deserialize($deserializer, $stream),
            PhoneCallDiscardReasonDisconnect::CONSTRUCTOR_ID => PhoneCallDiscardReasonDisconnect::deserialize($deserializer, $stream),
            PhoneCallDiscardReasonHangup::CONSTRUCTOR_ID => PhoneCallDiscardReasonHangup::deserialize($deserializer, $stream),
            PhoneCallDiscardReasonBusy::CONSTRUCTOR_ID => PhoneCallDiscardReasonBusy::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type PhoneCallDiscardReason: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}