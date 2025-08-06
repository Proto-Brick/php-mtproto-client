<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PrivacyRule
 */
abstract class AbstractPrivacyRule extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            PrivacyValueAllowContacts::CONSTRUCTOR_ID => PrivacyValueAllowContacts::deserialize($deserializer, $stream),
            PrivacyValueAllowAll::CONSTRUCTOR_ID => PrivacyValueAllowAll::deserialize($deserializer, $stream),
            PrivacyValueAllowUsers::CONSTRUCTOR_ID => PrivacyValueAllowUsers::deserialize($deserializer, $stream),
            PrivacyValueDisallowContacts::CONSTRUCTOR_ID => PrivacyValueDisallowContacts::deserialize($deserializer, $stream),
            PrivacyValueDisallowAll::CONSTRUCTOR_ID => PrivacyValueDisallowAll::deserialize($deserializer, $stream),
            PrivacyValueDisallowUsers::CONSTRUCTOR_ID => PrivacyValueDisallowUsers::deserialize($deserializer, $stream),
            PrivacyValueAllowChatParticipants::CONSTRUCTOR_ID => PrivacyValueAllowChatParticipants::deserialize($deserializer, $stream),
            PrivacyValueDisallowChatParticipants::CONSTRUCTOR_ID => PrivacyValueDisallowChatParticipants::deserialize($deserializer, $stream),
            PrivacyValueAllowCloseFriends::CONSTRUCTOR_ID => PrivacyValueAllowCloseFriends::deserialize($deserializer, $stream),
            PrivacyValueAllowPremium::CONSTRUCTOR_ID => PrivacyValueAllowPremium::deserialize($deserializer, $stream),
            PrivacyValueAllowBots::CONSTRUCTOR_ID => PrivacyValueAllowBots::deserialize($deserializer, $stream),
            PrivacyValueDisallowBots::CONSTRUCTOR_ID => PrivacyValueDisallowBots::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PrivacyRule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}