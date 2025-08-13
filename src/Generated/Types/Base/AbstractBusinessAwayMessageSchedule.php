<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/BusinessAwayMessageSchedule
 */
abstract class AbstractBusinessAwayMessageSchedule extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xc9b9e2b9 => BusinessAwayMessageScheduleAlways::deserialize($stream),
            0xc3f2f501 => BusinessAwayMessageScheduleOutsideWorkHours::deserialize($stream),
            0xcc4d9ecc => BusinessAwayMessageScheduleCustom::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type BusinessAwayMessageSchedule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}