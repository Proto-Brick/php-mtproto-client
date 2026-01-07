<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftUnique
 */
final class StarGiftUnique extends AbstractStarGift
{
    public const CONSTRUCTOR_ID = 0x569d64c9;
    
    public string $predicate = 'starGiftUnique';
    
    /**
     * @param int $id
     * @param int $giftId
     * @param string $title
     * @param string $slug
     * @param int $num
     * @param list<AbstractStarGiftAttribute> $attributes
     * @param int $availabilityIssued
     * @param int $availabilityTotal
     * @param true|null $requirePremium
     * @param true|null $resaleTonOnly
     * @param true|null $themeAvailable
     * @param AbstractPeer|null $ownerId
     * @param string|null $ownerName
     * @param string|null $ownerAddress
     * @param string|null $giftAddress
     * @param list<AbstractStarsAmount>|null $resellAmount
     * @param AbstractPeer|null $releasedBy
     * @param int|null $valueAmount
     * @param string|null $valueCurrency
     * @param int|null $valueUsdAmount
     * @param AbstractPeer|null $themePeer
     * @param AbstractPeerColor|null $peerColor
     * @param AbstractPeer|null $hostId
     * @param int|null $offerMinStars
     */
    public function __construct(
        public readonly int $id,
        public readonly int $giftId,
        public readonly string $title,
        public readonly string $slug,
        public readonly int $num,
        public readonly array $attributes,
        public readonly int $availabilityIssued,
        public readonly int $availabilityTotal,
        public readonly ?true $requirePremium = null,
        public readonly ?true $resaleTonOnly = null,
        public readonly ?true $themeAvailable = null,
        public readonly ?AbstractPeer $ownerId = null,
        public readonly ?string $ownerName = null,
        public readonly ?string $ownerAddress = null,
        public readonly ?string $giftAddress = null,
        public readonly ?array $resellAmount = null,
        public readonly ?AbstractPeer $releasedBy = null,
        public readonly ?int $valueAmount = null,
        public readonly ?string $valueCurrency = null,
        public readonly ?int $valueUsdAmount = null,
        public readonly ?AbstractPeer $themePeer = null,
        public readonly ?AbstractPeerColor $peerColor = null,
        public readonly ?AbstractPeer $hostId = null,
        public readonly ?int $offerMinStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requirePremium) {
            $flags |= (1 << 6);
        }
        if ($this->resaleTonOnly) {
            $flags |= (1 << 7);
        }
        if ($this->themeAvailable) {
            $flags |= (1 << 9);
        }
        if ($this->ownerId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->ownerName !== null) {
            $flags |= (1 << 1);
        }
        if ($this->ownerAddress !== null) {
            $flags |= (1 << 2);
        }
        if ($this->giftAddress !== null) {
            $flags |= (1 << 3);
        }
        if ($this->resellAmount !== null) {
            $flags |= (1 << 4);
        }
        if ($this->releasedBy !== null) {
            $flags |= (1 << 5);
        }
        if ($this->valueAmount !== null) {
            $flags |= (1 << 8);
        }
        if ($this->valueCurrency !== null) {
            $flags |= (1 << 8);
        }
        if ($this->valueUsdAmount !== null) {
            $flags |= (1 << 8);
        }
        if ($this->themePeer !== null) {
            $flags |= (1 << 10);
        }
        if ($this->peerColor !== null) {
            $flags |= (1 << 11);
        }
        if ($this->hostId !== null) {
            $flags |= (1 << 12);
        }
        if ($this->offerMinStars !== null) {
            $flags |= (1 << 13);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->giftId);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= Serializer::int32($this->num);
        if ($flags & (1 << 0)) {
            $buffer .= $this->ownerId->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->ownerName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->ownerAddress);
        }
        $buffer .= Serializer::vectorOfObjects($this->attributes);
        $buffer .= Serializer::int32($this->availabilityIssued);
        $buffer .= Serializer::int32($this->availabilityTotal);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->giftAddress);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->resellAmount);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->releasedBy->serialize();
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int64($this->valueAmount);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::bytes($this->valueCurrency);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int64($this->valueUsdAmount);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $this->themePeer->serialize();
        }
        if ($flags & (1 << 11)) {
            $buffer .= $this->peerColor->serialize();
        }
        if ($flags & (1 << 12)) {
            $buffer .= $this->hostId->serialize();
        }
        if ($flags & (1 << 13)) {
            $buffer .= Serializer::int32($this->offerMinStars);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $requirePremium = (($flags & (1 << 6)) !== 0) ? true : null;
        $resaleTonOnly = (($flags & (1 << 7)) !== 0) ? true : null;
        $themeAvailable = (($flags & (1 << 9)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $giftId = Deserializer::int64($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $slug = Deserializer::bytes($__payload, $__offset);
        $num = Deserializer::int32($__payload, $__offset);
        $ownerId = (($flags & (1 << 0)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $ownerName = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $ownerAddress = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $attributes = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStarGiftAttribute::class, 'deserialize']);
        $availabilityIssued = Deserializer::int32($__payload, $__offset);
        $availabilityTotal = Deserializer::int32($__payload, $__offset);
        $giftAddress = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $resellAmount = (($flags & (1 << 4)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStarsAmount::class, 'deserialize']) : null;
        $releasedBy = (($flags & (1 << 5)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $valueAmount = (($flags & (1 << 8)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $valueCurrency = (($flags & (1 << 8)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $valueUsdAmount = (($flags & (1 << 8)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $themePeer = (($flags & (1 << 10)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $peerColor = (($flags & (1 << 11)) !== 0) ? AbstractPeerColor::deserialize($__payload, $__offset) : null;
        $hostId = (($flags & (1 << 12)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $offerMinStars = (($flags & (1 << 13)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $id,
            $giftId,
            $title,
            $slug,
            $num,
            $attributes,
            $availabilityIssued,
            $availabilityTotal,
            $requirePremium,
            $resaleTonOnly,
            $themeAvailable,
            $ownerId,
            $ownerName,
            $ownerAddress,
            $giftAddress,
            $resellAmount,
            $releasedBy,
            $valueAmount,
            $valueCurrency,
            $valueUsdAmount,
            $themePeer,
            $peerColor,
            $hostId,
            $offerMinStars
        );
    }
}