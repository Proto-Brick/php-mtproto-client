<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/savedStarGift
 */
final class SavedStarGift extends TlObject
{
    public const CONSTRUCTOR_ID = 0xead6805e;
    
    public string $predicate = 'savedStarGift';
    
    /**
     * @param int $date
     * @param AbstractStarGift $gift
     * @param true|null $nameHidden
     * @param true|null $unsaved
     * @param true|null $refunded
     * @param true|null $canUpgrade
     * @param true|null $pinnedToTop
     * @param true|null $upgradeSeparate
     * @param AbstractPeer|null $fromId
     * @param TextWithEntities|null $message
     * @param int|null $msgId
     * @param int|null $savedId
     * @param int|null $convertStars
     * @param int|null $upgradeStars
     * @param int|null $canExportAt
     * @param int|null $transferStars
     * @param int|null $canTransferAt
     * @param int|null $canResellAt
     * @param list<int>|null $collectionId
     * @param string|null $prepaidUpgradeHash
     * @param int|null $dropOriginalDetailsStars
     * @param int|null $giftNum
     */
    public function __construct(
        public readonly int $date,
        public readonly AbstractStarGift $gift,
        public readonly ?true $nameHidden = null,
        public readonly ?true $unsaved = null,
        public readonly ?true $refunded = null,
        public readonly ?true $canUpgrade = null,
        public readonly ?true $pinnedToTop = null,
        public readonly ?true $upgradeSeparate = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?TextWithEntities $message = null,
        public readonly ?int $msgId = null,
        public readonly ?int $savedId = null,
        public readonly ?int $convertStars = null,
        public readonly ?int $upgradeStars = null,
        public readonly ?int $canExportAt = null,
        public readonly ?int $transferStars = null,
        public readonly ?int $canTransferAt = null,
        public readonly ?int $canResellAt = null,
        public readonly ?array $collectionId = null,
        public readonly ?string $prepaidUpgradeHash = null,
        public readonly ?int $dropOriginalDetailsStars = null,
        public readonly ?int $giftNum = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameHidden) {
            $flags |= (1 << 0);
        }
        if ($this->unsaved) {
            $flags |= (1 << 5);
        }
        if ($this->refunded) {
            $flags |= (1 << 9);
        }
        if ($this->canUpgrade) {
            $flags |= (1 << 10);
        }
        if ($this->pinnedToTop) {
            $flags |= (1 << 12);
        }
        if ($this->upgradeSeparate) {
            $flags |= (1 << 17);
        }
        if ($this->fromId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->message !== null) {
            $flags |= (1 << 2);
        }
        if ($this->msgId !== null) {
            $flags |= (1 << 3);
        }
        if ($this->savedId !== null) {
            $flags |= (1 << 11);
        }
        if ($this->convertStars !== null) {
            $flags |= (1 << 4);
        }
        if ($this->upgradeStars !== null) {
            $flags |= (1 << 6);
        }
        if ($this->canExportAt !== null) {
            $flags |= (1 << 7);
        }
        if ($this->transferStars !== null) {
            $flags |= (1 << 8);
        }
        if ($this->canTransferAt !== null) {
            $flags |= (1 << 13);
        }
        if ($this->canResellAt !== null) {
            $flags |= (1 << 14);
        }
        if ($this->collectionId !== null) {
            $flags |= (1 << 15);
        }
        if ($this->prepaidUpgradeHash !== null) {
            $flags |= (1 << 16);
        }
        if ($this->dropOriginalDetailsStars !== null) {
            $flags |= (1 << 18);
        }
        if ($this->giftNum !== null) {
            $flags |= (1 << 19);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->fromId->serialize();
        }
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->gift->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->message->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->msgId);
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::int64($this->savedId);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->convertStars);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int64($this->upgradeStars);
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int32($this->canExportAt);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int64($this->transferStars);
        }
        if ($flags & (1 << 13)) {
            $buffer .= Serializer::int32($this->canTransferAt);
        }
        if ($flags & (1 << 14)) {
            $buffer .= Serializer::int32($this->canResellAt);
        }
        if ($flags & (1 << 15)) {
            $buffer .= Serializer::vectorOfInts($this->collectionId);
        }
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::bytes($this->prepaidUpgradeHash);
        }
        if ($flags & (1 << 18)) {
            $buffer .= Serializer::int64($this->dropOriginalDetailsStars);
        }
        if ($flags & (1 << 19)) {
            $buffer .= Serializer::int32($this->giftNum);
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
        $nameHidden = (($flags & (1 << 0)) !== 0) ? true : null;
        $unsaved = (($flags & (1 << 5)) !== 0) ? true : null;
        $refunded = (($flags & (1 << 9)) !== 0) ? true : null;
        $canUpgrade = (($flags & (1 << 10)) !== 0) ? true : null;
        $pinnedToTop = (($flags & (1 << 12)) !== 0) ? true : null;
        $upgradeSeparate = (($flags & (1 << 17)) !== 0) ? true : null;
        $fromId = (($flags & (1 << 1)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $date = Deserializer::int32($__payload, $__offset);
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $message = (($flags & (1 << 2)) !== 0) ? TextWithEntities::deserialize($__payload, $__offset) : null;
        $msgId = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $savedId = (($flags & (1 << 11)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $convertStars = (($flags & (1 << 4)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $upgradeStars = (($flags & (1 << 6)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $canExportAt = (($flags & (1 << 7)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $transferStars = (($flags & (1 << 8)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $canTransferAt = (($flags & (1 << 13)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $canResellAt = (($flags & (1 << 14)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $collectionId = (($flags & (1 << 15)) !== 0) ? Deserializer::vectorOfInts($__payload, $__offset) : null;
        $prepaidUpgradeHash = (($flags & (1 << 16)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $dropOriginalDetailsStars = (($flags & (1 << 18)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $giftNum = (($flags & (1 << 19)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $date,
            $gift,
            $nameHidden,
            $unsaved,
            $refunded,
            $canUpgrade,
            $pinnedToTop,
            $upgradeSeparate,
            $fromId,
            $message,
            $msgId,
            $savedId,
            $convertStars,
            $upgradeStars,
            $canExportAt,
            $transferStars,
            $canTransferAt,
            $canResellAt,
            $collectionId,
            $prepaidUpgradeHash,
            $dropOriginalDetailsStars,
            $giftNum
        );
    }
}