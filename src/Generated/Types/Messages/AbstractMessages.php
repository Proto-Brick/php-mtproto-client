<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.Messages
 */
abstract class AbstractMessages extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            Messages::CONSTRUCTOR_ID => Messages::deserialize($deserializer, $stream),
            MessagesSlice::CONSTRUCTOR_ID => MessagesSlice::deserialize($deserializer, $stream),
            ChannelMessages::CONSTRUCTOR_ID => ChannelMessages::deserialize($deserializer, $stream),
            MessagesNotModified::CONSTRUCTOR_ID => MessagesNotModified::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type messages.Messages. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}