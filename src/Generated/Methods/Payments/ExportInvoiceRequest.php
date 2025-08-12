<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Payments\ExportedInvoice;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.exportInvoice
 */
final class ExportInvoiceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf91b065;
    
    public string $predicate = 'payments.exportInvoice';
    
    public function getMethodName(): string
    {
        return 'payments.exportInvoice';
    }
    
    public function getResponseClass(): string
    {
        return ExportedInvoice::class;
    }
    /**
     * @param AbstractInputMedia $invoiceMedia
     */
    public function __construct(
        public readonly AbstractInputMedia $invoiceMedia
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invoiceMedia->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}