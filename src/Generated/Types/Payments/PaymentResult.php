<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.paymentResult
 */
final class PaymentResult extends AbstractPaymentResult
{
    public const CONSTRUCTOR_ID = 0x4e5f810d;
    
    public string $predicate = 'payments.paymentResult';
    
    /**
     * @param AbstractUpdates $updates
     */
    public function __construct(
        public readonly AbstractUpdates $updates
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->updates->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $updates = AbstractUpdates::deserialize($__payload, $__offset);

        return new self(
            $updates
        );
    }
}