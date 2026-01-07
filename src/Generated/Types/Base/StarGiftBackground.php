<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starGiftBackground
 */
final class StarGiftBackground extends TlObject
{
    public const CONSTRUCTOR_ID = 0xaff56398;
    
    public string $predicate = 'starGiftBackground';
    
    /**
     * @param int $centerColor
     * @param int $edgeColor
     * @param int $textColor
     */
    public function __construct(
        public readonly int $centerColor,
        public readonly int $edgeColor,
        public readonly int $textColor
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->centerColor);
        $buffer .= Serializer::int32($this->edgeColor);
        $buffer .= Serializer::int32($this->textColor);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $centerColor = Deserializer::int32($__payload, $__offset);
        $edgeColor = Deserializer::int32($__payload, $__offset);
        $textColor = Deserializer::int32($__payload, $__offset);

        return new self(
            $centerColor,
            $edgeColor,
            $textColor
        );
    }
}