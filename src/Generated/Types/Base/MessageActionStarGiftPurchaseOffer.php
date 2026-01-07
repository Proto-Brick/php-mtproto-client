<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionStarGiftPurchaseOffer
 */
final class MessageActionStarGiftPurchaseOffer extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x774278d4;
    
    public string $predicate = 'messageActionStarGiftPurchaseOffer';
    
    /**
     * @param AbstractStarGift $gift
     * @param AbstractStarsAmount $price
     * @param int $expiresAt
     * @param true|null $accepted
     * @param true|null $declined
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly AbstractStarsAmount $price,
        public readonly int $expiresAt,
        public readonly ?true $accepted = null,
        public readonly ?true $declined = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->accepted) {
            $flags |= (1 << 0);
        }
        if ($this->declined) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->gift->serialize();
        $buffer .= $this->price->serialize();
        $buffer .= Serializer::int32($this->expiresAt);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $accepted = (($flags & (1 << 0)) !== 0) ? true : null;
        $declined = (($flags & (1 << 1)) !== 0) ? true : null;
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $price = AbstractStarsAmount::deserialize($__payload, $__offset);
        $expiresAt = Deserializer::int32($__payload, $__offset);

        return new self(
            $gift,
            $price,
            $expiresAt,
            $accepted,
            $declined
        );
    }
}