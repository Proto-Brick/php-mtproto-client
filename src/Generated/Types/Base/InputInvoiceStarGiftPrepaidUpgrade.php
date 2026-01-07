<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGiftPrepaidUpgrade
 */
final class InputInvoiceStarGiftPrepaidUpgrade extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x9a0b48b8;
    
    public string $predicate = 'inputInvoiceStarGiftPrepaidUpgrade';
    
    /**
     * @param AbstractInputPeer $peer
     * @param string $hash
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->hash);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractInputPeer::deserialize($__payload, $__offset);
        $hash = Deserializer::bytes($__payload, $__offset);

        return new self(
            $peer,
            $hash
        );
    }
}