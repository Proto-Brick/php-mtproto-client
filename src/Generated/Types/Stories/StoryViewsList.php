<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStoryView;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stories.storyViewsList
 */
final class StoryViewsList extends TlObject
{
    public const CONSTRUCTOR_ID = 0x59d78fc5;
    
    public string $predicate = 'stories.storyViewsList';
    
    /**
     * @param int $count
     * @param int $viewsCount
     * @param int $forwardsCount
     * @param int $reactionsCount
     * @param list<AbstractStoryView> $views
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param string|null $nextOffset
     */
    public function __construct(
        public readonly int $count,
        public readonly int $viewsCount,
        public readonly int $forwardsCount,
        public readonly int $reactionsCount,
        public readonly array $views,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?string $nextOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextOffset !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::int32($this->viewsCount);
        $buffer .= Serializer::int32($this->forwardsCount);
        $buffer .= Serializer::int32($this->reactionsCount);
        $buffer .= Serializer::vectorOfObjects($this->views);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->nextOffset);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $count = Deserializer::int32($__payload, $__offset);
        $viewsCount = Deserializer::int32($__payload, $__offset);
        $forwardsCount = Deserializer::int32($__payload, $__offset);
        $reactionsCount = Deserializer::int32($__payload, $__offset);
        $views = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStoryView::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $nextOffset = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $count,
            $viewsCount,
            $forwardsCount,
            $reactionsCount,
            $views,
            $chats,
            $users,
            $nextOffset
        );
    }
}