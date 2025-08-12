<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emojiKeyword
 */
final class EmojiKeyword extends AbstractEmojiKeyword
{
    public const CONSTRUCTOR_ID = 0xd5b3b9f9;
    
    public string $predicate = 'emojiKeyword';
    
    /**
     * @param string $keyword
     * @param list<string> $emoticons
     */
    public function __construct(
        public readonly string $keyword,
        public readonly array $emoticons
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->keyword);
        $buffer .= Serializer::vectorOfStrings($this->emoticons);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $keyword = Deserializer::bytes($stream);
        $emoticons = Deserializer::vectorOfStrings($stream);

        return new self(
            $keyword,
            $emoticons
        );
    }
}