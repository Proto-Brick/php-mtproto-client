<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\PeerStories;
use DigitalStars\MtprotoClient\Generated\Types\Base\StoriesStealthMode;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stories.allStories
 */
final class AllStories extends AbstractAllStories
{
    public const CONSTRUCTOR_ID = 0x6efc5e81;
    
    public string $predicate = 'stories.allStories';
    
    /**
     * @param int $count
     * @param string $state
     * @param list<PeerStories> $peerStories
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param StoriesStealthMode $stealthMode
     * @param true|null $hasMore
     */
    public function __construct(
        public readonly int $count,
        public readonly string $state,
        public readonly array $peerStories,
        public readonly array $chats,
        public readonly array $users,
        public readonly StoriesStealthMode $stealthMode,
        public readonly ?true $hasMore = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasMore) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::bytes($this->state);
        $buffer .= Serializer::vectorOfObjects($this->peerStories);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= $this->stealthMode->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $hasMore = ($flags & (1 << 0)) ? true : null;
        $count = Deserializer::int32($stream);
        $state = Deserializer::bytes($stream);
        $peerStories = Deserializer::vectorOfObjects($stream, [PeerStories::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $stealthMode = StoriesStealthMode::deserialize($stream);

        return new self(
            $count,
            $state,
            $peerStories,
            $chats,
            $users,
            $stealthMode,
            $hasMore
        );
    }
}