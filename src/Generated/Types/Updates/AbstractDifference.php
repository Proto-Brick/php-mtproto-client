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
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x5d75a138 => DifferenceEmpty::deserialize($stream),
            0xf49ca0 => Difference::deserialize($stream),
            0xa8fb1981 => DifferenceSlice::deserialize($stream),
            0x4afe8f6d => DifferenceTooLong::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type updates.Difference. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}