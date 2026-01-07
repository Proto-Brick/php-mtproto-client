<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/emojiKeywordDeleted
 */
final class EmojiKeywordDeleted extends AbstractEmojiKeyword
{
    public const CONSTRUCTOR_ID = 0x236df622;
    
    public string $predicate = 'emojiKeywordDeleted';
    
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $keyword = Deserializer::bytes($__payload, $__offset);
        $emoticons = Deserializer::vectorOfStrings($__payload, $__offset);

        return new self(
            $keyword,
            $emoticons
        );
    }
}