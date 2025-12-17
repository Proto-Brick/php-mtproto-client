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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $title = Deserializer::bytes($__payload, $__offset);
        $iconEmojiId = Deserializer::int64($__payload, $__offset);
        $emoticons = Deserializer::vectorOfStrings($__payload, $__offset);

        return new self(
            $title,
            $iconEmojiId,
            $emoticons
        );
    }
}