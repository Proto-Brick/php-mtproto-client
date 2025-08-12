<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\Generated\Types\Base\BroadcastRevenueBalances;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stats.broadcastRevenueStats
 */
final class BroadcastRevenueStats extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5407e297;
    
    public string $predicate = 'stats.broadcastRevenueStats';
    
    /**
     * @param AbstractStatsGraph $topHoursGraph
     * @param AbstractStatsGraph $revenueGraph
     * @param BroadcastRevenueBalances $balances
     * @param float $usdRate
     */
    public function __construct(
        public readonly AbstractStatsGraph $topHoursGraph,
        public readonly AbstractStatsGraph $revenueGraph,
        public readonly BroadcastRevenueBalances $balances,
        public readonly float $usdRate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->topHoursGraph->serialize();
        $buffer .= $this->revenueGraph->serialize();
        $buffer .= $this->balances->serialize();
        $buffer .= pack('d', $this->usdRate);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $topHoursGraph = AbstractStatsGraph::deserialize($stream);
        $revenueGraph = AbstractStatsGraph::deserialize($stream);
        $balances = BroadcastRevenueBalances::deserialize($stream);
        $usdRate = Deserializer::double($stream);

        return new self(
            $topHoursGraph,
            $revenueGraph,
            $balances,
            $usdRate
        );
    }
}