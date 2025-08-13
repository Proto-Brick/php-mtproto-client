<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateNewStickerSet
 */
final class UpdateNewStickerSet extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x688a30aa;
    
    public string $predicate = 'updateNewStickerSet';
    
    /**
     * @param AbstractStickerSet $stickerset
     */
    public function __construct(
        public readonly AbstractStickerSet $stickerset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $stickerset = AbstractStickerSet::deserialize($stream);

        return new self(
            $stickerset
        );
    }
}