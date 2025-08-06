<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/broadcastRevenueBalances
 */
final class BroadcastRevenueBalances extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc3ff71e7;
    
    public string $_ = 'broadcastRevenueBalances';
    
    /**
     * @param int $currentBalance
     * @param int $availableBalance
     * @param int $overallRevenue
     * @param bool|null $withdrawalEnabled
     */
    public function __construct(
        public readonly int $currentBalance,
        public readonly int $availableBalance,
        public readonly int $overallRevenue,
        public readonly ?bool $withdrawalEnabled = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->withdrawalEnabled) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->currentBalance);
        $buffer .= $serializer->int64($this->availableBalance);
        $buffer .= $serializer->int64($this->overallRevenue);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $withdrawalEnabled = ($flags & (1 << 0)) ? true : null;
        $currentBalance = $deserializer->int64($stream);
        $availableBalance = $deserializer->int64($stream);
        $overallRevenue = $deserializer->int64($stream);
        return new self(
            $currentBalance,
            $availableBalance,
            $overallRevenue,
            $withdrawalEnabled
        );
    }
}