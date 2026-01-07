<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDialog;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\State;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.peerDialogs
 */
final class PeerDialogs extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3371c354;
    
    public string $predicate = 'messages.peerDialogs';
    
    /**
     * @param list<AbstractDialog> $dialogs
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param State $state
     */
    public function __construct(
        public readonly array $dialogs,
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly State $state
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->dialogs);
        $buffer .= Serializer::vectorOfObjects($this->messages);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= $this->state->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $dialogs = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDialog::class, 'deserialize']);
        $messages = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessage::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $state = State::deserialize($__payload, $__offset);

        return new self(
            $dialogs,
            $messages,
            $chats,
            $users,
            $state
        );
    }
}