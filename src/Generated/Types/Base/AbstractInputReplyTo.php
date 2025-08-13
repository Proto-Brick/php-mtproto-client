<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputReplyTo
 */
abstract class AbstractInputReplyTo extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x869fbe10 => InputReplyToMessage::deserialize($stream),
            0x5881323a => InputReplyToStory::deserialize($stream),
            0x69d66c45 => InputReplyToMonoForum::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputReplyTo. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}