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
    public const CONSTRUCTOR_ID = 0x80d26cc7;
    
    public string $predicate = 'emojiGroupGreeting';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::int64($this->iconEmojiId);
        $buffer .= Serializer::vectorOfStrings($this->emoticons);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $title = Deserializer::bytes($stream);
        $iconEmojiId = Deserializer::int64($stream);
        $emoticons = Deserializer::vectorOfStrings($stream);

        return new self(
            $title,
            $iconEmojiId,
            $emoticons
        );
    }
}