<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/Chat
 */
abstract class AbstractChat extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            ChatEmpty::CONSTRUCTOR_ID => ChatEmpty::deserialize($stream),
            Chat::CONSTRUCTOR_ID => Chat::deserialize($stream),
            ChatForbidden::CONSTRUCTOR_ID => ChatForbidden::deserialize($stream),
            Channel::CONSTRUCTOR_ID => Channel::deserialize($stream),
            ChannelForbidden::CONSTRUCTOR_ID => ChannelForbidden::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type Chat. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}