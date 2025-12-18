<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/pageBlockPreformatted
 */
final class PageBlockPreformatted extends AbstractPageBlock
{
    public const CONSTRUCTOR_ID = 0xc070d93e;
    
    public string $predicate = 'pageBlockPreformatted';
    
    /**
     * @param AbstractRichText $text
     * @param string $language
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $language
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->language);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $text = AbstractRichText::deserialize($__payload, $__offset);
        $language = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text,
            $language
        );
    }
}