<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateMoveStickerSetToTop
 */
final class UpdateMoveStickerSetToTop extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x86fccf85;
    
    public string $predicate = 'updateMoveStickerSetToTop';
    
    /**
     * @param int $stickerset
     * @param true|null $masks
     * @param true|null $emojis
     */
    public function __construct(
        public readonly int $stickerset,
        public readonly ?true $masks = null,
        public readonly ?true $emojis = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) {
            $flags |= (1 << 0);
        }
        if ($this->emojis) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->stickerset);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $masks = (($flags & (1 << 0)) !== 0) ? true : null;
        $emojis = (($flags & (1 << 1)) !== 0) ? true : null;
        $stickerset = Deserializer::int64($__payload, $__offset);

        return new self(
            $stickerset,
            $masks,
            $emojis
        );
    }
}