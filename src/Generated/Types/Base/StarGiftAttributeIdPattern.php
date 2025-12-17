<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftAttributeIdPattern
 */
final class StarGiftAttributeIdPattern extends AbstractStarGiftAttributeId
{
    public const CONSTRUCTOR_ID = 0x4a162433;
    
    public string $predicate = 'starGiftAttributeIdPattern';
    
    /**
     * @param int $documentId
     */
    public function __construct(
        public readonly int $documentId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->documentId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $documentId = Deserializer::int64($__payload, $__offset);

        return new self(
            $documentId
        );
    }
}