<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/Reaction
 */
abstract class AbstractReaction extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x79f5d419 => ReactionEmpty::deserialize($stream),
            0x1b2286b8 => ReactionEmoji::deserialize($stream),
            0x8935fc73 => ReactionCustomEmoji::deserialize($stream),
            0x523da4eb => ReactionPaid::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type Reaction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}