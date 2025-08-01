<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoicePremiumGiftCode
 */
final class InputInvoicePremiumGiftCode extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 2560125965;
    
    public string $_ = 'inputInvoicePremiumGiftCode';
    
    /**
     * @param AbstractInputStorePaymentPurpose $purpose
     * @param AbstractPremiumGiftCodeOption $option
     */
    public function __construct(
        public readonly AbstractInputStorePaymentPurpose $purpose,
        public readonly AbstractPremiumGiftCodeOption $option
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize($serializer);
        $buffer .= $this->option->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $purpose = AbstractInputStorePaymentPurpose::deserialize($deserializer, $stream);
        $option = AbstractPremiumGiftCodeOption::deserialize($deserializer, $stream);
            return new self(
            $purpose,
            $option
        );
    }
}