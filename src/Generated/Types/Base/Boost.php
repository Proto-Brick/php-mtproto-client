<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/boost
 */
final class Boost extends AbstractBoost
{
    public const CONSTRUCTOR_ID = 1262359766;
    
    public string $_ = 'boost';
    
    /**
     * @param string $id
     * @param int $date
     * @param int $expires
     * @param bool|null $gift
     * @param bool|null $giveaway
     * @param bool|null $unclaimed
     * @param int|null $userId
     * @param int|null $giveawayMsgId
     * @param string|null $usedGiftSlug
     * @param int|null $multiplier
     * @param int|null $stars
     */
    public function __construct(
        public readonly string $id,
        public readonly int $date,
        public readonly int $expires,
        public readonly ?bool $gift = null,
        public readonly ?bool $giveaway = null,
        public readonly ?bool $unclaimed = null,
        public readonly ?int $userId = null,
        public readonly ?int $giveawayMsgId = null,
        public readonly ?string $usedGiftSlug = null,
        public readonly ?int $multiplier = null,
        public readonly ?int $stars = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gift) $flags |= (1 << 1);
        if ($this->giveaway) $flags |= (1 << 2);
        if ($this->unclaimed) $flags |= (1 << 3);
        if ($this->userId !== null) $flags |= (1 << 0);
        if ($this->giveawayMsgId !== null) $flags |= (1 << 2);
        if ($this->usedGiftSlug !== null) $flags |= (1 << 4);
        if ($this->multiplier !== null) $flags |= (1 << 5);
        if ($this->stars !== null) $flags |= (1 << 6);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->userId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->giveawayMsgId);
        }
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->expires);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->usedGiftSlug);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->int32($this->multiplier);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->int64($this->stars);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $gift = ($flags & (1 << 1)) ? true : null;
        $giveaway = ($flags & (1 << 2)) ? true : null;
        $unclaimed = ($flags & (1 << 3)) ? true : null;
        $id = $deserializer->bytes($stream);
        $userId = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $giveawayMsgId = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $date = $deserializer->int32($stream);
        $expires = $deserializer->int32($stream);
        $usedGiftSlug = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
        $multiplier = ($flags & (1 << 5)) ? $deserializer->int32($stream) : null;
        $stars = ($flags & (1 << 6)) ? $deserializer->int64($stream) : null;
            return new self(
            $id,
            $date,
            $expires,
            $gift,
            $giveaway,
            $unclaimed,
            $userId,
            $giveawayMsgId,
            $usedGiftSlug,
            $multiplier,
            $stars
        );
    }
}