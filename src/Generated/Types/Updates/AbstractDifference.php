<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/updates.Difference
 */
abstract class AbstractDifference extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x5d75a138 => DifferenceEmpty::deserialize($__payload, $__offset),
            0xf49ca0 => Difference::deserialize($__payload, $__offset),
            0xa8fb1981 => DifferenceSlice::deserialize($__payload, $__offset),
            0x4afe8f6d => DifferenceTooLong::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type updates.Difference. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}