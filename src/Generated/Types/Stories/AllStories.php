<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPeerStories;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStoriesStealthMode;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stories.allStories
 */
final class AllStories extends AbstractAllStories
{
    public const CONSTRUCTOR_ID = 1862033025;
    
    public string $_ = 'stories.allStories';
    
    /**
     * @param int $count
     * @param string $state
     * @param list<AbstractPeerStories> $peerStories
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param AbstractStoriesStealthMode $stealthMode
     * @param bool|null $hasMore
     */
    public function __construct(
        public readonly int $count,
        public readonly string $state,
        public readonly array $peerStories,
        public readonly array $chats,
        public readonly array $users,
        public readonly AbstractStoriesStealthMode $stealthMode,
        public readonly ?bool $hasMore = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasMore) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->bytes($this->state);
        $buffer .= $serializer->vectorOfObjects($this->peerStories);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        $buffer .= $this->stealthMode->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hasMore = ($flags & (1 << 0)) ? true : null;
        $count = $deserializer->int32($stream);
        $state = $deserializer->bytes($stream);
        $peerStories = $deserializer->vectorOfObjects($stream, [AbstractPeerStories::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $stealthMode = AbstractStoriesStealthMode::deserialize($deserializer, $stream);
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