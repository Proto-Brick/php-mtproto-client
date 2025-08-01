<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/Reaction
 */
abstract class AbstractReaction extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ReactionEmpty::CONSTRUCTOR_ID => ReactionEmpty::deserialize($deserializer, $stream),
            ReactionEmoji::CONSTRUCTOR_ID => ReactionEmoji::deserialize($deserializer, $stream),
            ReactionCustomEmoji::CONSTRUCTOR_ID => ReactionCustomEmoji::deserialize($deserializer, $stream),
            ReactionPaid::CONSTRUCTOR_ID => ReactionPaid::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type Reaction: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}