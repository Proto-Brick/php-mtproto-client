<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGift
 */
final class StarGift extends AbstractStarGift
{
    public const CONSTRUCTOR_ID = 0xbcff5b;
    
    public string $predicate = 'starGift';
    
    /**
     * @param int $id
     * @param AbstractDocument $sticker
     * @param int $stars
     * @param int $convertStars
     * @param true|null $limited
     * @param true|null $soldOut
     * @param true|null $birthday
     * @param true|null $requirePremium
     * @param true|null $limitedPerUser
     * @param int|null $availabilityRemains
     * @param int|null $availabilityTotal
     * @param int|null $availabilityResale
     * @param int|null $firstSaleDate
     * @param int|null $lastSaleDate
     * @param int|null $upgradeStars
     * @param int|null $resellMinStars
     * @param string|null $title
     * @param AbstractPeer|null $releasedBy
     * @param int|null $perUserTotal
     * @param int|null $perUserRemains
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractDocument $sticker,
        public readonly int $stars,
        public readonly int $convertStars,
        public readonly ?true $limited = null,
        public readonly ?true $soldOut = null,
        public readonly ?true $birthday = null,
        public readonly ?true $requirePremium = null,
        public readonly ?true $limitedPerUser = null,
        public readonly ?int $availabilityRemains = null,
        public readonly ?int $availabilityTotal = null,
        public readonly ?int $availabilityResale = null,
        public readonly ?int $firstSaleDate = null,
        public readonly ?int $lastSaleDate = null,
        public readonly ?int $upgradeStars = null,
        public readonly ?int $resellMinStars = null,
        public readonly ?string $title = null,
        public readonly ?AbstractPeer $releasedBy = null,
        public readonly ?int $perUserTotal = null,
        public readonly ?int $perUserRemains = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->limited) {
            $flags |= (1 << 0);
        }
        if ($this->soldOut) {
            $flags |= (1 << 1);
        }
        if ($this->birthday) {
            $flags |= (1 << 2);
        }
        if ($this->requirePremium) {
            $flags |= (1 << 7);
        }
        if ($this->limitedPerUser) {
            $flags |= (1 << 8);
        }
        if ($this->availabilityRemains !== null) {
            $flags |= (1 << 0);
        }
        if ($this->availabilityTotal !== null) {
            $flags |= (1 << 0);
        }
        if ($this->availabilityResale !== null) {
            $flags |= (1 << 4);
        }
        if ($this->firstSaleDate !== null) {
            $flags |= (1 << 1);
        }
        if ($this->lastSaleDate !== null) {
            $flags |= (1 << 1);
        }
        if ($this->upgradeStars !== null) {
            $flags |= (1 << 3);
        }
        if ($this->resellMinStars !== null) {
            $flags |= (1 << 4);
        }
        if ($this->title !== null) {
            $flags |= (1 << 5);
        }
        if ($this->releasedBy !== null) {
            $flags |= (1 << 6);
        }
        if ($this->perUserTotal !== null) {
            $flags |= (1 << 8);
        }
        if ($this->perUserRemains !== null) {
            $flags |= (1 << 8);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= $this->sticker->serialize();
        $buffer .= Serializer::int64($this->stars);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->availabilityRemains);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->availabilityTotal);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->availabilityResale);
        }
        $buffer .= Serializer::int64($this->convertStars);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->firstSaleDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->lastSaleDate);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int64($this->upgradeStars);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->resellMinStars);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->releasedBy->serialize();
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int32($this->perUserTotal);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int32($this->perUserRemains);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $limited = (($flags & (1 << 0)) !== 0) ? true : null;
        $soldOut = (($flags & (1 << 1)) !== 0) ? true : null;
        $birthday = (($flags & (1 << 2)) !== 0) ? true : null;
        $requirePremium = (($flags & (1 << 7)) !== 0) ? true : null;
        $limitedPerUser = (($flags & (1 << 8)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $sticker = AbstractDocument::deserialize($__payload, $__offset);
        $stars = Deserializer::int64($__payload, $__offset);
        $availabilityRemains = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $availabilityTotal = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $availabilityResale = (($flags & (1 << 4)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $convertStars = Deserializer::int64($__payload, $__offset);
        $firstSaleDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $lastSaleDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $upgradeStars = (($flags & (1 << 3)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $resellMinStars = (($flags & (1 << 4)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $title = (($flags & (1 << 5)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $releasedBy = (($flags & (1 << 6)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $perUserTotal = (($flags & (1 << 8)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $perUserRemains = (($flags & (1 << 8)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $id,
            $sticker,
            $stars,
            $convertStars,
            $limited,
            $soldOut,
            $birthday,
            $requirePremium,
            $limitedPerUser,
            $availabilityRemains,
            $availabilityTotal,
            $availabilityResale,
            $firstSaleDate,
            $lastSaleDate,
            $upgradeStars,
            $resellMinStars,
            $title,
            $releasedBy,
            $perUserTotal,
            $perUserRemains
        );
    }
}