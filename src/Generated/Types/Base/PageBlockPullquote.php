<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockPullquote
 */
final class PageBlockPullquote extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x4f4456d3;
    
    public string $predicate = 'pageBlockPullquote';
    
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
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $text = AbstractRichText::deserialize($__payload, $__offset);
        $caption = AbstractRichText::deserialize($__payload, $__offset);

        return new self(
            $text,
            $caption
        );
    }
}