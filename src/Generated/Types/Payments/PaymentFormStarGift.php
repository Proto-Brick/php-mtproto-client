<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\Invoice;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.paymentFormStarGift
 */
final class PaymentFormStarGift extends AbstractPaymentForm
{
    public const CONSTRUCTOR_ID = 0xb425cfe1;
    
    public string $_ = 'payments.paymentFormStarGift';
    
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $formId = Deserializer::int64($stream);
        $invoice = Invoice::deserialize($stream);
        return new self(
            $formId,
            $invoice
        );
    }
}