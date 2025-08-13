<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionStarGiftUnique
 */
final class MessageActionStarGiftUnique extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x34f762f3;
    
    public string $predicate = 'messageActionStarGiftUnique';
    
    /**
     * @param AbstractStarGift $gift
     * @param true|null $upgrade
     * @param true|null $transferred
     * @param true|null $saved
     * @param true|null $refunded
     * @param int|null $canExportAt
     * @param int|null $transferStars
     * @param AbstractPeer|null $fromId
     * @param AbstractPeer|null $peer
     * @param int|null $savedId
     * @param AbstractStarsAmount|null $resaleAmount
     * @param int|null $canTransferAt
     * @param int|null $canResellAt
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly ?true $upgrade = null,
        public readonly ?true $transferred = null,
        public readonly ?true $saved = null,
        public readonly ?true $refunded = null,
        public readonly ?int $canExportAt = null,
        public readonly ?int $transferStars = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?AbstractPeer $peer = null,
        public readonly ?int $savedId = null,
        public readonly ?AbstractStarsAmount $resaleAmount = null,
        public readonly ?int $canTransferAt = null,
        public readonly ?int $canResellAt = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->upgrade) $flags |= (1 << 0);
        if ($this->transferred) $flags |= (1 << 1);
        if ($this->saved) $flags |= (1 << 2);
        if ($this->refunded) $flags |= (1 << 5);
        if ($this->canExportAt !== null) $flags |= (1 << 3);
        if ($this->transferStars !== null) $flags |= (1 << 4);
        if ($this->fromId !== null) $flags |= (1 << 6);
        if ($this->peer !== null) $flags |= (1 << 7);
        if ($this->savedId !== null) $flags |= (1 << 7);
        if ($this->resaleAmount !== null) $flags |= (1 << 8);
        if ($this->canTransferAt !== null) $flags |= (1 << 9);
        if ($this->canResellAt !== null) $flags |= (1 << 10);
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

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $upgrade = ($flags & (1 << 0)) ? true : null;
        $transferred = ($flags & (1 << 1)) ? true : null;
        $saved = ($flags & (1 << 2)) ? true : null;
        $refunded = ($flags & (1 << 5)) ? true : null;
        $gift = AbstractStarGift::deserialize($stream);
        $canExportAt = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $transferStars = ($flags & (1 << 4)) ? Deserializer::int64($stream) : null;
        $fromId = ($flags & (1 << 6)) ? AbstractPeer::deserialize($stream) : null;
        $peer = ($flags & (1 << 7)) ? AbstractPeer::deserialize($stream) : null;
        $savedId = ($flags & (1 << 7)) ? Deserializer::int64($stream) : null;
        $resaleAmount = ($flags & (1 << 8)) ? AbstractStarsAmount::deserialize($stream) : null;
        $canTransferAt = ($flags & (1 << 9)) ? Deserializer::int32($stream) : null;
        $canResellAt = ($flags & (1 << 10)) ? Deserializer::int32($stream) : null;

        return new self(
            $gift,
            $upgrade,
            $transferred,
            $saved,
            $refunded,
            $canExportAt,
            $transferStars,
            $fromId,
            $peer,
            $savedId,
            $resaleAmount,
            $canTransferAt,
            $canResellAt
        );
    }
}