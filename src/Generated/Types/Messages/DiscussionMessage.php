<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.discussionMessage
 */
final class DiscussionMessage extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa6341782;
    
    public string $_ = 'messages.discussionMessage';
    
    /**
     * @param list<AbstractMessage> $messages
     * @param int $unreadCount
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param int|null $maxId
     * @param int|null $readInboxMaxId
     * @param int|null $readOutboxMaxId
     */
    public function __construct(
        public readonly array $messages,
        public readonly int $unreadCount,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?int $maxId = null,
        public readonly ?int $readInboxMaxId = null,
        public readonly ?int $readOutboxMaxId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->maxId !== null) $flags |= (1 << 0);
        if ($this->readInboxMaxId !== null) $flags |= (1 << 1);
        if ($this->readOutboxMaxId !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->messages);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->maxId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->readInboxMaxId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->readOutboxMaxId);
        }
        $buffer .= $serializer->int32($this->unreadCount);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $messages = $deserializer->vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $maxId = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $readInboxMaxId = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $readOutboxMaxId = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $unreadCount = $deserializer->int32($stream);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $messages,
            $unreadCount,
            $chats,
            $users,
            $maxId,
            $readInboxMaxId,
            $readOutboxMaxId
        );
    }
}