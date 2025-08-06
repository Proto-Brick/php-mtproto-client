<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionTopicEdit
 */
final class MessageActionTopicEdit extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xc0944820;
    
    public string $_ = 'messageActionTopicEdit';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->iconEmojiId !== null) $flags |= (1 << 1);
        if ($this->closed !== null) $flags |= (1 << 2);
        if ($this->hidden !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int64($this->iconEmojiId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->closed ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 3)) {
            $buffer .= ($this->hidden ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $title = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $iconEmojiId = ($flags & (1 << 1)) ? $deserializer->int64($stream) : null;
        $closed = ($flags & (1 << 2)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $hidden = ($flags & (1 << 3)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        return new self(
            $title,
            $iconEmojiId,
            $closed,
            $hidden
        );
    }
}