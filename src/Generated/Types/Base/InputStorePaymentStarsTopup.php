<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentStarsTopup
 */
final class InputStorePaymentStarsTopup extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0xdddd0f56;
    
    public string $predicate = 'inputStorePaymentStarsTopup';
    
    /**
     * @param int $stars
     * @param string $currency
     * @param int $amount
     */
    public function __construct(
        public readonly int $stars,
        public readonly string $currency,
        public readonly int $amount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->stars);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $stars = Deserializer::int64($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);

        return new self(
            $stars,
            $currency,
            $amount
        );
    }
}