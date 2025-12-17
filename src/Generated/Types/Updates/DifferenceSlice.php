<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEncryptedMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdate;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updates.differenceSlice
 */
final class DifferenceSlice extends AbstractDifference
{
    public const CONSTRUCTOR_ID = 0xa8fb1981;
    
    public string $predicate = 'updates.differenceSlice';
    
    /**
     * @param list<AbstractMessage> $newMessages
     * @param list<AbstractEncryptedMessage> $newEncryptedMessages
     * @param list<AbstractUpdate> $otherUpdates
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param State $intermediateState
     */
    public function __construct(
        public readonly array $newMessages,
        public readonly array $newEncryptedMessages,
        public readonly array $otherUpdates,
        public readonly array $chats,
        public readonly array $users,
        public readonly State $intermediateState
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->newMessages);
        $buffer .= Serializer::vectorOfObjects($this->newEncryptedMessages);
        $buffer .= Serializer::vectorOfObjects($this->otherUpdates);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= $this->intermediateState->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $newMessages = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessage::class, 'deserialize']);
        $newEncryptedMessages = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractEncryptedMessage::class, 'deserialize']);
        $otherUpdates = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUpdate::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $intermediateState = State::deserialize($__payload, $__offset);

        return new self(
            $newMessages,
            $newEncryptedMessages,
            $otherUpdates,
            $chats,
            $users,
            $intermediateState
        );
    }
}