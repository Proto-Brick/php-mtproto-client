<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/videoSizeEmojiMarkup
 */
final class VideoSizeEmojiMarkup extends AbstractVideoSize
{
    public const CONSTRUCTOR_ID = 0xf85c413c;
    
    public string $predicate = 'videoSizeEmojiMarkup';
    
    /**
     * @param int $emojiId
     * @param list<int> $backgroundColors
     */
    public function __construct(
        public readonly int $emojiId,
        public readonly array $backgroundColors
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->emojiId);
        $buffer .= Serializer::vectorOfInts($this->backgroundColors);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $emojiId = Deserializer::int64($__payload, $__offset);
        $backgroundColors = Deserializer::vectorOfInts($__payload, $__offset);

        return new self(
            $emojiId,
            $backgroundColors
        );
    }
}