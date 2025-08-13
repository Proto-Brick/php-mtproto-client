<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/emojiGroupPremium
 */
final class EmojiGroupPremium extends AbstractEmojiGroup
{
    public const CONSTRUCTOR_ID = 0x93bcf34;
    
    public string $predicate = 'emojiGroupPremium';
    
    /**
     * @param string $title
     * @param int $iconEmojiId
     */
    public function __construct(
        public readonly string $title,
        public readonly int $iconEmojiId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::int64($this->iconEmojiId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $title = Deserializer::bytes($stream);
        $iconEmojiId = Deserializer::int64($stream);

        return new self(
            $title,
            $iconEmojiId
        );
    }
}