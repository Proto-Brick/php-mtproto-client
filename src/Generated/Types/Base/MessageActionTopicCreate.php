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
        if ($this->iconEmojiId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::int32($this->iconColor);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->iconEmojiId);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $title = Deserializer::bytes($stream);
        $iconColor = Deserializer::int32($stream);
        $iconEmojiId = ($flags & (1 << 0)) ? Deserializer::int64($stream) : null;

        return new self(
            $title,
            $iconColor,
            $iconEmojiId
        );
    }
}