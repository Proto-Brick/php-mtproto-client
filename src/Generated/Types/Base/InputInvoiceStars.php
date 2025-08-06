<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoiceStars
 */
final class InputInvoiceStars extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x65f00ce3;
    
    public string $_ = 'inputInvoiceStars';
    
    /**
     * @param AbstractInputStorePaymentPurpose $purpose
     */
    public function __construct(
        public readonly AbstractInputStorePaymentPurpose $purpose
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $purpose = AbstractInputStorePaymentPurpose::deserialize($deserializer, $stream);
        return new self(
            $purpose
        );
    }
}