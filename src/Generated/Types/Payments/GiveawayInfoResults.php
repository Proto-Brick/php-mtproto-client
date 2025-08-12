<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.giveawayInfoResults
 */
final class GiveawayInfoResults extends AbstractGiveawayInfo
{
    public const CONSTRUCTOR_ID = 0xe175e66f;
    
    public string $predicate = 'payments.giveawayInfoResults';
    
    /**
     * @param int $startDate
     * @param int $finishDate
     * @param int $winnersCount
     * @param true|null $winner
     * @param true|null $refunded
     * @param string|null $giftCodeSlug
     * @param int|null $starsPrize
     * @param int|null $activatedCount
     */
    public function __construct(
        public readonly int $startDate,
        public readonly int $finishDate,
        public readonly int $winnersCount,
        public readonly ?true $winner = null,
        public readonly ?true $refunded = null,
        public readonly ?string $giftCodeSlug = null,
        public readonly ?int $starsPrize = null,
        public readonly ?int $activatedCount = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->winner) $flags |= (1 << 0);
        if ($this->refunded) $flags |= (1 << 1);
        if ($this->giftCodeSlug !== null) $flags |= (1 << 3);
        if ($this->starsPrize !== null) $flags |= (1 << 4);
        if ($this->activatedCount !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->startDate);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->giftCodeSlug);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->starsPrize);
        }
        $buffer .= Serializer::int32($this->finishDate);
        $buffer .= Serializer::int32($this->winnersCount);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->activatedCount);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $winner = ($flags & (1 << 0)) ? true : null;
        $refunded = ($flags & (1 << 1)) ? true : null;
        $startDate = Deserializer::int32($stream);
        $giftCodeSlug = ($flags & (1 << 3)) ? Deserializer::bytes($stream) : null;
        $starsPrize = ($flags & (1 << 4)) ? Deserializer::int64($stream) : null;
        $finishDate = Deserializer::int32($stream);
        $winnersCount = Deserializer::int32($stream);
        $activatedCount = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;

        return new self(
            $startDate,
            $finishDate,
            $winnersCount,
            $winner,
            $refunded,
            $giftCodeSlug,
            $starsPrize,
            $activatedCount
        );
    }
}