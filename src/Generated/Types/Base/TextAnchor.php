<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/textAnchor
 */
final class TextAnchor extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x35553762;
    
    public string $predicate = 'textAnchor';
    
    /**
     * @param AbstractRichText $text
     * @param string $name
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $name
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->name);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $text = AbstractRichText::deserialize($__payload, $__offset);
        $name = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text,
            $name
        );
    }
}