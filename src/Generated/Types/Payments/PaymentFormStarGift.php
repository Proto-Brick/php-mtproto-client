<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\Invoice;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.paymentFormStarGift
 */
final class PaymentFormStarGift extends AbstractPaymentForm
{
    public const CONSTRUCTOR_ID = 0xb425cfe1;
    
    public string $predicate = 'payments.paymentFormStarGift';
    
    /**
     * @param int $formId
     * @param Invoice $invoice
     */
    public function __construct(
        public readonly int $formId,
        public readonly Invoice $invoice
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->formId);
        $buffer .= $this->invoice->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $formId = Deserializer::int64($stream);
        $invoice = Invoice::deserialize($stream);

        return new self(
            $formId,
            $invoice
        );
    }
}