<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/Chat
 */
abstract class AbstractChat extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ChatEmpty::CONSTRUCTOR_ID => ChatEmpty::deserialize($deserializer, $stream),
            Chat::CONSTRUCTOR_ID => Chat::deserialize($deserializer, $stream),
            ChatForbidden::CONSTRUCTOR_ID => ChatForbidden::deserialize($deserializer, $stream),
            Channel::CONSTRUCTOR_ID => Channel::deserialize($deserializer, $stream),
            ChannelForbidden::CONSTRUCTOR_ID => ChannelForbidden::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type Chat: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}