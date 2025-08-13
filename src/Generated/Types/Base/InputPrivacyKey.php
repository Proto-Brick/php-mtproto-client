<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Contracts\TlObjectInterface;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/InputPrivacyKey
 */
enum InputPrivacyKey: int implements TlObjectInterface
{
    case InputPrivacyKeyStatusTimestamp = 0x4f96cb18;
    case InputPrivacyKeyChatInvite = 0xbdfb0426;
    case InputPrivacyKeyPhoneCall = 0xfabadc5f;
    case InputPrivacyKeyPhoneP2P = 0xdb9e70d2;
    case InputPrivacyKeyForwards = 0xa4dd4c08;
    case InputPrivacyKeyProfilePhoto = 0x5719bacc;
    case InputPrivacyKeyPhoneNumber = 0x352dafa;
    case InputPrivacyKeyAddedByPhone = 0xd1219bdd;
    case InputPrivacyKeyVoiceMessages = 0xaee69d68;
    case InputPrivacyKeyAbout = 0x3823cc40;
    case InputPrivacyKeyBirthday = 0xd65a11cc;
    case InputPrivacyKeyStarGiftsAutoSave = 0xe1732341;
    case InputPrivacyKeyNoPaidMessages = 0xbdc597b4;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        try {
            return self::from($constructorId);
        } catch (\ValueError $e) {
            throw new RuntimeException(sprintf(
                'Unknown constructor ID for enum %s. Received ID: 0x%s (signed: %d)',
                self::class,
                dechex(unpack('V', pack('l', $constructorId))[1]),
                $constructorId
            ), 0, $e);
        }
    }
    
    public function getConstructorId(): int
    {
        return $this->value;
    }
    
    public function getPredicate(): string
    {
        return match($this) {
            self::InputPrivacyKeyStatusTimestamp => 'inputPrivacyKeyStatusTimestamp',
            self::InputPrivacyKeyChatInvite => 'inputPrivacyKeyChatInvite',
            self::InputPrivacyKeyPhoneCall => 'inputPrivacyKeyPhoneCall',
            self::InputPrivacyKeyPhoneP2P => 'inputPrivacyKeyPhoneP2P',
            self::InputPrivacyKeyForwards => 'inputPrivacyKeyForwards',
            self::InputPrivacyKeyProfilePhoto => 'inputPrivacyKeyProfilePhoto',
            self::InputPrivacyKeyPhoneNumber => 'inputPrivacyKeyPhoneNumber',
            self::InputPrivacyKeyAddedByPhone => 'inputPrivacyKeyAddedByPhone',
            self::InputPrivacyKeyVoiceMessages => 'inputPrivacyKeyVoiceMessages',
            self::InputPrivacyKeyAbout => 'inputPrivacyKeyAbout',
            self::InputPrivacyKeyBirthday => 'inputPrivacyKeyBirthday',
            self::InputPrivacyKeyStarGiftsAutoSave => 'inputPrivacyKeyStarGiftsAutoSave',
            self::InputPrivacyKeyNoPaidMessages => 'inputPrivacyKeyNoPaidMessages',
        };
    }
}