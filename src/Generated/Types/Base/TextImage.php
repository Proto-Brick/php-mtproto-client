<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/textImage
 */
final class TextImage extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x81ccf4f;
    
    public string $predicate = 'textImage';
    
    /**
     * @param int $documentId
     * @param int $w
     * @param int $h
     */
    public function __construct(
        public readonly int $documentId,
        public readonly int $w,
        public readonly int $h
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->documentId);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $documentId = Deserializer::int64($__payload, $__offset);
        $w = Deserializer::int32($__payload, $__offset);
        $h = Deserializer::int32($__payload, $__offset);

        return new self(
            $documentId,
            $w,
            $h
        );
    }
}