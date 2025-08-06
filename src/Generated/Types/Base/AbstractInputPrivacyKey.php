<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputPrivacyKey
 */
abstract class AbstractInputPrivacyKey extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            InputPrivacyKeyStatusTimestamp::CONSTRUCTOR_ID => InputPrivacyKeyStatusTimestamp::deserialize($deserializer, $stream),
            InputPrivacyKeyChatInvite::CONSTRUCTOR_ID => InputPrivacyKeyChatInvite::deserialize($deserializer, $stream),
            InputPrivacyKeyPhoneCall::CONSTRUCTOR_ID => InputPrivacyKeyPhoneCall::deserialize($deserializer, $stream),
            InputPrivacyKeyPhoneP2P::CONSTRUCTOR_ID => InputPrivacyKeyPhoneP2P::deserialize($deserializer, $stream),
            InputPrivacyKeyForwards::CONSTRUCTOR_ID => InputPrivacyKeyForwards::deserialize($deserializer, $stream),
            InputPrivacyKeyProfilePhoto::CONSTRUCTOR_ID => InputPrivacyKeyProfilePhoto::deserialize($deserializer, $stream),
            InputPrivacyKeyPhoneNumber::CONSTRUCTOR_ID => InputPrivacyKeyPhoneNumber::deserialize($deserializer, $stream),
            InputPrivacyKeyAddedByPhone::CONSTRUCTOR_ID => InputPrivacyKeyAddedByPhone::deserialize($deserializer, $stream),
            InputPrivacyKeyVoiceMessages::CONSTRUCTOR_ID => InputPrivacyKeyVoiceMessages::deserialize($deserializer, $stream),
            InputPrivacyKeyAbout::CONSTRUCTOR_ID => InputPrivacyKeyAbout::deserialize($deserializer, $stream),
            InputPrivacyKeyBirthday::CONSTRUCTOR_ID => InputPrivacyKeyBirthday::deserialize($deserializer, $stream),
            InputPrivacyKeyStarGiftsAutoSave::CONSTRUCTOR_ID => InputPrivacyKeyStarGiftsAutoSave::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputPrivacyKey. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}