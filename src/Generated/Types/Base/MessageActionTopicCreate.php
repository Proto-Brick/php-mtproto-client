<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionTopicCreate
 */
final class MessageActionTopicCreate extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xd999256;
    
    public string $predicate = 'messageActionTopicCreate';
    
    /**
     * @param string $title
     * @param int $iconColor
     * @param int|null $iconEmojiId
     */
    public function __construct(
        public readonly string $title,
        public readonly int $iconColor,
        public readonly ?int $iconEmojiId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->iconEmojiId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::int32($this->iconColor);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->iconEmojiId);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $iconColor = Deserializer::int32($__payload, $__offset);
        $iconEmojiId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

        return new self(
            $title,
            $iconColor,
            $iconEmojiId
        );
    }
}