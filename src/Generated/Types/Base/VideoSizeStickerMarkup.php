<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/videoSizeStickerMarkup
 */
final class VideoSizeStickerMarkup extends AbstractVideoSize
{
    public const CONSTRUCTOR_ID = 0xda082fe;
    
    public string $predicate = 'videoSizeStickerMarkup';
    
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param int $stickerId
     * @param list<int> $backgroundColors
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly int $stickerId,
        public readonly array $backgroundColors
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        $buffer .= Serializer::int64($this->stickerId);
        $buffer .= Serializer::vectorOfInts($this->backgroundColors);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $stickerset = AbstractInputStickerSet::deserialize($stream);
        $stickerId = Deserializer::int64($stream);
        $backgroundColors = Deserializer::vectorOfInts($stream);

        return new self(
            $stickerset,
            $stickerId,
            $backgroundColors
        );
    }
}