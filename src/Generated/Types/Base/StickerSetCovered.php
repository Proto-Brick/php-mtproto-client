<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/stickerSetCovered
 */
final class StickerSetCovered extends AbstractStickerSetCovered
{
    public const CONSTRUCTOR_ID = 0x6410a5d2;
    
    public string $predicate = 'stickerSetCovered';
    
    /**
     * @param StickerSet $set
     * @param AbstractDocument $cover
     */
    public function __construct(
        public readonly StickerSet $set,
        public readonly AbstractDocument $cover
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->set->serialize();
        $buffer .= $this->cover->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $set = StickerSet::deserialize($stream);
        $cover = AbstractDocument::deserialize($stream);

        return new self(
            $set,
            $cover
        );
    }
}