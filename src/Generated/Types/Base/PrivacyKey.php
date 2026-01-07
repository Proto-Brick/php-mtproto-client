<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use RuntimeException;
use ValueError;

/**
 * @see https://core.telegram.org/type/PrivacyKey
 */
enum PrivacyKey: int implements TlObjectInterface
{
    case PrivacyKeyStatusTimestamp = 0xbc2eab30;
    case PrivacyKeyChatInvite = 0x500e6dfa;
    case PrivacyKeyPhoneCall = 0x3d662b7b;
    case PrivacyKeyPhoneP2P = 0x39491cc8;
    case PrivacyKeyForwards = 0x69ec56a3;
    case PrivacyKeyProfilePhoto = 0x96151fed;
    case PrivacyKeyPhoneNumber = 0xd19ae46d;
    case PrivacyKeyAddedByPhone = 0x42ffd42b;
    case PrivacyKeyVoiceMessages = 0x697f414;
    case PrivacyKeyAbout = 0xa486b761;
    case PrivacyKeyBirthday = 0x2000a518;
    case PrivacyKeyStarGiftsAutoSave = 0x2ca4fdf8;
    case PrivacyKeyNoPaidMessages = 0x17d348d2;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string $__payload, int &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        try {
            return self::from($constructorId);
        } catch (ValueError $e) {
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
            self::PrivacyKeyStatusTimestamp => 'privacyKeyStatusTimestamp',
            self::PrivacyKeyChatInvite => 'privacyKeyChatInvite',
            self::PrivacyKeyPhoneCall => 'privacyKeyPhoneCall',
            self::PrivacyKeyPhoneP2P => 'privacyKeyPhoneP2P',
            self::PrivacyKeyForwards => 'privacyKeyForwards',
            self::PrivacyKeyProfilePhoto => 'privacyKeyProfilePhoto',
            self::PrivacyKeyPhoneNumber => 'privacyKeyPhoneNumber',
            self::PrivacyKeyAddedByPhone => 'privacyKeyAddedByPhone',
            self::PrivacyKeyVoiceMessages => 'privacyKeyVoiceMessages',
            self::PrivacyKeyAbout => 'privacyKeyAbout',
            self::PrivacyKeyBirthday => 'privacyKeyBirthday',
            self::PrivacyKeyStarGiftsAutoSave => 'privacyKeyStarGiftsAutoSave',
            self::PrivacyKeyNoPaidMessages => 'privacyKeyNoPaidMessages',
        };
    }
}