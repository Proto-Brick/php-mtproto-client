<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.messagesSlice
 */
final class MessagesSlice extends AbstractMessages
{
    public const CONSTRUCTOR_ID = 0x3a54685e;
    
    public string $_ = 'messages.messagesSlice';
    
    /**
     * @param int $count
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param bool|null $inexact
     * @param int|null $nextRate
     * @param int|null $offsetIdOffset
     */
    public function __construct(
        public readonly int $count,
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?bool $inexact = null,
        public readonly ?int $nextRate = null,
        public readonly ?int $offsetIdOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inexact) $flags |= (1 << 1);
        if ($this->nextRate !== null) $flags |= (1 << 0);
        if ($this->offsetIdOffset !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->count);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->nextRate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->offsetIdOffset);
        }
        $buffer .= Serializer::vectorOfObjects($this->messages);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $inexact = ($flags & (1 << 1)) ? true : null;
        $count = Deserializer::int32($stream);
        $nextRate = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $offsetIdOffset = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
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
            $offsetIdOffset
        );
    }
}