<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGiftAuctionBid
 */
final class InputInvoiceStarGiftAuctionBid extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x1ecafa10;
    
    public string $predicate = 'inputInvoiceStarGiftAuctionBid';
    
    /**
     * @param int $giftId
     * @param int $bidAmount
     * @param true|null $hideName
     * @param true|null $updateBid
     * @param AbstractInputPeer|null $peer
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly int $giftId,
        public readonly int $bidAmount,
        public readonly ?true $hideName = null,
        public readonly ?true $updateBid = null,
        public readonly ?AbstractInputPeer $peer = null,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hideName) {
            $flags |= (1 << 0);
        }
        if ($this->updateBid) {
            $flags |= (1 << 2);
        }
        if ($this->peer !== null) {
            $flags |= (1 << 3);
        }
        if ($this->message !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= $this->peer->serialize();
        }
        $buffer .= Serializer::int64($this->giftId);
        $buffer .= Serializer::int64($this->bidAmount);
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $hideName = (($flags & (1 << 0)) !== 0) ? true : null;
        $updateBid = (($flags & (1 << 2)) !== 0) ? true : null;
        $peer = (($flags & (1 << 3)) !== 0) ? AbstractInputPeer::deserialize($__payload, $__offset) : null;
        $giftId = Deserializer::int64($__payload, $__offset);
        $bidAmount = Deserializer::int64($__payload, $__offset);
        $message = (($flags & (1 << 1)) !== 0) ? TextWithEntities::deserialize($__payload, $__offset) : null;

        return new self(
            $giftId,
            $bidAmount,
            $hideName,
            $updateBid,
            $peer,
            $message
        );
    }
}