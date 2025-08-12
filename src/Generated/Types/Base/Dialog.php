<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/dialog
 */
final class Dialog extends AbstractDialog
{
    public const CONSTRUCTOR_ID = 0xd58a08c6;
    
    public string $predicate = 'dialog';
    
    /**
     * @param AbstractPeer $peer
     * @param int $topMessage
     * @param int $readInboxMaxId
     * @param int $readOutboxMaxId
     * @param int $unreadCount
     * @param int $unreadMentionsCount
     * @param int $unreadReactionsCount
     * @param PeerNotifySettings $notifySettings
     * @param true|null $pinned
     * @param true|null $unreadMark
     * @param true|null $viewForumAsMessages
     * @param int|null $pts
     * @param AbstractDraftMessage|null $draft
     * @param int|null $folderId
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $topMessage,
        public readonly int $readInboxMaxId,
        public readonly int $readOutboxMaxId,
        public readonly int $unreadCount,
        public readonly int $unreadMentionsCount,
        public readonly int $unreadReactionsCount,
        public readonly PeerNotifySettings $notifySettings,
        public readonly ?true $pinned = null,
        public readonly ?true $unreadMark = null,
        public readonly ?true $viewForumAsMessages = null,
        public readonly ?int $pts = null,
        public readonly ?AbstractDraftMessage $draft = null,
        public readonly ?int $folderId = null,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 2);
        if ($this->unreadMark) $flags |= (1 << 3);
        if ($this->viewForumAsMessages) $flags |= (1 << 6);
        if ($this->pts !== null) $flags |= (1 << 0);
        if ($this->draft !== null) $flags |= (1 << 1);
        if ($this->folderId !== null) $flags |= (1 << 4);
        if ($this->ttlPeriod !== null) $flags |= (1 << 5);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topMessage);
        $buffer .= Serializer::int32($this->readInboxMaxId);
        $buffer .= Serializer::int32($this->readOutboxMaxId);
        $buffer .= Serializer::int32($this->unreadCount);
        $buffer .= Serializer::int32($this->unreadMentionsCount);
        $buffer .= Serializer::int32($this->unreadReactionsCount);
        $buffer .= $this->notifySettings->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->pts);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->draft->serialize();
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $pinned = ($flags & (1 << 2)) ? true : null;
        $unreadMark = ($flags & (1 << 3)) ? true : null;
        $viewForumAsMessages = ($flags & (1 << 6)) ? true : null;
        $peer = AbstractPeer::deserialize($stream);
        $topMessage = Deserializer::int32($stream);
        $readInboxMaxId = Deserializer::int32($stream);
        $readOutboxMaxId = Deserializer::int32($stream);
        $unreadCount = Deserializer::int32($stream);
        $unreadMentionsCount = Deserializer::int32($stream);
        $unreadReactionsCount = Deserializer::int32($stream);
        $notifySettings = PeerNotifySettings::deserialize($stream);
        $pts = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $draft = ($flags & (1 << 1)) ? AbstractDraftMessage::deserialize($stream) : null;
        $folderId = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $ttlPeriod = ($flags & (1 << 5)) ? Deserializer::int32($stream) : null;

        return new self(
            $peer,
            $topMessage,
            $readInboxMaxId,
            $readOutboxMaxId,
            $unreadCount,
            $unreadMentionsCount,
            $unreadReactionsCount,
            $notifySettings,
            $pinned,
            $unreadMark,
            $viewForumAsMessages,
            $pts,
            $draft,
            $folderId,
            $ttlPeriod
        );
    }
}