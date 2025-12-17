<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starGiftAttributeCounter
 */
final class StarGiftAttributeCounter extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2eb1b658;
    
    public string $predicate = 'starGiftAttributeCounter';
    
    /**
     * @param AbstractStarGiftAttributeId $attribute
     * @param int $count
     */
    public function __construct(
        public readonly AbstractStarGiftAttributeId $attribute,
        public readonly int $count
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->attribute->serialize();
        $buffer .= Serializer::int32($this->count);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $attribute = AbstractStarGiftAttributeId::deserialize($__payload, $__offset);
        $count = Deserializer::int32($__payload, $__offset);

        return new self(
            $attribute,
            $count
        );
    }
}