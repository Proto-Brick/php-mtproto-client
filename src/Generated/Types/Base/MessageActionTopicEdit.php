<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionTopicEdit
 */
final class MessageActionTopicEdit extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xc0944820;
    
    public string $predicate = 'messageActionTopicEdit';
    
    /**
     * @param string|null $title
     * @param int|null $iconEmojiId
     * @param bool|null $closed
     * @param bool|null $hidden
     */
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?int $iconEmojiId = null,
        public readonly ?bool $closed = null,
        public readonly ?bool $hidden = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        if ($this->iconEmojiId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->closed !== null) {
            $flags |= (1 << 2);
        }
        if ($this->hidden !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->iconEmojiId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->closed ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 3)) {
            $buffer .= ($this->hidden ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $title = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $iconEmojiId = (($flags & (1 << 1)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $closed = (($flags & (1 << 2)) !== 0) ? (Deserializer::int32($__payload, $__offset) === 0x997275b5) : null;
        $hidden = (($flags & (1 << 3)) !== 0) ? (Deserializer::int32($__payload, $__offset) === 0x997275b5) : null;

        return new self(
            $title,
            $iconEmojiId,
            $closed,
            $hidden
        );
    }
}