<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageListOrderedItemText
 */
final class PageListOrderedItemText extends AbstractPageListOrderedItem
{
    public const CONSTRUCTOR_ID = 0x5e068047;
    
    public string $predicate = 'pageListOrderedItemText';
    
    /**
     * @param string $num
     * @param AbstractRichText $text
     */
    public function __construct(
        public readonly string $num,
        public readonly AbstractRichText $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->num);
        $buffer .= $this->text->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $num = Deserializer::bytes($__payload, $__offset);
        $text = AbstractRichText::deserialize($__payload, $__offset);

        return new self(
            $num,
            $text
        );
    }
}