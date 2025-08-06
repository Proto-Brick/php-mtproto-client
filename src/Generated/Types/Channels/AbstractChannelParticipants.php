<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Channels;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/channels.ChannelParticipants
 */
abstract class AbstractChannelParticipants extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            ChannelParticipants::CONSTRUCTOR_ID => ChannelParticipants::deserialize($deserializer, $stream),
            ChannelParticipantsNotModified::CONSTRUCTOR_ID => ChannelParticipantsNotModified::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type channels.ChannelParticipants. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}