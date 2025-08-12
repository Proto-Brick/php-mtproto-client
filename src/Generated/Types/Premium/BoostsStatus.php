<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Premium;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPrepaidGiveaway;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsPercentValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/premium.boostsStatus
 */
final class BoostsStatus extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4959427a;
    
    public string $predicate = 'premium.boostsStatus';
    
    /**
     * @param int $level
     * @param int $currentLevelBoosts
     * @param int $boosts
     * @param string $boostUrl
     * @param true|null $myBoost
     * @param int|null $giftBoosts
     * @param int|null $nextLevelBoosts
     * @param StatsPercentValue|null $premiumAudience
     * @param list<AbstractPrepaidGiveaway>|null $prepaidGiveaways
     * @param list<int>|null $myBoostSlots
     */
    public function __construct(
        public readonly int $level,
        public readonly int $currentLevelBoosts,
        public readonly int $boosts,
        public readonly string $boostUrl,
        public readonly ?true $myBoost = null,
        public readonly ?int $giftBoosts = null,
        public readonly ?int $nextLevelBoosts = null,
        public readonly ?StatsPercentValue $premiumAudience = null,
        public readonly ?array $prepaidGiveaways = null,
        public readonly ?array $myBoostSlots = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->myBoost) $flags |= (1 << 2);
        if ($this->giftBoosts !== null) $flags |= (1 << 4);
        if ($this->nextLevelBoosts !== null) $flags |= (1 << 0);
        if ($this->premiumAudience !== null) $flags |= (1 << 1);
        if ($this->prepaidGiveaways !== null) $flags |= (1 << 3);
        if ($this->myBoostSlots !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->level);
        $buffer .= Serializer::int32($this->currentLevelBoosts);
        $buffer .= Serializer::int32($this->boosts);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->giftBoosts);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->nextLevelBoosts);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->premiumAudience->serialize();
        }
        $buffer .= Serializer::bytes($this->boostUrl);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->prepaidGiveaways);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfInts($this->myBoostSlots);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $myBoost = ($flags & (1 << 2)) ? true : null;
        $level = Deserializer::int32($stream);
        $currentLevelBoosts = Deserializer::int32($stream);
        $boosts = Deserializer::int32($stream);
        $giftBoosts = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $nextLevelBoosts = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $premiumAudience = ($flags & (1 << 1)) ? StatsPercentValue::deserialize($stream) : null;
        $boostUrl = Deserializer::bytes($stream);
        $prepaidGiveaways = ($flags & (1 << 3)) ? Deserializer::vectorOfObjects($stream, [AbstractPrepaidGiveaway::class, 'deserialize']) : null;
        $myBoostSlots = ($flags & (1 << 2)) ? Deserializer::vectorOfInts($stream) : null;

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