<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputPrivacyRule
 */
abstract class AbstractInputPrivacyRule extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xd09e07b => InputPrivacyValueAllowContacts::deserialize($__payload, $__offset),
            0x184b35ce => InputPrivacyValueAllowAll::deserialize($__payload, $__offset),
            0x131cc67f => InputPrivacyValueAllowUsers::deserialize($__payload, $__offset),
            0xba52007 => InputPrivacyValueDisallowContacts::deserialize($__payload, $__offset),
            0xd66b66c9 => InputPrivacyValueDisallowAll::deserialize($__payload, $__offset),
            0x90110467 => InputPrivacyValueDisallowUsers::deserialize($__payload, $__offset),
            0x840649cf => InputPrivacyValueAllowChatParticipants::deserialize($__payload, $__offset),
            0xe94f0f86 => InputPrivacyValueDisallowChatParticipants::deserialize($__payload, $__offset),
            0x2f453e49 => InputPrivacyValueAllowCloseFriends::deserialize($__payload, $__offset),
            0x77cdc9f1 => InputPrivacyValueAllowPremium::deserialize($__payload, $__offset),
            0x5a4fcce5 => InputPrivacyValueAllowBots::deserialize($__payload, $__offset),
            0xc4e57915 => InputPrivacyValueDisallowBots::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputPrivacyRule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}