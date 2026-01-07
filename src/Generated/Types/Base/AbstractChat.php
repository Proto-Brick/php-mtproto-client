<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/Chat
 */
abstract class AbstractChat extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x29562865 => ChatEmpty::deserialize($__payload, $__offset),
            0x41cbf256 => Chat::deserialize($__payload, $__offset),
            0x6592a1a7 => ChatForbidden::deserialize($__payload, $__offset),
            0x1c32b11c => Channel::deserialize($__payload, $__offset),
            0x17d493d5 => ChannelForbidden::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type Chat. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}