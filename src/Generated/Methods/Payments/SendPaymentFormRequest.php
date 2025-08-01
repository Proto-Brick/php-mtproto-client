<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPaymentCredentials;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractPaymentResult;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.sendPaymentForm
 */
final class SendPaymentFormRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 755192367;
    
    public string $_ = 'payments.sendPaymentForm';
    
    public function getMethodName(): string
    {
        return 'payments.sendPaymentForm';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPaymentResult::class;
    }
    /**
     * @param int $formId
     * @param AbstractInputInvoice $invoice
     * @param AbstractInputPaymentCredentials $credentials
     * @param string|null $requestedInfoId
     * @param string|null $shippingOptionId
     * @param int|null $tipAmount
     */
    public function __construct(
        public readonly int $formId,
        public readonly AbstractInputInvoice $invoice,
        public readonly AbstractInputPaymentCredentials $credentials,
        public readonly ?string $requestedInfoId = null,
        public readonly ?string $shippingOptionId = null,
        public readonly ?int $tipAmount = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requestedInfoId !== null) $flags |= (1 << 0);
        if ($this->shippingOptionId !== null) $flags |= (1 << 1);
        if ($this->tipAmount !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->formId);
        $buffer .= $this->invoice->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->requestedInfoId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->shippingOptionId);
        }
        $buffer .= $this->credentials->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int64($this->tipAmount);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}