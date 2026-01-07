<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerStories;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StoriesStealthMode;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->hasMore) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::bytes($this->state);
        $buffer .= Serializer::vectorOfObjects($this->peerStories);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= $this->stealthMode->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $hasMore = (($flags & (1 << 0)) !== 0) ? true : null;
        $count = Deserializer::int32($__payload, $__offset);
        $state = Deserializer::bytes($__payload, $__offset);
        $peerStories = Deserializer::vectorOfObjects($__payload, $__offset, [PeerStories::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $stealthMode = StoriesStealthMode::deserialize($__payload, $__offset);

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