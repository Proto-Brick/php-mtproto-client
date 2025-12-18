<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentGiftPremium
 */
final class InputStorePaymentGiftPremium extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0x616f7fe8;
    
    public string $predicate = 'inputStorePaymentGiftPremium';
    
    /**
     * @param AbstractInputUser $userId
     * @param string $currency
     * @param int $amount
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $currency,
        public readonly int $amount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $userId = AbstractInputUser::deserialize($__payload, $__offset);
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);

        return new self(
            $userId,
            $currency,
            $amount
        );
    }
}