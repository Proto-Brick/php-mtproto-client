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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->withdrawalEnabled) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->currentBalance);
        $buffer .= Serializer::int64($this->availableBalance);
        $buffer .= Serializer::int64($this->overallRevenue);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $withdrawalEnabled = ($flags & (1 << 0)) ? true : null;
        $currentBalance = Deserializer::int64($stream);
        $availableBalance = Deserializer::int64($stream);
        $overallRevenue = Deserializer::int64($stream);
        return new self(
            $currentBalance,
            $availableBalance,
            $overallRevenue,
            $withdrawalEnabled
        );
    }
}