<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/StatsGraph
 */
abstract class AbstractStatsGraph extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            StatsGraphAsync::CONSTRUCTOR_ID => StatsGraphAsync::deserialize($deserializer, $stream),
            StatsGraphError::CONSTRUCTOR_ID => StatsGraphError::deserialize($deserializer, $stream),
            StatsGraph::CONSTRUCTOR_ID => StatsGraph::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type StatsGraph. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}