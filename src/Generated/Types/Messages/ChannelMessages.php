<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractForumTopic;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.channelMessages
 */
final class ChannelMessages extends AbstractMessages
{
    public const CONSTRUCTOR_ID = 0xc776ba4e;
    
    public string $predicate = 'messages.channelMessages';
    
    /**
     * @param int $pts
     * @param int $count
     * @param list<AbstractMessage> $messages
     * @param list<AbstractForumTopic> $topics
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param true|null $inexact
     * @param int|null $offsetIdOffset
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $count,
        public readonly array $messages,
        public readonly array $topics,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?true $inexact = null,
        public readonly ?int $offsetIdOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inexact) {
            $flags |= (1 << 1);
        }
        if ($this->offsetIdOffset !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->count);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->offsetIdOffset);
        }
        $buffer .= Serializer::vectorOfObjects($this->messages);
        $buffer .= Serializer::vectorOfObjects($this->topics);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $inexact = (($flags & (1 << 1)) !== 0) ? true : null;
        $pts = Deserializer::int32($__payload, $__offset);
        $count = Deserializer::int32($__payload, $__offset);
        $offsetIdOffset = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $messages = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessage::class, 'deserialize']);
        $topics = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractForumTopic::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $pts,
            $count,
            $messages,
            $topics,
            $chats,
            $users,
            $inexact,
            $offsetIdOffset
        );
    }
}