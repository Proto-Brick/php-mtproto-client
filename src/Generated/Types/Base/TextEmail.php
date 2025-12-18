<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/textEmail
 */
final class TextEmail extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0xde5a0dd6;
    
    public string $predicate = 'textEmail';
    
    /**
     * @param AbstractRichText $text
     * @param string $email
     */
    public function __construct(
        public readonly AbstractRichText $text,
        public readonly string $email
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->text->serialize();
        $buffer .= Serializer::bytes($this->email);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $text = AbstractRichText::deserialize($__payload, $__offset);
        $email = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text,
            $email
        );
    }
}