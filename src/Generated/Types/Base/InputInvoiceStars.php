<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $purpose = AbstractInputStorePaymentPurpose::deserialize($__payload, $__offset);

        return new self(
            $purpose
        );
    }
}