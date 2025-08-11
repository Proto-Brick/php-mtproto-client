<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PrivacyRule
 */
abstract class AbstractPrivacyRule extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            PrivacyValueAllowContacts::CONSTRUCTOR_ID => PrivacyValueAllowContacts::deserialize($stream),
            PrivacyValueAllowAll::CONSTRUCTOR_ID => PrivacyValueAllowAll::deserialize($stream),
            PrivacyValueAllowUsers::CONSTRUCTOR_ID => PrivacyValueAllowUsers::deserialize($stream),
            PrivacyValueDisallowContacts::CONSTRUCTOR_ID => PrivacyValueDisallowContacts::deserialize($stream),
            PrivacyValueDisallowAll::CONSTRUCTOR_ID => PrivacyValueDisallowAll::deserialize($stream),
            PrivacyValueDisallowUsers::CONSTRUCTOR_ID => PrivacyValueDisallowUsers::deserialize($stream),
            PrivacyValueAllowChatParticipants::CONSTRUCTOR_ID => PrivacyValueAllowChatParticipants::deserialize($stream),
            PrivacyValueDisallowChatParticipants::CONSTRUCTOR_ID => PrivacyValueDisallowChatParticipants::deserialize($stream),
            PrivacyValueAllowCloseFriends::CONSTRUCTOR_ID => PrivacyValueAllowCloseFriends::deserialize($stream),
            PrivacyValueAllowPremium::CONSTRUCTOR_ID => PrivacyValueAllowPremium::deserialize($stream),
            PrivacyValueAllowBots::CONSTRUCTOR_ID => PrivacyValueAllowBots::deserialize($stream),
            PrivacyValueDisallowBots::CONSTRUCTOR_ID => PrivacyValueDisallowBots::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PrivacyRule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}