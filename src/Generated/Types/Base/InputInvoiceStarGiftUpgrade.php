<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGiftUpgrade
 */
final class InputInvoiceStarGiftUpgrade extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x4d818d5d;
    
    public string $predicate = 'inputInvoiceStarGiftUpgrade';
    
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param true|null $keepOriginalDetails
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly ?true $keepOriginalDetails = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->keepOriginalDetails) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->stargift->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $keepOriginalDetails = (($flags & (1 << 0)) !== 0) ? true : null;
        $stargift = AbstractInputSavedStarGift::deserialize($__payload, $__offset);

        return new self(
            $stargift,
            $keepOriginalDetails
        );
    }
}