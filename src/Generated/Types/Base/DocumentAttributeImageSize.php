<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/documentAttributeImageSize
 */
final class DocumentAttributeImageSize extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0x6c37c15c;
    
    public string $predicate = 'documentAttributeImageSize';
    
    /**
     * @param int $w
     * @param int $h
     */
    public function __construct(
        public readonly int $w,
        public readonly int $h
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $w = Deserializer::int32($__payload, $__offset);
        $h = Deserializer::int32($__payload, $__offset);

        return new self(
            $w,
            $h
        );
    }
}