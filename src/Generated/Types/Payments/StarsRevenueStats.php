<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarsRevenueStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.starsRevenueStats
 */
final class StarsRevenueStats extends AbstractStarsRevenueStats
{
    public const CONSTRUCTOR_ID = 3375085371;
    
    public string $_ = 'payments.starsRevenueStats';
    
    /**
     * @param AbstractStatsGraph $revenueGraph
     * @param AbstractStarsRevenueStatus $status
     * @param float $usdRate
     */
    public function __construct(
        public readonly AbstractStatsGraph $revenueGraph,
        public readonly AbstractStarsRevenueStatus $status,
        public readonly float $usdRate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->revenueGraph->serialize($serializer);
        $buffer .= $this->status->serialize($serializer);
        $buffer .= pack('d', $this->usdRate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $revenueGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $status = AbstractStarsRevenueStatus::deserialize($deserializer, $stream);
        $usdRate = $deserializer->double($stream);
            return new self(
            $revenueGraph,
            $status,
            $usdRate
        );
    }
}