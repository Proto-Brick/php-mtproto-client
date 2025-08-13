<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/emojiGroup
 */
final class EmojiGroup extends AbstractEmojiGroup
{
    public const CONSTRUCTOR_ID = 0x7a9abda9;
    
    public string $predicate = 'emojiGroup';
    
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