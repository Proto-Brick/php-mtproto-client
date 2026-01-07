<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/langPackString
 */
final class LangPackString extends AbstractLangPackString
{
    public const CONSTRUCTOR_ID = 0xcad181f6;
    
    public string $predicate = 'langPackString';
    
    /**
     * @param string $key
     * @param string $value
     */
    public function __construct(
        public readonly string $key,
        public readonly string $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->key);
        $buffer .= Serializer::bytes($this->value);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $key = Deserializer::bytes($__payload, $__offset);
        $value = Deserializer::bytes($__payload, $__offset);

        return new self(
            $key,
            $value
        );
    }
}