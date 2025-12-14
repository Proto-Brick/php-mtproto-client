<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SearchPostsFlood;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.messagesSlice
 */
final class MessagesSlice extends AbstractMessages
{
    public const CONSTRUCTOR_ID = 0x762b263d;
    
    public string $predicate = 'messages.messagesSlice';
    
    /**
     * @param int $count
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param true|null $inexact
     * @param int|null $nextRate
     * @param int|null $offsetIdOffset
     * @param SearchPostsFlood|null $searchFlood
     */
    public function __construct(
        public readonly int $count,
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?true $inexact = null,
        public readonly ?int $nextRate = null,
        public readonly ?int $offsetIdOffset = null,
        public readonly ?SearchPostsFlood $searchFlood = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inexact) {
            $flags |= (1 << 1);
        }
        if ($this->nextRate !== null) {
            $flags |= (1 << 0);
        }
        if ($this->offsetIdOffset !== null) {
            $flags |= (1 << 2);
        }
        if ($this->searchFlood !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->count);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->nextRate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->offsetIdOffset);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->searchFlood->serialize();
        }
        $buffer .= Serializer::vectorOfObjects($this->messages);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $inexact = (($flags & (1 << 1)) !== 0) ? true : null;
        $count = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $nextRate = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $offsetIdOffset = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($stream) : null;
        $searchFlood = (($flags & (1 << 3)) !== 0) ? SearchPostsFlood::deserialize($stream) : null;
        $messages = Deserializer::vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $messages,
            $chats,
            $users,
            $inexact,
            $nextRate,
            $offsetIdOffset,
            $searchFlood
        );
    }
}