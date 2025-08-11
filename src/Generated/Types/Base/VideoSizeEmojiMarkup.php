<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/videoSizeEmojiMarkup
 */
final class VideoSizeEmojiMarkup extends AbstractVideoSize
{
    public const CONSTRUCTOR_ID = 0xf85c413c;
    
    public string $_ = 'videoSizeEmojiMarkup';
    
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $emojiId = Deserializer::int64($stream);
        $backgroundColors = Deserializer::vectorOfInts($stream);
        return new self(
            $emojiId,
            $backgroundColors
        );
    }
}