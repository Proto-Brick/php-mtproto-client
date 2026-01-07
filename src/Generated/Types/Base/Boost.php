<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/boost
 */
final class Boost extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4b3e14d6;
    
    public string $predicate = 'boost';
    
    /**
     * @param string $id
     * @param int $date
     * @param int $expires
     * @param true|null $gift
     * @param true|null $giveaway
     * @param true|null $unclaimed
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
        public readonly ?true $gift = null,
        public readonly ?true $giveaway = null,
        public readonly ?true $unclaimed = null,
        public readonly ?int $userId = null,
        public readonly ?int $giveawayMsgId = null,
        public readonly ?string $usedGiftSlug = null,
        public readonly ?int $multiplier = null,
        public readonly ?int $stars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gift) {
            $flags |= (1 << 1);
        }
        if ($this->giveaway) {
            $flags |= (1 << 2);
        }
        if ($this->unclaimed) {
            $flags |= (1 << 3);
        }
        if ($this->userId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->giveawayMsgId !== null) {
            $flags |= (1 << 2);
        }
        if ($this->usedGiftSlug !== null) {
            $flags |= (1 << 4);
        }
        if ($this->multiplier !== null) {
            $flags |= (1 << 5);
        }
        if ($this->stars !== null) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->userId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->giveawayMsgId);
        }
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->expires);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->usedGiftSlug);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->multiplier);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int64($this->stars);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $gift = (($flags & (1 << 1)) !== 0) ? true : null;
        $giveaway = (($flags & (1 << 2)) !== 0) ? true : null;
        $unclaimed = (($flags & (1 << 3)) !== 0) ? true : null;
        $id = Deserializer::bytes($__payload, $__offset);
        $userId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $giveawayMsgId = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $date = Deserializer::int32($__payload, $__offset);
        $expires = Deserializer::int32($__payload, $__offset);
        $usedGiftSlug = (($flags & (1 << 4)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $multiplier = (($flags & (1 << 5)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $stars = (($flags & (1 << 6)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

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