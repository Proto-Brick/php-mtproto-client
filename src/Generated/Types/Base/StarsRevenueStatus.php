<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsRevenueStatus
 */
final class StarsRevenueStatus extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfebe5491;
    
    public string $_ = 'starsRevenueStatus';
    
    /**
     * @param StarsAmount $currentBalance
     * @param StarsAmount $availableBalance
     * @param StarsAmount $overallRevenue
     * @param bool|null $withdrawalEnabled
     * @param int|null $nextWithdrawalAt
     */
    public function __construct(
        public readonly StarsAmount $currentBalance,
        public readonly StarsAmount $availableBalance,
        public readonly StarsAmount $overallRevenue,
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $withdrawalEnabled = ($flags & (1 << 0)) ? true : null;
        $currentBalance = StarsAmount::deserialize($deserializer, $stream);
        $availableBalance = StarsAmount::deserialize($deserializer, $stream);
        $overallRevenue = StarsAmount::deserialize($deserializer, $stream);
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