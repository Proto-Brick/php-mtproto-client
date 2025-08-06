<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\PaymentRequestedInfo;
use DigitalStars\MtprotoClient\Generated\Types\Payments\ValidatedRequestedInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.validateRequestedInfo
 */
final class ValidateRequestedInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb6c8f12b;
    
    public string $_ = 'payments.validateRequestedInfo';
    
    public function getMethodName(): string
    {
        return 'payments.validateRequestedInfo';
    }
    
    public function getResponseClass(): string
    {
        return ValidatedRequestedInfo::class;
    }
    /**
     * @param AbstractInputInvoice $invoice
     * @param PaymentRequestedInfo $info
     * @param bool|null $save
     */
    public function __construct(
        public readonly AbstractInputInvoice $invoice,
        public readonly PaymentRequestedInfo $info,
        public readonly ?bool $save = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->save) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->invoice->serialize($serializer);
        $buffer .= $this->info->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}