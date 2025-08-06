<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionTopicCreate
 */
final class MessageActionTopicCreate extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xd999256;
    
    public string $_ = 'messageActionTopicCreate';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->iconEmojiId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->int32($this->iconColor);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->iconEmojiId);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $title = $deserializer->bytes($stream);
        $iconColor = $deserializer->int32($stream);
        $iconEmojiId = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        return new self(
            $title,
            $iconColor,
            $iconEmojiId
        );
    }
}