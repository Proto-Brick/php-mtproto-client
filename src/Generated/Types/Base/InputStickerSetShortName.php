<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStickerSetShortName
 */
final class InputStickerSetShortName extends AbstractInputStickerSet
{
    public const CONSTRUCTOR_ID = 0x861cc8a0;
    
    public string $predicate = 'inputStickerSetShortName';
    
    /**
     * @param string $shortName
     */
    public function __construct(
        public readonly string $shortName
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->shortName);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $shortName = Deserializer::bytes($__payload, $__offset);

        return new self(
            $shortName
        );
    }
}