<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGiftTransfer
 */
final class InputInvoiceStarGiftTransfer extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x4a5f5bd9;
    
    public string $predicate = 'inputInvoiceStarGiftTransfer';
    
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param AbstractInputPeer $toId
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly AbstractInputPeer $toId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();
        $buffer .= $this->toId->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $stargift = AbstractInputSavedStarGift::deserialize($__payload, $__offset);
        $toId = AbstractInputPeer::deserialize($__payload, $__offset);

        return new self(
            $stargift,
            $toId
        );
    }
}