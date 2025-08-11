<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputPrivacyRule
 */
abstract class AbstractInputPrivacyRule extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputPrivacyValueAllowContacts::CONSTRUCTOR_ID => InputPrivacyValueAllowContacts::deserialize($stream),
            InputPrivacyValueAllowAll::CONSTRUCTOR_ID => InputPrivacyValueAllowAll::deserialize($stream),
            InputPrivacyValueAllowUsers::CONSTRUCTOR_ID => InputPrivacyValueAllowUsers::deserialize($stream),
            InputPrivacyValueDisallowContacts::CONSTRUCTOR_ID => InputPrivacyValueDisallowContacts::deserialize($stream),
            InputPrivacyValueDisallowAll::CONSTRUCTOR_ID => InputPrivacyValueDisallowAll::deserialize($stream),
            InputPrivacyValueDisallowUsers::CONSTRUCTOR_ID => InputPrivacyValueDisallowUsers::deserialize($stream),
            InputPrivacyValueAllowChatParticipants::CONSTRUCTOR_ID => InputPrivacyValueAllowChatParticipants::deserialize($stream),
            InputPrivacyValueDisallowChatParticipants::CONSTRUCTOR_ID => InputPrivacyValueDisallowChatParticipants::deserialize($stream),
            InputPrivacyValueAllowCloseFriends::CONSTRUCTOR_ID => InputPrivacyValueAllowCloseFriends::deserialize($stream),
            InputPrivacyValueAllowPremium::CONSTRUCTOR_ID => InputPrivacyValueAllowPremium::deserialize($stream),
            InputPrivacyValueAllowBots::CONSTRUCTOR_ID => InputPrivacyValueAllowBots::deserialize($stream),
            InputPrivacyValueDisallowBots::CONSTRUCTOR_ID => InputPrivacyValueDisallowBots::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputPrivacyRule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}