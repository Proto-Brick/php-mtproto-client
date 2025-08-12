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
    
    public string $predicate = 'inputInvoiceStars';
    
    /**
     * @param AbstractInputStorePaymentPurpose $purpose
     */
    public function __construct(
        public readonly AbstractInputStorePaymentPurpose $purpose
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $purpose = AbstractInputStorePaymentPurpose::deserialize($stream);

        return new self(
            $purpose
        );
    }
}