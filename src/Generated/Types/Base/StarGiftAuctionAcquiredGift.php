<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starGiftAuctionAcquiredGift
 */
final class StarGiftAuctionAcquiredGift extends TlObject
{
    public const CONSTRUCTOR_ID = 0x42b00348;
    
    public string $predicate = 'starGiftAuctionAcquiredGift';
    
    /**
     * @param AbstractPeer $peer
     * @param int $date
     * @param int $bidAmount
     * @param int $round
     * @param int $pos
     * @param true|null $nameHidden
     * @param TextWithEntities|null $message
     * @param int|null $giftNum
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $date,
        public readonly int $bidAmount,
        public readonly int $round,
        public readonly int $pos,
        public readonly ?true $nameHidden = null,
        public readonly ?TextWithEntities $message = null,
        public readonly ?int $giftNum = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameHidden) {
            $flags |= (1 << 0);
        }
        if ($this->message !== null) {
            $flags |= (1 << 1);
        }
        if ($this->giftNum !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->bidAmount);
        $buffer .= Serializer::int32($this->round);
        $buffer .= Serializer::int32($this->pos);
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize();
        }
        if ($flags & (1 << 2)) {
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
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $bidAmount = Deserializer::int64($__payload, $__offset);
        $round = Deserializer::int32($__payload, $__offset);
        $pos = Deserializer::int32($__payload, $__offset);
        $message = (($flags & (1 << 1)) !== 0) ? TextWithEntities::deserialize($__payload, $__offset) : null;
        $giftNum = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $peer,
            $date,
            $bidAmount,
            $round,
            $pos,
            $nameHidden,
            $message,
            $giftNum
        );
    }
}