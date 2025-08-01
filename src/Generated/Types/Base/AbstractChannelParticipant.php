<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ChannelParticipant
 */
abstract class AbstractChannelParticipant extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ChannelParticipant::CONSTRUCTOR_ID => ChannelParticipant::deserialize($deserializer, $stream),
            ChannelParticipantSelf::CONSTRUCTOR_ID => ChannelParticipantSelf::deserialize($deserializer, $stream),
            ChannelParticipantCreator::CONSTRUCTOR_ID => ChannelParticipantCreator::deserialize($deserializer, $stream),
            ChannelParticipantAdmin::CONSTRUCTOR_ID => ChannelParticipantAdmin::deserialize($deserializer, $stream),
            ChannelParticipantBanned::CONSTRUCTOR_ID => ChannelParticipantBanned::deserialize($deserializer, $stream),
            ChannelParticipantLeft::CONSTRUCTOR_ID => ChannelParticipantLeft::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type ChannelParticipant: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}