<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputPrivacyRule
 */
abstract class AbstractInputPrivacyRule extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            InputPrivacyValueAllowContacts::CONSTRUCTOR_ID => InputPrivacyValueAllowContacts::deserialize($deserializer, $stream),
            InputPrivacyValueAllowAll::CONSTRUCTOR_ID => InputPrivacyValueAllowAll::deserialize($deserializer, $stream),
            InputPrivacyValueAllowUsers::CONSTRUCTOR_ID => InputPrivacyValueAllowUsers::deserialize($deserializer, $stream),
            InputPrivacyValueDisallowContacts::CONSTRUCTOR_ID => InputPrivacyValueDisallowContacts::deserialize($deserializer, $stream),
            InputPrivacyValueDisallowAll::CONSTRUCTOR_ID => InputPrivacyValueDisallowAll::deserialize($deserializer, $stream),
            InputPrivacyValueDisallowUsers::CONSTRUCTOR_ID => InputPrivacyValueDisallowUsers::deserialize($deserializer, $stream),
            InputPrivacyValueAllowChatParticipants::CONSTRUCTOR_ID => InputPrivacyValueAllowChatParticipants::deserialize($deserializer, $stream),
            InputPrivacyValueDisallowChatParticipants::CONSTRUCTOR_ID => InputPrivacyValueDisallowChatParticipants::deserialize($deserializer, $stream),
            InputPrivacyValueAllowCloseFriends::CONSTRUCTOR_ID => InputPrivacyValueAllowCloseFriends::deserialize($deserializer, $stream),
            InputPrivacyValueAllowPremium::CONSTRUCTOR_ID => InputPrivacyValueAllowPremium::deserialize($deserializer, $stream),
            InputPrivacyValueAllowBots::CONSTRUCTOR_ID => InputPrivacyValueAllowBots::deserialize($deserializer, $stream),
            InputPrivacyValueDisallowBots::CONSTRUCTOR_ID => InputPrivacyValueDisallowBots::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputPrivacyRule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}