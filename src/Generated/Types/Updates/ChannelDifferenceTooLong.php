<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDialog;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updates.channelDifferenceTooLong
 */
final class ChannelDifferenceTooLong extends AbstractChannelDifference
{
    public const CONSTRUCTOR_ID = 0xa4bcc6fe;
    
    public string $predicate = 'updates.channelDifferenceTooLong';
    
    /**
     * @param AbstractDialog $dialog
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param true|null $final_
     * @param int|null $timeout
     */
    public function __construct(
        public readonly AbstractDialog $dialog,
        public readonly array $messages,
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
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->timeout);
        }
        $buffer .= $this->dialog->serialize();
        $buffer .= Serializer::vectorOfObjects($this->messages);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $final_ = (($flags & (1 << 0)) !== 0) ? true : null;
        $timeout = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;
        $dialog = AbstractDialog::deserialize($stream);
        $messages = Deserializer::vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $dialog,
            $messages,
            $chats,
            $users,
            $final_,
            $timeout
        );
    }
}