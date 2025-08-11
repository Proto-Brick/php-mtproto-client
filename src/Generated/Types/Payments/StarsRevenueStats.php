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
    public const CONSTRUCTOR_ID = 0xc92bb73b;
    
    public string $_ = 'payments.starsRevenueStats';
    
    /**
     * @param AbstractStatsGraph $revenueGraph
     * @param StarsRevenueStatus $status
     * @param float $usdRate
     */
    public function __construct(
        public readonly AbstractStatsGraph $revenueGraph,
        public readonly StarsRevenueStatus $status,
        public readonly float $usdRate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->revenueGraph->serialize();
        $buffer .= $this->status->serialize();
        $buffer .= pack('d', $this->usdRate);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $revenueGraph = AbstractStatsGraph::deserialize($stream);
        $status = StarsRevenueStatus::deserialize($stream);
        $usdRate = Deserializer::double($stream);
        return new self(
            $revenueGraph,
            $status,
            $usdRate
        );
    }
}