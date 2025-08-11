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
final class ForumTopics extends TlObject
{
    public const CONSTRUCTOR_ID = 0x367617d3;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->orderByCreateDate) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->topics);
        $buffer .= Serializer::vectorOfObjects($this->messages);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= Serializer::int32($this->pts);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $orderByCreateDate = ($flags & (1 << 0)) ? true : null;
        $count = Deserializer::int32($stream);
        $topics = Deserializer::vectorOfObjects($stream, [AbstractForumTopic::class, 'deserialize']);
        $messages = Deserializer::vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $pts = Deserializer::int32($stream);
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