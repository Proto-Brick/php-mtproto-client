<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PrivacyKey
 */
abstract class AbstractPrivacyKey extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            PrivacyKeyStatusTimestamp::CONSTRUCTOR_ID => PrivacyKeyStatusTimestamp::deserialize($stream),
            PrivacyKeyChatInvite::CONSTRUCTOR_ID => PrivacyKeyChatInvite::deserialize($stream),
            PrivacyKeyPhoneCall::CONSTRUCTOR_ID => PrivacyKeyPhoneCall::deserialize($stream),
            PrivacyKeyPhoneP2P::CONSTRUCTOR_ID => PrivacyKeyPhoneP2P::deserialize($stream),
            PrivacyKeyForwards::CONSTRUCTOR_ID => PrivacyKeyForwards::deserialize($stream),
            PrivacyKeyProfilePhoto::CONSTRUCTOR_ID => PrivacyKeyProfilePhoto::deserialize($stream),
            PrivacyKeyPhoneNumber::CONSTRUCTOR_ID => PrivacyKeyPhoneNumber::deserialize($stream),
            PrivacyKeyAddedByPhone::CONSTRUCTOR_ID => PrivacyKeyAddedByPhone::deserialize($stream),
            PrivacyKeyVoiceMessages::CONSTRUCTOR_ID => PrivacyKeyVoiceMessages::deserialize($stream),
            PrivacyKeyAbout::CONSTRUCTOR_ID => PrivacyKeyAbout::deserialize($stream),
            PrivacyKeyBirthday::CONSTRUCTOR_ID => PrivacyKeyBirthday::deserialize($stream),
            PrivacyKeyStarGiftsAutoSave::CONSTRUCTOR_ID => PrivacyKeyStarGiftsAutoSave::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type PrivacyKey. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}