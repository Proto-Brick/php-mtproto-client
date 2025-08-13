<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ChannelParticipantsFilter
 */
abstract class AbstractChannelParticipantsFilter extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xde3f3c79 => ChannelParticipantsRecent::deserialize($stream),
            0xb4608969 => ChannelParticipantsAdmins::deserialize($stream),
            0xa3b54985 => ChannelParticipantsKicked::deserialize($stream),
            0xb0d1865b => ChannelParticipantsBots::deserialize($stream),
            0x1427a5e1 => ChannelParticipantsBanned::deserialize($stream),
            0x656ac4b => ChannelParticipantsSearch::deserialize($stream),
            0xbb6ae88d => ChannelParticipantsContacts::deserialize($stream),
            0xe04b5ceb => ChannelParticipantsMentions::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ChannelParticipantsFilter. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}