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
    public const CONSTRUCTOR_ID = 0x7998c914;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->formId);
        $buffer .= $this->invoice->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}