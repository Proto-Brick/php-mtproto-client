<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ChatReactions
 */
abstract class AbstractChatReactions extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            ChatReactionsNone::CONSTRUCTOR_ID => ChatReactionsNone::deserialize($stream),
            ChatReactionsAll::CONSTRUCTOR_ID => ChatReactionsAll::deserialize($stream),
            ChatReactionsSome::CONSTRUCTOR_ID => ChatReactionsSome::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ChatReactions. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}