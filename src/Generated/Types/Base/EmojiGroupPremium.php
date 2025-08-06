<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emojiGroupPremium
 */
final class EmojiGroupPremium extends AbstractEmojiGroup
{
    public const CONSTRUCTOR_ID = 0x93bcf34;
    
    public string $_ = 'emojiGroupPremium';
    
    /**
     * @param string $title
     * @param int $iconEmojiId
     */
    public function __construct(
        public readonly string $title,
        public readonly int $iconEmojiId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->int64($this->iconEmojiId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $title = $deserializer->bytes($stream);
        $iconEmojiId = $deserializer->int64($stream);
        return new self(
            $title,
            $iconEmojiId
        );
    }
}