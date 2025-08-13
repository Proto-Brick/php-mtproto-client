<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/EncryptedChat
 */
abstract class AbstractEncryptedChat extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xab7ec0a0 => EncryptedChatEmpty::deserialize($stream),
            0x66b25953 => EncryptedChatWaiting::deserialize($stream),
            0x48f1d94c => EncryptedChatRequested::deserialize($stream),
            0x61f0d4c7 => EncryptedChat::deserialize($stream),
            0x1e1c7c45 => EncryptedChatDiscarded::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type EncryptedChat. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}