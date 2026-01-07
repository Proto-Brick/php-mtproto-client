<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/jsonNumber
 */
final class JsonNumber extends AbstractJSONValue
{
    public const CONSTRUCTOR_ID = 0x2be0dfa4;
    
    public string $predicate = 'jsonNumber';
    
    /**
     * @param float $value
     */
    public function __construct(
        public readonly float $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->value);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $value = Deserializer::double($__payload, $__offset);

        return new self(
            $value
        );
    }
}