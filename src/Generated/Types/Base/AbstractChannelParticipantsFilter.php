<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ChannelParticipantsFilter
 */
abstract class AbstractChannelParticipantsFilter extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ChannelParticipantsRecent::CONSTRUCTOR_ID => ChannelParticipantsRecent::deserialize($deserializer, $stream),
            ChannelParticipantsAdmins::CONSTRUCTOR_ID => ChannelParticipantsAdmins::deserialize($deserializer, $stream),
            ChannelParticipantsKicked::CONSTRUCTOR_ID => ChannelParticipantsKicked::deserialize($deserializer, $stream),
            ChannelParticipantsBots::CONSTRUCTOR_ID => ChannelParticipantsBots::deserialize($deserializer, $stream),
            ChannelParticipantsBanned::CONSTRUCTOR_ID => ChannelParticipantsBanned::deserialize($deserializer, $stream),
            ChannelParticipantsSearch::CONSTRUCTOR_ID => ChannelParticipantsSearch::deserialize($deserializer, $stream),
            ChannelParticipantsContacts::CONSTRUCTOR_ID => ChannelParticipantsContacts::deserialize($deserializer, $stream),
            ChannelParticipantsMentions::CONSTRUCTOR_ID => ChannelParticipantsMentions::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type ChannelParticipantsFilter: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}