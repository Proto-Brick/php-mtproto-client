<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Channels;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/channels.ChannelParticipants
 */
abstract class AbstractChannelParticipants extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x9ab0feaf => ChannelParticipants::deserialize($stream),
            0xf0173fe9 => ChannelParticipantsNotModified::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type channels.ChannelParticipants. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}