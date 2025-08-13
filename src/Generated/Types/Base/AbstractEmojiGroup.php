<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/EmojiGroup
 */
abstract class AbstractEmojiGroup extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x7a9abda9 => EmojiGroup::deserialize($stream),
            0x80d26cc7 => EmojiGroupGreeting::deserialize($stream),
            0x93bcf34 => EmojiGroupPremium::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type EmojiGroup. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}