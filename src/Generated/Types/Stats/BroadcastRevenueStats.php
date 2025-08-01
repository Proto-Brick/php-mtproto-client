<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBroadcastRevenueBalances;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stats.broadcastRevenueStats
 */
final class BroadcastRevenueStats extends AbstractBroadcastRevenueStats
{
    public const CONSTRUCTOR_ID = 1409802903;
    
    public string $_ = 'stats.broadcastRevenueStats';
    
    /**
     * @param AbstractStatsGraph $topHoursGraph
     * @param AbstractStatsGraph $revenueGraph
     * @param AbstractBroadcastRevenueBalances $balances
     * @param float $usdRate
     */
    public function __construct(
        public readonly AbstractStatsGraph $topHoursGraph,
        public readonly AbstractStatsGraph $revenueGraph,
        public readonly AbstractBroadcastRevenueBalances $balances,
        public readonly float $usdRate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->topHoursGraph->serialize($serializer);
        $buffer .= $this->revenueGraph->serialize($serializer);
        $buffer .= $this->balances->serialize($serializer);
        $buffer .= pack('d', $this->usdRate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $topHoursGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $revenueGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $balances = AbstractBroadcastRevenueBalances::deserialize($deserializer, $stream);
        $usdRate = $deserializer->double($stream);
            return new self(
            $topHoursGraph,
            $revenueGraph,
            $balances,
            $usdRate
        );
    }
}