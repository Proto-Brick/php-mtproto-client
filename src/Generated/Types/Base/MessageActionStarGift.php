<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionStarGift
 */
final class MessageActionStarGift extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xea2c31d3;
    
    public string $predicate = 'messageActionStarGift';
    
    /**
     * @param AbstractStarGift $gift
     * @param true|null $nameHidden
     * @param true|null $saved
     * @param true|null $converted
     * @param true|null $upgraded
     * @param true|null $refunded
     * @param true|null $canUpgrade
     * @param true|null $prepaidUpgrade
     * @param true|null $upgradeSeparate
     * @param true|null $auctionAcquired
     * @param TextWithEntities|null $message
     * @param int|null $convertStars
     * @param int|null $upgradeMsgId
     * @param int|null $upgradeStars
     * @param AbstractPeer|null $fromId
     * @param AbstractPeer|null $peer
     * @param int|null $savedId
     * @param string|null $prepaidUpgradeHash
     * @param int|null $giftMsgId
     * @param AbstractPeer|null $toId
     * @param int|null $giftNum
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly ?true $nameHidden = null,
        public readonly ?true $saved = null,
        public readonly ?true $converted = null,
        public readonly ?true $upgraded = null,
        public readonly ?true $refunded = null,
        public readonly ?true $canUpgrade = null,
        public readonly ?true $prepaidUpgrade = null,
        public readonly ?true $upgradeSeparate = null,
        public readonly ?true $auctionAcquired = null,
        public readonly ?TextWithEntities $message = null,
        public readonly ?int $convertStars = null,
        public readonly ?int $upgradeMsgId = null,
        public readonly ?int $upgradeStars = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?AbstractPeer $peer = null,
        public readonly ?int $savedId = null,
        public readonly ?string $prepaidUpgradeHash = null,
        public readonly ?int $giftMsgId = null,
        public readonly ?AbstractPeer $toId = null,
        public readonly ?int $giftNum = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameHidden) {
            $flags |= (1 << 0);
        }
        if ($this->saved) {
            $flags |= (1 << 2);
        }
        if ($this->converted) {
            $flags |= (1 << 3);
        }
        if ($this->upgraded) {
            $flags |= (1 << 5);
        }
        if ($this->refunded) {
            $flags |= (1 << 9);
        }
        if ($this->canUpgrade) {
            $flags |= (1 << 10);
        }
        if ($this->prepaidUpgrade) {
            $flags |= (1 << 13);
        }
        if ($this->upgradeSeparate) {
            $flags |= (1 << 16);
        }
        if ($this->auctionAcquired) {
            $flags |= (1 << 17);
        }
        if ($this->message !== null) {
            $flags |= (1 << 1);
        }
        if ($this->convertStars !== null) {
            $flags |= (1 << 4);
        }
        if ($this->upgradeMsgId !== null) {
            $flags |= (1 << 5);
        }
        if ($this->upgradeStars !== null) {
            $flags |= (1 << 8);
        }
        if ($this->fromId !== null) {
            $flags |= (1 << 11);
        }
        if ($this->peer !== null) {
            $flags |= (1 << 12);
        }
        if ($this->savedId !== null) {
            $flags |= (1 << 12);
        }
        if ($this->prepaidUpgradeHash !== null) {
            $flags |= (1 << 14);
        }
        if ($this->giftMsgId !== null) {
            $flags |= (1 << 15);
        }
        if ($this->toId !== null) {
            $flags |= (1 << 18);
        }
        if ($this->giftNum !== null) {
            $flags |= (1 << 19);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->gift->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize();
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->convertStars);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->upgradeMsgId);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int64($this->upgradeStars);
        }
        if ($flags & (1 << 11)) {
            $buffer .= $this->fromId->serialize();
        }
        if ($flags & (1 << 12)) {
            $buffer .= $this->peer->serialize();
        }
        if ($flags & (1 << 12)) {
            $buffer .= Serializer::int64($this->savedId);
        }
        if ($flags & (1 << 14)) {
            $buffer .= Serializer::bytes($this->prepaidUpgradeHash);
        }
        if ($flags & (1 << 15)) {
            $buffer .= Serializer::int32($this->giftMsgId);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->toId->serialize();
        }
        if ($flags & (1 << 19)) {
            $buffer .= Serializer::int32($this->giftNum);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $nameHidden = (($flags & (1 << 0)) !== 0) ? true : null;
        $saved = (($flags & (1 << 2)) !== 0) ? true : null;
        $converted = (($flags & (1 << 3)) !== 0) ? true : null;
        $upgraded = (($flags & (1 << 5)) !== 0) ? true : null;
        $refunded = (($flags & (1 << 9)) !== 0) ? true : null;
        $canUpgrade = (($flags & (1 << 10)) !== 0) ? true : null;
        $prepaidUpgrade = (($flags & (1 << 13)) !== 0) ? true : null;
        $upgradeSeparate = (($flags & (1 << 16)) !== 0) ? true : null;
        $auctionAcquired = (($flags & (1 << 17)) !== 0) ? true : null;
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $message = (($flags & (1 << 1)) !== 0) ? TextWithEntities::deserialize($__payload, $__offset) : null;
        $convertStars = (($flags & (1 << 4)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $upgradeMsgId = (($flags & (1 << 5)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $upgradeStars = (($flags & (1 << 8)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $fromId = (($flags & (1 << 11)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $peer = (($flags & (1 << 12)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $savedId = (($flags & (1 << 12)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $prepaidUpgradeHash = (($flags & (1 << 14)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $giftMsgId = (($flags & (1 << 15)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $toId = (($flags & (1 << 18)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $giftNum = (($flags & (1 << 19)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $gift,
            $nameHidden,
            $saved,
            $converted,
            $upgraded,
            $refunded,
            $canUpgrade,
            $prepaidUpgrade,
            $upgradeSeparate,
            $auctionAcquired,
            $message,
            $convertStars,
            $upgradeMsgId,
            $upgradeStars,
            $fromId,
            $peer,
            $savedId,
            $prepaidUpgradeHash,
            $giftMsgId,
            $toId,
            $giftNum
        );
    }
}