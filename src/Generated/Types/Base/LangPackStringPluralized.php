<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/langPackStringPluralized
 */
final class LangPackStringPluralized extends AbstractLangPackString
{
    public const CONSTRUCTOR_ID = 0x6c47ac9f;
    
    public string $predicate = 'langPackStringPluralized';
    
    /**
     * @param string $key
     * @param string $otherValue
     * @param string|null $zeroValue
     * @param string|null $oneValue
     * @param string|null $twoValue
     * @param string|null $fewValue
     * @param string|null $manyValue
     */
    public function __construct(
        public readonly string $key,
        public readonly string $otherValue,
        public readonly ?string $zeroValue = null,
        public readonly ?string $oneValue = null,
        public readonly ?string $twoValue = null,
        public readonly ?string $fewValue = null,
        public readonly ?string $manyValue = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->zeroValue !== null) {
            $flags |= (1 << 0);
        }
        if ($this->oneValue !== null) {
            $flags |= (1 << 1);
        }
        if ($this->twoValue !== null) {
            $flags |= (1 << 2);
        }
        if ($this->fewValue !== null) {
            $flags |= (1 << 3);
        }
        if ($this->manyValue !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->key);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->zeroValue);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->oneValue);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->twoValue);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->fewValue);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->manyValue);
        }
        $buffer .= Serializer::bytes($this->otherValue);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $key = Deserializer::bytes($__payload, $__offset);
        $zeroValue = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $oneValue = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $twoValue = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $fewValue = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $manyValue = (($flags & (1 << 4)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $otherValue = Deserializer::bytes($__payload, $__offset);

        return new self(
            $key,
            $otherValue,
            $zeroValue,
            $oneValue,
            $twoValue,
            $fewValue,
            $manyValue
        );
    }
}