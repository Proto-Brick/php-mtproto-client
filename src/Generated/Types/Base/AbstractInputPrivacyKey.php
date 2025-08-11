<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputPrivacyKey
 */
abstract class AbstractInputPrivacyKey extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputPrivacyKeyStatusTimestamp::CONSTRUCTOR_ID => InputPrivacyKeyStatusTimestamp::deserialize($stream),
            InputPrivacyKeyChatInvite::CONSTRUCTOR_ID => InputPrivacyKeyChatInvite::deserialize($stream),
            InputPrivacyKeyPhoneCall::CONSTRUCTOR_ID => InputPrivacyKeyPhoneCall::deserialize($stream),
            InputPrivacyKeyPhoneP2P::CONSTRUCTOR_ID => InputPrivacyKeyPhoneP2P::deserialize($stream),
            InputPrivacyKeyForwards::CONSTRUCTOR_ID => InputPrivacyKeyForwards::deserialize($stream),
            InputPrivacyKeyProfilePhoto::CONSTRUCTOR_ID => InputPrivacyKeyProfilePhoto::deserialize($stream),
            InputPrivacyKeyPhoneNumber::CONSTRUCTOR_ID => InputPrivacyKeyPhoneNumber::deserialize($stream),
            InputPrivacyKeyAddedByPhone::CONSTRUCTOR_ID => InputPrivacyKeyAddedByPhone::deserialize($stream),
            InputPrivacyKeyVoiceMessages::CONSTRUCTOR_ID => InputPrivacyKeyVoiceMessages::deserialize($stream),
            InputPrivacyKeyAbout::CONSTRUCTOR_ID => InputPrivacyKeyAbout::deserialize($stream),
            InputPrivacyKeyBirthday::CONSTRUCTOR_ID => InputPrivacyKeyBirthday::deserialize($stream),
            InputPrivacyKeyStarGiftsAutoSave::CONSTRUCTOR_ID => InputPrivacyKeyStarGiftsAutoSave::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputPrivacyKey. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}