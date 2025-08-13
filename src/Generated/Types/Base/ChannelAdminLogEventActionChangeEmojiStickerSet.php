<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeEmojiStickerSet
 */
final class ChannelAdminLogEventActionChangeEmojiStickerSet extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x46d840ab;
    
    public string $predicate = 'channelAdminLogEventActionChangeEmojiStickerSet';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevStickerset = AbstractInputStickerSet::deserialize($stream);
        $newStickerset = AbstractInputStickerSet::deserialize($stream);

        return new self(
            $prevStickerset,
            $newStickerset
        );
    }
}