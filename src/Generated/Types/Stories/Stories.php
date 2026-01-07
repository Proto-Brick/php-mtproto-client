<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStoryItem;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stories.stories
 */
final class Stories extends TlObject
{
    public const CONSTRUCTOR_ID = 0x63c3dd0a;
    
    public string $predicate = 'stories.stories';
    
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
        if ($this->pinnedToTop !== null) {
            $flags |= (1 << 0);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $count = Deserializer::int32($__payload, $__offset);
        $stories = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStoryItem::class, 'deserialize']);
        $pinnedToTop = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfInts($__payload, $__offset) : null;
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $stories,
            $chats,
            $users,
            $pinnedToTop
        );
    }
}