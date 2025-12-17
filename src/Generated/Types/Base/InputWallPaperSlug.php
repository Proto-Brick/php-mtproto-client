<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputWallPaperSlug
 */
final class InputWallPaperSlug extends AbstractInputWallPaper
{
    public const CONSTRUCTOR_ID = 0x72091c80;
    
    public string $predicate = 'inputWallPaperSlug';
    
    /**
     * @param string $slug
     */
    public function __construct(
        public readonly string $slug
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $slug = Deserializer::bytes($__payload, $__offset);

        return new self(
            $slug
        );
    }
}