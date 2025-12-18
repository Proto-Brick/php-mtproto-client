<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/secureValueError
 */
final class SecureValueError extends AbstractSecureValueError
{
    public const CONSTRUCTOR_ID = 0x869d758f;
    
    public string $predicate = 'secureValueError';
    
    /**
     * @param SecureValueType $type
     * @param string $hash
     * @param string $text
     */
    public function __construct(
        public readonly SecureValueType $type,
        public readonly string $hash,
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::bytes($this->hash);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $type = SecureValueType::deserialize($__payload, $__offset);
        $hash = Deserializer::bytes($__payload, $__offset);
        $text = Deserializer::bytes($__payload, $__offset);

        return new self(
            $type,
            $hash,
            $text
        );
    }
}