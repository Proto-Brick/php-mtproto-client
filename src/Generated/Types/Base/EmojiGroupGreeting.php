<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emojiGroupGreeting
 */
final class EmojiGroupGreeting extends AbstractEmojiGroup
{
    public const CONSTRUCTOR_ID = 2161274055;
    
    public string $_ = 'emojiGroupGreeting';
    
    /**
     * @param string $title
     * @param int $iconEmojiId
     * @param list<string> $emoticons
     */
    public function __construct(
        public readonly string $title,
        public readonly int $iconEmojiId,
        public readonly array $emoticons
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->int64($this->iconEmojiId);
        $buffer .= $serializer->vectorOfStrings($this->emoticons);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $title = $deserializer->bytes($stream);
        $iconEmojiId = $deserializer->int64($stream);
        $emoticons = $deserializer->vectorOfStrings($stream);
            return new self(
            $title,
            $iconEmojiId,
            $emoticons
        );
    }
}