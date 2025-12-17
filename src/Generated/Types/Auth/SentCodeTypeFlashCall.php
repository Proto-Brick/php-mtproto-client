<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeFlashCall
 */
final class SentCodeTypeFlashCall extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xab03c6d9;
    
    public string $predicate = 'auth.sentCodeTypeFlashCall';
    
    /**
     * @param string $pattern
     */
    public function __construct(
        public readonly string $pattern
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->pattern);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $pattern = Deserializer::bytes($__payload, $__offset);

        return new self(
            $pattern
        );
    }
}