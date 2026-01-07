<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/ChannelParticipantsFilter
 */
abstract class AbstractChannelParticipantsFilter extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xde3f3c79 => ChannelParticipantsRecent::deserialize($__payload, $__offset),
            0xb4608969 => ChannelParticipantsAdmins::deserialize($__payload, $__offset),
            0xa3b54985 => ChannelParticipantsKicked::deserialize($__payload, $__offset),
            0xb0d1865b => ChannelParticipantsBots::deserialize($__payload, $__offset),
            0x1427a5e1 => ChannelParticipantsBanned::deserialize($__payload, $__offset),
            0x656ac4b => ChannelParticipantsSearch::deserialize($__payload, $__offset),
            0xbb6ae88d => ChannelParticipantsContacts::deserialize($__payload, $__offset),
            0xe04b5ceb => ChannelParticipantsMentions::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type ChannelParticipantsFilter. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}