<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessagePeerVote;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.votesList
 */
final class VotesList extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4899484e;
    
    public string $predicate = 'messages.votesList';
    
    /**
     * @param int $count
     * @param list<AbstractMessagePeerVote> $votes
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param string|null $nextOffset
     */
    public function __construct(
        public readonly int $count,
        public readonly array $votes,
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
        $buffer .= Serializer::vectorOfObjects($this->votes);
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
        $votes = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessagePeerVote::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $nextOffset = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $count,
            $votes,
            $chats,
            $users,
            $nextOffset
        );
    }
}