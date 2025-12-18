<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/photoStrippedSize
 */
final class PhotoStrippedSize extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 0xe0b0bc2e;
    
    public string $predicate = 'photoStrippedSize';
    
    /**
     * @param string $type
     * @param string $bytes
     */
    public function __construct(
        public readonly string $type,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->type);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $type = Deserializer::bytes($__payload, $__offset);
        $bytes = Deserializer::bytes($__payload, $__offset);

        return new self(
            $type,
            $bytes
        );
    }
}