<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/forumTopic
 */
final class ForumTopic extends AbstractForumTopic
{
    public const CONSTRUCTOR_ID = 1903173033;
    
    public string $_ = 'forumTopic';
    
    /**
     * @param int $id
     * @param int $date
     * @param string $title
     * @param int $iconColor
     * @param int $topMessage
     * @param int $readInboxMaxId
     * @param int $readOutboxMaxId
     * @param int $unreadCount
     * @param int $unreadMentionsCount
     * @param int $unreadReactionsCount
     * @param AbstractPeer $fromId
     * @param AbstractPeerNotifySettings $notifySettings
     * @param bool|null $my
     * @param bool|null $closed
     * @param bool|null $pinned
     * @param bool|null $short
     * @param bool|null $hidden
     * @param int|null $iconEmojiId
     * @param AbstractDraftMessage|null $draft
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
        public readonly string $title,
        public readonly int $iconColor,
        public readonly int $topMessage,
        public readonly int $readInboxMaxId,
        public readonly int $readOutboxMaxId,
        public readonly int $unreadCount,
        public readonly int $unreadMentionsCount,
        public readonly int $unreadReactionsCount,
        public readonly AbstractPeer $fromId,
        public readonly AbstractPeerNotifySettings $notifySettings,
        public readonly ?bool $my = null,
        public readonly ?bool $closed = null,
        public readonly ?bool $pinned = null,
        public readonly ?bool $short = null,
        public readonly ?bool $hidden = null,
        public readonly ?int $iconEmojiId = null,
        public readonly ?AbstractDraftMessage $draft = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->my) $flags |= (1 << 1);
        if ($this->closed) $flags |= (1 << 2);
        if ($this->pinned) $flags |= (1 << 3);
        if ($this->short) $flags |= (1 << 5);
        if ($this->hidden) $flags |= (1 << 6);
        if ($this->iconEmojiId !== null) $flags |= (1 << 0);
        if ($this->draft !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->int32($this->iconColor);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->iconEmojiId);
        }
        $buffer .= $serializer->int32($this->topMessage);
        $buffer .= $serializer->int32($this->readInboxMaxId);
        $buffer .= $serializer->int32($this->readOutboxMaxId);
        $buffer .= $serializer->int32($this->unreadCount);
        $buffer .= $serializer->int32($this->unreadMentionsCount);
        $buffer .= $serializer->int32($this->unreadReactionsCount);
        $buffer .= $this->fromId->serialize($serializer);
        $buffer .= $this->notifySettings->serialize($serializer);
        if ($flags & (1 << 4)) {
            $buffer .= $this->draft->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $my = ($flags & (1 << 1)) ? true : null;
        $closed = ($flags & (1 << 2)) ? true : null;
        $pinned = ($flags & (1 << 3)) ? true : null;
        $short = ($flags & (1 << 5)) ? true : null;
        $hidden = ($flags & (1 << 6)) ? true : null;
        $id = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $title = $deserializer->bytes($stream);
        $iconColor = $deserializer->int32($stream);
        $iconEmojiId = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $topMessage = $deserializer->int32($stream);
        $readInboxMaxId = $deserializer->int32($stream);
        $readOutboxMaxId = $deserializer->int32($stream);
        $unreadCount = $deserializer->int32($stream);
        $unreadMentionsCount = $deserializer->int32($stream);
        $unreadReactionsCount = $deserializer->int32($stream);
        $fromId = AbstractPeer::deserialize($deserializer, $stream);
        $notifySettings = AbstractPeerNotifySettings::deserialize($deserializer, $stream);
        $draft = ($flags & (1 << 4)) ? AbstractDraftMessage::deserialize($deserializer, $stream) : null;
            return new self(
            $id,
            $date,
            $title,
            $iconColor,
            $topMessage,
            $readInboxMaxId,
            $readOutboxMaxId,
            $unreadCount,
            $unreadMentionsCount,
            $unreadReactionsCount,
            $fromId,
            $notifySettings,
            $my,
            $closed,
            $pinned,
            $short,
            $hidden,
            $iconEmojiId,
            $draft
        );
    }
}