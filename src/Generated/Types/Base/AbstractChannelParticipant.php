<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ChannelParticipant
 */
abstract class AbstractChannelParticipant extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xcb397619 => ChannelParticipant::deserialize($stream),
            0x4f607bef => ChannelParticipantSelf::deserialize($stream),
            0x2fe601d3 => ChannelParticipantCreator::deserialize($stream),
            0x34c3bb53 => ChannelParticipantAdmin::deserialize($stream),
            0x6df8014e => ChannelParticipantBanned::deserialize($stream),
            0x1b03f006 => ChannelParticipantLeft::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ChannelParticipant. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}