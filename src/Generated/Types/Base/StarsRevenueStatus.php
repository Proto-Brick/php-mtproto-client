<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsRevenueStatus
 */
final class StarsRevenueStatus extends AbstractStarsRevenueStatus
{
    public const CONSTRUCTOR_ID = 4273886353;
    
    public string $_ = 'starsRevenueStatus';
    
    /**
     * @param AbstractStarsAmount $currentBalance
     * @param AbstractStarsAmount $availableBalance
     * @param AbstractStarsAmount $overallRevenue
     * @param bool|null $withdrawalEnabled
     * @param int|null $nextWithdrawalAt
     */
    public function __construct(
        public readonly AbstractStarsAmount $currentBalance,
        public readonly AbstractStarsAmount $availableBalance,
        public readonly AbstractStarsAmount $overallRevenue,
        public readonly ?bool $withdrawalEnabled = null,
        public readonly ?int $nextWithdrawalAt = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->withdrawalEnabled) $flags |= (1 << 0);
        if ($this->nextWithdrawalAt !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->currentBalance->serialize($serializer);
        $buffer .= $this->availableBalance->serialize($serializer);
        $buffer .= $this->overallRevenue->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->nextWithdrawalAt);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $withdrawalEnabled = ($flags & (1 << 0)) ? true : null;
        $currentBalance = AbstractStarsAmount::deserialize($deserializer, $stream);
        $availableBalance = AbstractStarsAmount::deserialize($deserializer, $stream);
        $overallRevenue = AbstractStarsAmount::deserialize($deserializer, $stream);
        $nextWithdrawalAt = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $currentBalance,
            $availableBalance,
            $overallRevenue,
            $withdrawalEnabled,
            $nextWithdrawalAt
        );
    }
}