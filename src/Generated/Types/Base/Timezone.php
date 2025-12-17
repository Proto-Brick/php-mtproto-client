<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/timezone
 */
final class Timezone extends TlObject
{
    public const CONSTRUCTOR_ID = 0xff9289f5;
    
    public string $predicate = 'timezone';
    
    /**
     * @param string $id
     * @param string $name
     * @param int $utcOffset
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly int $utcOffset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= Serializer::int32($this->utcOffset);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::bytes($__payload, $__offset);
        $name = Deserializer::bytes($__payload, $__offset);
        $utcOffset = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $name,
            $utcOffset
        );
    }
}