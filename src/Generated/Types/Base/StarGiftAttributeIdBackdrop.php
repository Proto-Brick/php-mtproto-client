<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftAttributeIdBackdrop
 */
final class StarGiftAttributeIdBackdrop extends AbstractStarGiftAttributeId
{
    public const CONSTRUCTOR_ID = 0x1f01c757;
    
    public string $predicate = 'starGiftAttributeIdBackdrop';
    
    /**
     * @param int $backdropId
     */
    public function __construct(
        public readonly int $backdropId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->backdropId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $backdropId = Deserializer::int32($__payload, $__offset);

        return new self(
            $backdropId
        );
    }
}