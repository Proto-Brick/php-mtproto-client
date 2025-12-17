<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/secureValueErrorData
 */
final class SecureValueErrorData extends AbstractSecureValueError
{
    public const CONSTRUCTOR_ID = 0xe8a40bd9;
    
    public string $predicate = 'secureValueErrorData';
    
    /**
     * @param SecureValueType $type
     * @param string $dataHash
     * @param string $field
     * @param string $text
     */
    public function __construct(
        public readonly SecureValueType $type,
        public readonly string $dataHash,
        public readonly string $field,
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::bytes($this->dataHash);
        $buffer .= Serializer::bytes($this->field);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $type = SecureValueType::deserialize($__payload, $__offset);
        $dataHash = Deserializer::bytes($__payload, $__offset);
        $field = Deserializer::bytes($__payload, $__offset);
        $text = Deserializer::bytes($__payload, $__offset);

        return new self(
            $type,
            $dataHash,
            $field,
            $text
        );
    }
}