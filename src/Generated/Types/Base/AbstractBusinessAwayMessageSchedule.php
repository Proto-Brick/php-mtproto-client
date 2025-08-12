<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
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
            BusinessAwayMessageScheduleAlways::CONSTRUCTOR_ID => BusinessAwayMessageScheduleAlways::deserialize($stream),
            BusinessAwayMessageScheduleOutsideWorkHours::CONSTRUCTOR_ID => BusinessAwayMessageScheduleOutsideWorkHours::deserialize($stream),
            BusinessAwayMessageScheduleCustom::CONSTRUCTOR_ID => BusinessAwayMessageScheduleCustom::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type BusinessAwayMessageSchedule. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}