<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/ChannelParticipant
 */
abstract class AbstractChannelParticipant extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xcb397619 => ChannelParticipant::deserialize($__payload, $__offset),
            0x4f607bef => ChannelParticipantSelf::deserialize($__payload, $__offset),
            0x2fe601d3 => ChannelParticipantCreator::deserialize($__payload, $__offset),
            0x34c3bb53 => ChannelParticipantAdmin::deserialize($__payload, $__offset),
            0x6df8014e => ChannelParticipantBanned::deserialize($__payload, $__offset),
            0x1b03f006 => ChannelParticipantLeft::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type ChannelParticipant. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}