<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiGroup;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.emojiGroups
 */
final class EmojiGroups extends AbstractEmojiGroups
{
    public const CONSTRUCTOR_ID = 0x881fb94b;
    
    public string $_ = 'messages.emojiGroups';
    
    /**
     * @param int $hash
     * @param list<AbstractEmojiGroup> $groups
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $groups
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->groups);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $hash = Deserializer::int32($stream);
        $groups = Deserializer::vectorOfObjects($stream, [AbstractEmojiGroup::class, 'deserialize']);
        return new self(
            $hash,
            $groups
        );
    }
}