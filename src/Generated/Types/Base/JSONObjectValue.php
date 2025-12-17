<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/jsonObjectValue
 */
final class JSONObjectValue extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc0de1bd9;
    
    public string $predicate = 'jsonObjectValue';
    
    /**
     * @param string $key
     * @param AbstractJSONValue $value
     */
    public function __construct(
        public readonly string $key,
        public readonly AbstractJSONValue $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->key);
        $buffer .= Serializer::serializeJsonValue($this->value);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $key = Deserializer::bytes($__payload, $__offset);
        $value = Deserializer::deserializeJsonValue($__payload, $__offset);

        return new self(
            $key,
            $value
        );
    }
}