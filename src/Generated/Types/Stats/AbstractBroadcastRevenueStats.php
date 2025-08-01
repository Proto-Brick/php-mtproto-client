<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/stats.BroadcastRevenueStats
 */
abstract class AbstractBroadcastRevenueStats extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            BroadcastRevenueStats::CONSTRUCTOR_ID => BroadcastRevenueStats::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type stats.BroadcastRevenueStats: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}