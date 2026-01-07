<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentStarsTopup
 */
final class InputStorePaymentStarsTopup extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0xf9a2a6cb;
    
    public string $predicate = 'inputStorePaymentStarsTopup';
    
    /**
     * @param int $stars
     * @param string $currency
     * @param int $amount
     * @param AbstractInputPeer|null $spendPurposePeer
     */
    public function __construct(
        public readonly int $stars,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?AbstractInputPeer $spendPurposePeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spendPurposePeer !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->stars);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        if ($flags & (1 << 0)) {
            $buffer .= $this->spendPurposePeer->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $stars = Deserializer::int64($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);
        $spendPurposePeer = (($flags & (1 << 0)) !== 0) ? AbstractInputPeer::deserialize($__payload, $__offset) : null;

        return new self(
            $stars,
            $currency,
            $amount,
            $spendPurposePeer
        );
    }
}