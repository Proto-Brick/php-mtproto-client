<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/EmojiStatus
 */
abstract class AbstractEmojiStatus extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x2de11aae => EmojiStatusEmpty::deserialize($stream),
            0xe7ff068a => EmojiStatus::deserialize($stream),
            0x7184603b => EmojiStatusCollectible::deserialize($stream),
            0x7141dbf => InputEmojiStatusCollectible::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type EmojiStatus. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}