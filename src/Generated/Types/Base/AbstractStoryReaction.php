<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/StoryReaction
 */
abstract class AbstractStoryReaction extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x6090d6d5 => StoryReaction::deserialize($stream),
            0xbbab2643 => StoryReactionPublicForward::deserialize($stream),
            0xcfcd0f13 => StoryReactionPublicRepost::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type StoryReaction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}