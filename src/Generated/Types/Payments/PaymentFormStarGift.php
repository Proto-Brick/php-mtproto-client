<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInvoice;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.paymentFormStarGift
 */
final class PaymentFormStarGift extends AbstractPaymentForm
{
    public const CONSTRUCTOR_ID = 3022376929;
    
    public string $_ = 'payments.paymentFormStarGift';
    
    /**
     * @param int $formId
     * @param AbstractInvoice $invoice
     */
    public function __construct(
        public readonly int $formId,
        public readonly AbstractInvoice $invoice
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->formId);
        $buffer .= $this->invoice->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $formId = $deserializer->int64($stream);
        $invoice = AbstractInvoice::deserialize($deserializer, $stream);
            return new self(
            $formId,
            $invoice
        );
    }
}