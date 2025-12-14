<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/forumTopic
 */
final class ForumTopic extends AbstractForumTopic
{
    public const CONSTRUCTOR_ID = 0x71701da9;
    
    public string $predicate = 'forumTopic';
    
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
     * @param PeerNotifySettings $notifySettings
     * @param true|null $my
     * @param true|null $closed
     * @param true|null $pinned
     * @param true|null $short
     * @param true|null $hidden
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
        public readonly PeerNotifySettings $notifySettings,
        public readonly ?true $my = null,
        public readonly ?true $closed = null,
        public readonly ?true $pinned = null,
        public readonly ?true $short = null,
        public readonly ?true $hidden = null,
        public readonly ?int $iconEmojiId = null,
        public readonly ?AbstractDraftMessage $draft = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->my) {
            $flags |= (1 << 1);
        }
        if ($this->closed) {
            $flags |= (1 << 2);
        }
        if ($this->pinned) {
            $flags |= (1 << 3);
        }
        if ($this->short) {
            $flags |= (1 << 5);
        }
        if ($this->hidden) {
            $flags |= (1 << 6);
        }
        if ($this->iconEmojiId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->draft !== null) {
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::int32($this->iconColor);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->iconEmojiId);
        }
        $buffer .= Serializer::int32($this->topMessage);
        $buffer .= Serializer::int32($this->readInboxMaxId);
        $buffer .= Serializer::int32($this->readOutboxMaxId);
        $buffer .= Serializer::int32($this->unreadCount);
        $buffer .= Serializer::int32($this->unreadMentionsCount);
        $buffer .= Serializer::int32($this->unreadReactionsCount);
        $buffer .= $this->fromId->serialize();
        $buffer .= $this->notifySettings->serialize();
        if ($flags & (1 << 4)) {
            $buffer .= $this->draft->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $my = (($flags & (1 << 1)) !== 0) ? true : null;
        $closed = (($flags & (1 << 2)) !== 0) ? true : null;
        $pinned = (($flags & (1 << 3)) !== 0) ? true : null;
        $short = (($flags & (1 << 5)) !== 0) ? true : null;
        $hidden = (($flags & (1 << 6)) !== 0) ? true : null;
        $id = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $title = Deserializer::bytes($stream);
        $iconColor = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $iconEmojiId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;
        $topMessage = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $readInboxMaxId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $readOutboxMaxId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $unreadCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $unreadMentionsCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $unreadReactionsCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $fromId = AbstractPeer::deserialize($stream);
        $notifySettings = PeerNotifySettings::deserialize($stream);
        $draft = (($flags & (1 << 4)) !== 0) ? AbstractDraftMessage::deserialize($stream) : null;

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