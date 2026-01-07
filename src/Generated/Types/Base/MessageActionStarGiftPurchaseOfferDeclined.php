<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionStarGiftPurchaseOfferDeclined
 */
final class MessageActionStarGiftPurchaseOfferDeclined extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x73ada76b;
    
    public string $predicate = 'messageActionStarGiftPurchaseOfferDeclined';
    
    /**
     * @param AbstractStarGift $gift
     * @param AbstractStarsAmount $price
     * @param true|null $expired
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly AbstractStarsAmount $price,
        public readonly ?true $expired = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->expired) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->gift->serialize();
        $buffer .= $this->price->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $expired = (($flags & (1 << 0)) !== 0) ? true : null;
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $price = AbstractStarsAmount::deserialize($__payload, $__offset);

        return new self(
            $gift,
            $price,
            $expired
        );
    }
}