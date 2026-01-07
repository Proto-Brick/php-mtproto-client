<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGiftDropOriginalDetails
 */
final class InputInvoiceStarGiftDropOriginalDetails extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x923d8d1;
    
    public string $predicate = 'inputInvoiceStarGiftDropOriginalDetails';
    
    /**
     * @param AbstractInputSavedStarGift $stargift
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $stargift = AbstractInputSavedStarGift::deserialize($__payload, $__offset);

        return new self(
            $stargift
        );
    }
}