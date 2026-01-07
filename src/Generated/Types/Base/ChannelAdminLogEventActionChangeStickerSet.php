<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeStickerSet
 */
final class ChannelAdminLogEventActionChangeStickerSet extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xb1c3caa7;
    
    public string $predicate = 'channelAdminLogEventActionChangeStickerSet';
    
    /**
     * @param AbstractInputStickerSet $prevStickerset
     * @param AbstractInputStickerSet $newStickerset
     */
    public function __construct(
        public readonly AbstractInputStickerSet $prevStickerset,
        public readonly AbstractInputStickerSet $newStickerset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevStickerset->serialize();
        $buffer .= $this->newStickerset->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $prevStickerset = AbstractInputStickerSet::deserialize($__payload, $__offset);
        $newStickerset = AbstractInputStickerSet::deserialize($__payload, $__offset);

        return new self(
            $prevStickerset,
            $newStickerset
        );
    }
}