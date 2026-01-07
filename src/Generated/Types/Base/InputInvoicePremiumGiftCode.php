<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoicePremiumGiftCode
 */
final class InputInvoicePremiumGiftCode extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x98986c0d;
    
    public string $predicate = 'inputInvoicePremiumGiftCode';
    
    /**
     * @param AbstractInputStorePaymentPurpose $purpose
     * @param PremiumGiftCodeOption $option
     */
    public function __construct(
        public readonly AbstractInputStorePaymentPurpose $purpose,
        public readonly PremiumGiftCodeOption $option
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize();
        $buffer .= $this->option->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $purpose = AbstractInputStorePaymentPurpose::deserialize($__payload, $__offset);
        $option = PremiumGiftCodeOption::deserialize($__payload, $__offset);

        return new self(
            $purpose,
            $option
        );
    }
}