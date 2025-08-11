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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinnedToTop !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->stories);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfInts($this->pinnedToTop);
        }
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $count = Deserializer::int32($stream);
        $stories = Deserializer::vectorOfObjects($stream, [AbstractStoryItem::class, 'deserialize']);
        $pinnedToTop = ($flags & (1 << 0)) ? Deserializer::vectorOfInts($stream) : null;
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $count,
            $stories,
            $chats,
            $users,
            $pinnedToTop
        );
    }
}