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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->groups);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int32($stream);
        $groups = $deserializer->vectorOfObjects($stream, [AbstractEmojiGroup::class, 'deserialize']);
        return new self(
            $hash,
            $groups
        );
    }
}