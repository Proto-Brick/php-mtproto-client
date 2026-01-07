<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionStarGiftUnique
 */
final class MessageActionStarGiftUnique extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x95728543;
    
    public string $predicate = 'messageActionStarGiftUnique';
    
    /**
     * @param AbstractStarGift $gift
     * @param true|null $upgrade
     * @param true|null $transferred
     * @param true|null $saved
     * @param true|null $refunded
     * @param true|null $prepaidUpgrade
     * @param true|null $assigned
     * @param true|null $fromOffer
     * @param int|null $canExportAt
     * @param int|null $transferStars
     * @param AbstractPeer|null $fromId
     * @param AbstractPeer|null $peer
     * @param int|null $savedId
     * @param AbstractStarsAmount|null $resaleAmount
     * @param int|null $canTransferAt
     * @param int|null $canResellAt
     * @param int|null $dropOriginalDetailsStars
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly ?true $upgrade = null,
        public readonly ?true $transferred = null,
        public readonly ?true $saved = null,
        public readonly ?true $refunded = null,
        public readonly ?true $prepaidUpgrade = null,
        public readonly ?true $assigned = null,
        public readonly ?true $fromOffer = null,
        public readonly ?int $canExportAt = null,
        public readonly ?int $transferStars = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?AbstractPeer $peer = null,
        public readonly ?int $savedId = null,
        public readonly ?AbstractStarsAmount $resaleAmount = null,
        public readonly ?int $canTransferAt = null,
        public readonly ?int $canResellAt = null,
        public readonly ?int $dropOriginalDetailsStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->upgrade) {
            $flags |= (1 << 0);
        }
        if ($this->transferred) {
            $flags |= (1 << 1);
        }
        if ($this->saved) {
            $flags |= (1 << 2);
        }
        if ($this->refunded) {
            $flags |= (1 << 5);
        }
        if ($this->prepaidUpgrade) {
            $flags |= (1 << 11);
        }
        if ($this->assigned) {
            $flags |= (1 << 13);
        }
        if ($this->fromOffer) {
            $flags |= (1 << 14);
        }
        if ($this->canExportAt !== null) {
            $flags |= (1 << 3);
        }
        if ($this->transferStars !== null) {
            $flags |= (1 << 4);
        }
        if ($this->fromId !== null) {
            $flags |= (1 << 6);
        }
        if ($this->peer !== null) {
            $flags |= (1 << 7);
        }
        if ($this->savedId !== null) {
            $flags |= (1 << 7);
        }
        if ($this->resaleAmount !== null) {
            $flags |= (1 << 8);
        }
        if ($this->canTransferAt !== null) {
            $flags |= (1 << 9);
        }
        if ($this->canResellAt !== null) {
            $flags |= (1 << 10);
        }
        if ($this->dropOriginalDetailsStars !== null) {
            $flags |= (1 << 12);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->gift->serialize();
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->canExportAt);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->transferStars);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->fromId->serialize();
        }
        if ($flags & (1 << 7)) {
            $buffer .= $this->peer->serialize();
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int64($this->savedId);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->resaleAmount->serialize();
        }
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::int32($this->canTransferAt);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->canResellAt);
        }
        if ($flags & (1 << 12)) {
            $buffer .= Serializer::int64($this->dropOriginalDetailsStars);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $upgrade = (($flags & (1 << 0)) !== 0) ? true : null;
        $transferred = (($flags & (1 << 1)) !== 0) ? true : null;
        $saved = (($flags & (1 << 2)) !== 0) ? true : null;
        $refunded = (($flags & (1 << 5)) !== 0) ? true : null;
        $prepaidUpgrade = (($flags & (1 << 11)) !== 0) ? true : null;
        $assigned = (($flags & (1 << 13)) !== 0) ? true : null;
        $fromOffer = (($flags & (1 << 14)) !== 0) ? true : null;
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $canExportAt = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $transferStars = (($flags & (1 << 4)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $fromId = (($flags & (1 << 6)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $peer = (($flags & (1 << 7)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $savedId = (($flags & (1 << 7)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $resaleAmount = (($flags & (1 << 8)) !== 0) ? AbstractStarsAmount::deserialize($__payload, $__offset) : null;
        $canTransferAt = (($flags & (1 << 9)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $canResellAt = (($flags & (1 << 10)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $dropOriginalDetailsStars = (($flags & (1 << 12)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

        return new self(
            $gift,
            $upgrade,
            $transferred,
            $saved,
            $refunded,
            $prepaidUpgrade,
            $assigned,
            $fromOffer,
            $canExportAt,
            $transferStars,
            $fromId,
            $peer,
            $savedId,
            $resaleAmount,
            $canTransferAt,
            $canResellAt,
            $dropOriginalDetailsStars
        );
    }
}