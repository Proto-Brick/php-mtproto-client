<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionStarGift
 */
final class MessageActionStarGift extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x4717e8a4;
    
    public string $predicate = 'messageActionStarGift';
    
    /**
     * @param AbstractStarGift $gift
     * @param true|null $nameHidden
     * @param true|null $saved
     * @param true|null $converted
     * @param true|null $upgraded
     * @param true|null $refunded
     * @param true|null $canUpgrade
     * @param TextWithEntities|null $message
     * @param int|null $convertStars
     * @param int|null $upgradeMsgId
     * @param int|null $upgradeStars
     * @param AbstractPeer|null $fromId
     * @param AbstractPeer|null $peer
     * @param int|null $savedId
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly ?true $nameHidden = null,
        public readonly ?true $saved = null,
        public readonly ?true $converted = null,
        public readonly ?true $upgraded = null,
        public readonly ?true $refunded = null,
        public readonly ?true $canUpgrade = null,
        public readonly ?TextWithEntities $message = null,
        public readonly ?int $convertStars = null,
        public readonly ?int $upgradeMsgId = null,
        public readonly ?int $upgradeStars = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?AbstractPeer $peer = null,
        public readonly ?int $savedId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameHidden) $flags |= (1 << 0);
        if ($this->saved) $flags |= (1 << 2);
        if ($this->converted) $flags |= (1 << 3);
        if ($this->upgraded) $flags |= (1 << 5);
        if ($this->refunded) $flags |= (1 << 9);
        if ($this->canUpgrade) $flags |= (1 << 10);
        if ($this->message !== null) $flags |= (1 << 1);
        if ($this->convertStars !== null) $flags |= (1 << 4);
        if ($this->upgradeMsgId !== null) $flags |= (1 << 5);
        if ($this->upgradeStars !== null) $flags |= (1 << 8);
        if ($this->fromId !== null) $flags |= (1 << 11);
        if ($this->peer !== null) $flags |= (1 << 12);
        if ($this->savedId !== null) $flags |= (1 << 12);
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

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $nameHidden = ($flags & (1 << 0)) ? true : null;
        $saved = ($flags & (1 << 2)) ? true : null;
        $converted = ($flags & (1 << 3)) ? true : null;
        $upgraded = ($flags & (1 << 5)) ? true : null;
        $refunded = ($flags & (1 << 9)) ? true : null;
        $canUpgrade = ($flags & (1 << 10)) ? true : null;
        $gift = AbstractStarGift::deserialize($stream);
        $message = ($flags & (1 << 1)) ? TextWithEntities::deserialize($stream) : null;
        $convertStars = ($flags & (1 << 4)) ? Deserializer::int64($stream) : null;
        $upgradeMsgId = ($flags & (1 << 5)) ? Deserializer::int32($stream) : null;
        $upgradeStars = ($flags & (1 << 8)) ? Deserializer::int64($stream) : null;
        $fromId = ($flags & (1 << 11)) ? AbstractPeer::deserialize($stream) : null;
        $peer = ($flags & (1 << 12)) ? AbstractPeer::deserialize($stream) : null;
        $savedId = ($flags & (1 << 12)) ? Deserializer::int64($stream) : null;

        return new self(
            $gift,
            $nameHidden,
            $saved,
            $converted,
            $upgraded,
            $refunded,
            $canUpgrade,
            $message,
            $convertStars,
            $upgradeMsgId,
            $upgradeStars,
            $fromId,
            $peer,
            $savedId
        );
    }
}