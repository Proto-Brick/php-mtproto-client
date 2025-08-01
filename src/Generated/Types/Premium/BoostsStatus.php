<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Premium;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPrepaidGiveaway;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsPercentValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premium.boostsStatus
 */
final class BoostsStatus extends AbstractBoostsStatus
{
    public const CONSTRUCTOR_ID = 1230586490;
    
    public string $_ = 'premium.boostsStatus';
    
    /**
     * @param int $level
     * @param int $currentLevelBoosts
     * @param int $boosts
     * @param string $boostUrl
     * @param bool|null $myBoost
     * @param int|null $giftBoosts
     * @param int|null $nextLevelBoosts
     * @param AbstractStatsPercentValue|null $premiumAudience
     * @param list<AbstractPrepaidGiveaway>|null $prepaidGiveaways
     * @param list<int>|null $myBoostSlots
     */
    public function __construct(
        public readonly int $level,
        public readonly int $currentLevelBoosts,
        public readonly int $boosts,
        public readonly string $boostUrl,
        public readonly ?bool $myBoost = null,
        public readonly ?int $giftBoosts = null,
        public readonly ?int $nextLevelBoosts = null,
        public readonly ?AbstractStatsPercentValue $premiumAudience = null,
        public readonly ?array $prepaidGiveaways = null,
        public readonly ?array $myBoostSlots = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->myBoost) $flags |= (1 << 2);
        if ($this->giftBoosts !== null) $flags |= (1 << 4);
        if ($this->nextLevelBoosts !== null) $flags |= (1 << 0);
        if ($this->premiumAudience !== null) $flags |= (1 << 1);
        if ($this->prepaidGiveaways !== null) $flags |= (1 << 3);
        if ($this->myBoostSlots !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->level);
        $buffer .= $serializer->int32($this->currentLevelBoosts);
        $buffer .= $serializer->int32($this->boosts);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->giftBoosts);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->nextLevelBoosts);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->premiumAudience->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->boostUrl);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->prepaidGiveaways);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->vectorOfInts($this->myBoostSlots);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $myBoost = ($flags & (1 << 2)) ? true : null;
        $level = $deserializer->int32($stream);
        $currentLevelBoosts = $deserializer->int32($stream);
        $boosts = $deserializer->int32($stream);
        $giftBoosts = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $nextLevelBoosts = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $premiumAudience = ($flags & (1 << 1)) ? AbstractStatsPercentValue::deserialize($deserializer, $stream) : null;
        $boostUrl = $deserializer->bytes($stream);
        $prepaidGiveaways = ($flags & (1 << 3)) ? $deserializer->vectorOfObjects($stream, [AbstractPrepaidGiveaway::class, 'deserialize']) : null;
        $myBoostSlots = ($flags & (1 << 2)) ? $deserializer->vectorOfInts($stream) : null;
            return new self(
            $level,
            $currentLevelBoosts,
            $boosts,
            $boostUrl,
            $myBoost,
            $giftBoosts,
            $nextLevelBoosts,
            $premiumAudience,
            $prepaidGiveaways,
            $myBoostSlots
        );
    }
}