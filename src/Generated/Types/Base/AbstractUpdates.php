<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/Updates
 */
abstract class AbstractUpdates extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xe317af7e => UpdatesTooLong::deserialize($stream),
            0x313bc7f8 => UpdateShortMessage::deserialize($stream),
            0x4d6deea5 => UpdateShortChatMessage::deserialize($stream),
            0x78d4dec1 => UpdateShort::deserialize($stream),
            0x725b04c3 => UpdatesCombined::deserialize($stream),
            0x74ae4240 => Updates::deserialize($stream),
            0x9015e101 => UpdateShortSentMessage::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type Updates. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}