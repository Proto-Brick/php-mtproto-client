<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsRevenueStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.starsRevenueStats
 */
final class StarsRevenueStats extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6c207376;
    
    public string $predicate = 'payments.starsRevenueStats';
    
    /**
     * @param AbstractStatsGraph $revenueGraph
     * @param StarsRevenueStatus $status
     * @param float $usdRate
     * @param AbstractStatsGraph|null $topHoursGraph
     */
    public function __construct(
        public readonly AbstractStatsGraph $revenueGraph,
        public readonly StarsRevenueStatus $status,
        public readonly float $usdRate,
        public readonly ?AbstractStatsGraph $topHoursGraph = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topHoursGraph !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->topHoursGraph->serialize();
        }
        $buffer .= $this->revenueGraph->serialize();
        $buffer .= $this->status->serialize();
        $buffer .= pack('d', $this->usdRate);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $topHoursGraph = ($flags & (1 << 0)) ? AbstractStatsGraph::deserialize($stream) : null;
        $revenueGraph = AbstractStatsGraph::deserialize($stream);
        $status = StarsRevenueStatus::deserialize($stream);
        $usdRate = Deserializer::double($stream);

        return new self(
            $revenueGraph,
            $status,
            $usdRate,
            $topHoursGraph
        );
    }
}