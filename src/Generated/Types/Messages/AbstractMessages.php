<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.Messages
 */
abstract class AbstractMessages extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x8c718e87 => Messages::deserialize($stream),
            0x762b263d => MessagesSlice::deserialize($stream),
            0xc776ba4e => ChannelMessages::deserialize($stream),
            0x74535f21 => MessagesNotModified::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type messages.Messages. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}