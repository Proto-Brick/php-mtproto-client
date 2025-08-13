<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/savedStarGift
 */
final class SavedStarGift extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1ea646df;
    
    public string $predicate = 'savedStarGift';
    
    /**
     * @param int $date
     * @param AbstractStarGift $gift
     * @param true|null $nameHidden
     * @param true|null $unsaved
     * @param true|null $refunded
     * @param true|null $canUpgrade
     * @param true|null $pinnedToTop
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
     */
    public function __construct(
        public readonly int $date,
        public readonly AbstractStarGift $gift,
        public readonly ?true $nameHidden = null,
        public readonly ?true $unsaved = null,
        public readonly ?true $refunded = null,
        public readonly ?true $canUpgrade = null,
        public readonly ?true $pinnedToTop = null,
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
        public readonly ?array $collectionId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameHidden) $flags |= (1 << 0);
        if ($this->unsaved) $flags |= (1 << 5);
        if ($this->refunded) $flags |= (1 << 9);
        if ($this->canUpgrade) $flags |= (1 << 10);
        if ($this->pinnedToTop) $flags |= (1 << 12);
        if ($this->fromId !== null) $flags |= (1 << 1);
        if ($this->message !== null) $flags |= (1 << 2);
        if ($this->msgId !== null) $flags |= (1 << 3);
        if ($this->savedId !== null) $flags |= (1 << 11);
        if ($this->convertStars !== null) $flags |= (1 << 4);
        if ($this->upgradeStars !== null) $flags |= (1 << 6);
        if ($this->canExportAt !== null) $flags |= (1 << 7);
        if ($this->transferStars !== null) $flags |= (1 << 8);
        if ($this->canTransferAt !== null) $flags |= (1 << 13);
        if ($this->canResellAt !== null) $flags |= (1 << 14);
        if ($this->collectionId !== null) $flags |= (1 << 15);
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

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $nameHidden = ($flags & (1 << 0)) ? true : null;
        $unsaved = ($flags & (1 << 5)) ? true : null;
        $refunded = ($flags & (1 << 9)) ? true : null;
        $canUpgrade = ($flags & (1 << 10)) ? true : null;
        $pinnedToTop = ($flags & (1 << 12)) ? true : null;
        $fromId = ($flags & (1 << 1)) ? AbstractPeer::deserialize($stream) : null;
        $date = Deserializer::int32($stream);
        $gift = AbstractStarGift::deserialize($stream);
        $message = ($flags & (1 << 2)) ? TextWithEntities::deserialize($stream) : null;
        $msgId = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $savedId = ($flags & (1 << 11)) ? Deserializer::int64($stream) : null;
        $convertStars = ($flags & (1 << 4)) ? Deserializer::int64($stream) : null;
        $upgradeStars = ($flags & (1 << 6)) ? Deserializer::int64($stream) : null;
        $canExportAt = ($flags & (1 << 7)) ? Deserializer::int32($stream) : null;
        $transferStars = ($flags & (1 << 8)) ? Deserializer::int64($stream) : null;
        $canTransferAt = ($flags & (1 << 13)) ? Deserializer::int32($stream) : null;
        $canResellAt = ($flags & (1 << 14)) ? Deserializer::int32($stream) : null;
        $collectionId = ($flags & (1 << 15)) ? Deserializer::vectorOfInts($stream) : null;

        return new self(
            $date,
            $gift,
            $nameHidden,
            $unsaved,
            $refunded,
            $canUpgrade,
            $pinnedToTop,
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
            $collectionId
        );
    }
}