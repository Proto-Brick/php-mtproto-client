<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractForumTopic;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.forumTopics
 */
final class ForumTopics extends AbstractForumTopics
{
    public const CONSTRUCTOR_ID = 913709011;
    
    public string $_ = 'messages.forumTopics';
    
    /**
     * @param int $count
     * @param list<AbstractForumTopic> $topics
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param int $pts
     * @param bool|null $orderByCreateDate
     */
    public function __construct(
        public readonly int $count,
        public readonly array $topics,
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly int $pts,
        public readonly ?bool $orderByCreateDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->orderByCreateDate) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->topics);
        $buffer .= $serializer->vectorOfObjects($this->messages);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        $buffer .= $serializer->int32($this->pts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $orderByCreateDate = ($flags & (1 << 0)) ? true : null;
        $count = $deserializer->int32($stream);
        $topics = $deserializer->vectorOfObjects($stream, [AbstractForumTopic::class, 'deserialize']);
        $messages = $deserializer->vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $pts = $deserializer->int32($stream);
            return new self(
            $count,
            $topics,
            $messages,
            $chats,
            $users,
            $pts,
            $orderByCreateDate
        );
    }
}