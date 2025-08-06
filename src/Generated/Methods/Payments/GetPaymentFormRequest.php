<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractPaymentForm;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getPaymentForm
 */
final class GetPaymentFormRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x37148dbb;
    
    public string $_ = 'payments.getPaymentForm';
    
    public function getMethodName(): string
    {
        return 'payments.getPaymentForm';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPaymentForm::class;
    }
    /**
     * @param AbstractInputInvoice $invoice
     * @param array|null $themeParams
     */
    public function __construct(
        public readonly AbstractInputInvoice $invoice,
        public readonly ?array $themeParams = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->themeParams !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->invoice->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes(json_encode($this->themeParams, JSON_FORCE_OBJECT));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}