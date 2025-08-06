<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PrivacyKey
 */
abstract class AbstractPrivacyKey extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            PrivacyKeyStatusTimestamp::CONSTRUCTOR_ID => PrivacyKeyStatusTimestamp::deserialize($deserializer, $stream),
            PrivacyKeyChatInvite::CONSTRUCTOR_ID => PrivacyKeyChatInvite::deserialize($deserializer, $stream),
            PrivacyKeyPhoneCall::CONSTRUCTOR_ID => PrivacyKeyPhoneCall::deserialize($deserializer, $stream),
            PrivacyKeyPhoneP2P::CONSTRUCTOR_ID => PrivacyKeyPhoneP2P::deserialize($deserializer, $stream),
            PrivacyKeyForwards::CONSTRUCTOR_ID => PrivacyKeyForwards::deserialize($deserializer, $stream),
            PrivacyKeyProfilePhoto::CONSTRUCTOR_ID => PrivacyKeyProfilePhoto::deserialize($deserializer, $stream),
            PrivacyKeyPhoneNumber::CONSTRUCTOR_ID => PrivacyKeyPhoneNumber::deserialize($deserializer, $stream),
            PrivacyKeyAddedByPhone::CONSTRUCTOR_ID => PrivacyKeyAddedByPhone::deserialize($deserializer, $stream),
            PrivacyKeyVoiceMessages::CONSTRUCTOR_ID => PrivacyKeyVoiceMessages::deserialize($deserializer, $stream),
            PrivacyKeyAbout::CONSTRUCTOR_ID => PrivacyKeyAbout::deserialize($deserializer, $stream),
            PrivacyKeyBirthday::CONSTRUCTOR_ID => PrivacyKeyBirthday::deserialize($deserializer, $stream),
            PrivacyKeyStarGiftsAutoSave::CONSTRUCTOR_ID => PrivacyKeyStarGiftsAutoSave::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PrivacyKey. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}