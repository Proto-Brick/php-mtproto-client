<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockBlockquote
 */
final class PageBlockBlockquote extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x263d7c26;
    
    public string $predicate = 'pageBlockBlockquote';
    
    /**
     * @param AbstractRichText $text
     * @param AbstractRichText $caption
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly AbstractRichText $caption
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= $this->caption->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $text = AbstractRichText::deserialize($__payload, $__offset);
        $caption = AbstractRichText::deserialize($__payload, $__offset);

        return new self(
            $text,
            $caption
        );
    }
}