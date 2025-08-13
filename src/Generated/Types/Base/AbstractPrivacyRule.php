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
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xfffe1bac => PrivacyValueAllowContacts::deserialize($stream),
            0x65427b82 => PrivacyValueAllowAll::deserialize($stream),
            0xb8905fb2 => PrivacyValueAllowUsers::deserialize($stream),
            0xf888fa1a => PrivacyValueDisallowContacts::deserialize($stream),
            0x8b73e763 => PrivacyValueDisallowAll::deserialize($stream),
            0xe4621141 => PrivacyValueDisallowUsers::deserialize($stream),
            0x6b134e8e => PrivacyValueAllowChatParticipants::deserialize($stream),
            0x41c87565 => PrivacyValueDisallowChatParticipants::deserialize($stream),
            0xf7e8d89b => PrivacyValueAllowCloseFriends::deserialize($stream),
            0xece9814b => PrivacyValueAllowPremium::deserialize($stream),
            0x21461b5d => PrivacyValueAllowBots::deserialize($stream),
            0xf6a5f82f => PrivacyValueDisallowBots::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type PrivacyRule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}