<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/jsonObject
 */
final class JsonObject extends AbstractJSONValue
{
    public const CONSTRUCTOR_ID = 0x99c1d49d;
    
    public string $predicate = 'jsonObject';
    
    /**
     * @param list<JSONObjectValue> $value
     */
    public function __construct(
        public readonly array $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->value);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $value = Deserializer::vectorOfObjects($__payload, $__offset, [JSONObjectValue::class, 'deserialize']);

        return new self(
            $value
        );
    }
}