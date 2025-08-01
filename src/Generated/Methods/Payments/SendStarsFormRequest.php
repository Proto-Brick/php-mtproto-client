<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractPaymentResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.sendStarsForm
 */
final class SendStarsFormRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2040056084;
    
    public string $_ = 'payments.sendStarsForm';
    
    public function getMethodName(): string
    {
        return 'payments.sendStarsForm';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPaymentResult::class;
    }
    /**
     * @param int $formId
     * @param AbstractInputInvoice $invoice
     */
    public function __construct(
        public readonly int $formId,
        public readonly AbstractInputInvoice $invoice
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
        throw new \LogicException('Request objects are not deserializable');
    }
}