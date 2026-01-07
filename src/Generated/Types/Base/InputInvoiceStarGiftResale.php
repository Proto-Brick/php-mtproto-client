<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGiftResale
 */
final class InputInvoiceStarGiftResale extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0xc39f5324;
    
    public string $predicate = 'inputInvoiceStarGiftResale';
    
    /**
     * @param string $slug
     * @param AbstractInputPeer $toId
     * @param true|null $ton
     */
    public function __construct(
        public readonly string $slug,
        public readonly AbstractInputPeer $toId,
        public readonly ?true $ton = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ton) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= $this->toId->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $ton = (($flags & (1 << 0)) !== 0) ? true : null;
        $slug = Deserializer::bytes($__payload, $__offset);
        $toId = AbstractInputPeer::deserialize($__payload, $__offset);

        return new self(
            $slug,
            $toId,
            $ton
        );
    }
}