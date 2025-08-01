<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractExportedInvoice;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.exportInvoice
 */
final class ExportInvoiceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 261206117;
    
    public string $_ = 'payments.exportInvoice';
    
    public function getMethodName(): string
    {
        return 'payments.exportInvoice';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedInvoice::class;
    }
    /**
     * @param AbstractInputMedia $invoiceMedia
     */
    public function __construct(
        public readonly AbstractInputMedia $invoiceMedia
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invoiceMedia->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}