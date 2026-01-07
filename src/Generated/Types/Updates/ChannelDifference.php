<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdate;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updates.channelDifference
 */
final class ChannelDifference extends AbstractChannelDifference
{
    public const CONSTRUCTOR_ID = 0x2064674e;
    
    public string $predicate = 'updates.channelDifference';
    
    /**
     * @param int $pts
     * @param list<AbstractMessage> $newMessages
     * @param list<AbstractUpdate> $otherUpdates
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param true|null $final_
     * @param int|null $timeout
     */
    public function __construct(
        public readonly int $pts,
        public readonly array $newMessages,
        public readonly array $otherUpdates,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?true $final_ = null,
        public readonly ?int $timeout = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->final_) {
            $flags |= (1 << 0);
        }
        if ($this->timeout !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->pts);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->timeout);
        }
        $buffer .= Serializer::vectorOfObjects($this->newMessages);
        $buffer .= Serializer::vectorOfObjects($this->otherUpdates);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $final_ = (($flags & (1 << 0)) !== 0) ? true : null;
        $pts = Deserializer::int32($__payload, $__offset);
        $timeout = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $newMessages = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessage::class, 'deserialize']);
        $otherUpdates = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUpdate::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $pts,
            $newMessages,
            $otherUpdates,
            $chats,
            $users,
            $final_,
            $timeout
        );
    }
}