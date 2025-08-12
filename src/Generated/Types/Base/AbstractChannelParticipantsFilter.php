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
            ChannelParticipantsRecent::CONSTRUCTOR_ID => ChannelParticipantsRecent::deserialize($stream),
            ChannelParticipantsAdmins::CONSTRUCTOR_ID => ChannelParticipantsAdmins::deserialize($stream),
            ChannelParticipantsKicked::CONSTRUCTOR_ID => ChannelParticipantsKicked::deserialize($stream),
            ChannelParticipantsBots::CONSTRUCTOR_ID => ChannelParticipantsBots::deserialize($stream),
            ChannelParticipantsBanned::CONSTRUCTOR_ID => ChannelParticipantsBanned::deserialize($stream),
            ChannelParticipantsSearch::CONSTRUCTOR_ID => ChannelParticipantsSearch::deserialize($stream),
            ChannelParticipantsContacts::CONSTRUCTOR_ID => ChannelParticipantsContacts::deserialize($stream),
            ChannelParticipantsMentions::CONSTRUCTOR_ID => ChannelParticipantsMentions::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ChannelParticipantsFilter. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}