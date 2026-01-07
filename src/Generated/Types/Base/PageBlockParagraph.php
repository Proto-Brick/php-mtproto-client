<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockParagraph
 */
final class PageBlockParagraph extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0x467a0766;
    
    public string $predicate = 'pageBlockParagraph';
    
    /**
     * @param AbstractRichText $text
     */
    public function __construct(
        public readonly AbstractRichText $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $text = AbstractRichText::deserialize($__payload, $__offset);

        return new self(
            $text
        );
    }
}