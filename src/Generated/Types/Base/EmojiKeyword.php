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
    public const CONSTRUCTOR_ID = 3585325561;
    
    public string $_ = 'emojiKeyword';
    
    /**
     * @param string $keyword
     * @param list<string> $emoticons
     */
    public function __construct(
        public readonly string $keyword,
        public readonly array $emoticons
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->keyword);
        $buffer .= $serializer->vectorOfStrings($this->emoticons);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $keyword = $deserializer->bytes($stream);
        $emoticons = $deserializer->vectorOfStrings($stream);
            return new self(
            $keyword,
            $emoticons
        );
    }
}