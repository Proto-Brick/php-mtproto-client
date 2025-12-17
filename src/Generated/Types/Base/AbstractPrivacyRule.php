<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/PrivacyRule
 */
abstract class AbstractPrivacyRule extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xfffe1bac => PrivacyValueAllowContacts::deserialize($__payload, $__offset),
            0x65427b82 => PrivacyValueAllowAll::deserialize($__payload, $__offset),
            0xb8905fb2 => PrivacyValueAllowUsers::deserialize($__payload, $__offset),
            0xf888fa1a => PrivacyValueDisallowContacts::deserialize($__payload, $__offset),
            0x8b73e763 => PrivacyValueDisallowAll::deserialize($__payload, $__offset),
            0xe4621141 => PrivacyValueDisallowUsers::deserialize($__payload, $__offset),
            0x6b134e8e => PrivacyValueAllowChatParticipants::deserialize($__payload, $__offset),
            0x41c87565 => PrivacyValueDisallowChatParticipants::deserialize($__payload, $__offset),
            0xf7e8d89b => PrivacyValueAllowCloseFriends::deserialize($__payload, $__offset),
            0xece9814b => PrivacyValueAllowPremium::deserialize($__payload, $__offset),
            0x21461b5d => PrivacyValueAllowBots::deserialize($__payload, $__offset),
            0xf6a5f82f => PrivacyValueDisallowBots::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type PrivacyRule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}