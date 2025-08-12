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
            ChannelParticipant::CONSTRUCTOR_ID => ChannelParticipant::deserialize($stream),
            ChannelParticipantSelf::CONSTRUCTOR_ID => ChannelParticipantSelf::deserialize($stream),
            ChannelParticipantCreator::CONSTRUCTOR_ID => ChannelParticipantCreator::deserialize($stream),
            ChannelParticipantAdmin::CONSTRUCTOR_ID => ChannelParticipantAdmin::deserialize($stream),
            ChannelParticipantBanned::CONSTRUCTOR_ID => ChannelParticipantBanned::deserialize($stream),
            ChannelParticipantLeft::CONSTRUCTOR_ID => ChannelParticipantLeft::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ChannelParticipant. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}