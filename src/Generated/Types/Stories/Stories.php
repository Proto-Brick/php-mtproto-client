<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStoryItem;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stories.stories
 */
final class Stories extends TlObject
{
    public const CONSTRUCTOR_ID = 0x63c3dd0a;
    
    public string $_ = 'stories.stories';
    
    /**
     * @param int $count
     * @param list<AbstractStoryItem> $stories
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param list<int>|null $pinnedToTop
     */
    public function __construct(
        public readonly int $count,
        public readonly array $stories,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?array $pinnedToTop = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinnedToTop !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->stories);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfInts($this->pinnedToTop);
        }
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $count = $deserializer->int32($stream);
        $stories = $deserializer->vectorOfObjects($stream, [AbstractStoryItem::class, 'deserialize']);
        $pinnedToTop = ($flags & (1 << 0)) ? $deserializer->vectorOfInts($stream) : null;
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $count,
            $stories,
            $chats,
            $users,
            $pinnedToTop
        );
    }
}