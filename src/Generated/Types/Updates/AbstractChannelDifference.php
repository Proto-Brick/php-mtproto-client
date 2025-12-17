<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/updates.ChannelDifference
 */
abstract class AbstractChannelDifference extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x3e11affb => ChannelDifferenceEmpty::deserialize($__payload, $__offset),
            0xa4bcc6fe => ChannelDifferenceTooLong::deserialize($__payload, $__offset),
            0x2064674e => ChannelDifference::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type updates.ChannelDifference. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}