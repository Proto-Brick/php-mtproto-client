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
    public const CONSTRUCTOR_ID = 3582593222;
    
    public string $_ = 'dialog';
    
    /**
     * @param AbstractPeer $peer
     * @param int $topMessage
     * @param int $readInboxMaxId
     * @param int $readOutboxMaxId
     * @param int $unreadCount
     * @param int $unreadMentionsCount
     * @param int $unreadReactionsCount
     * @param AbstractPeerNotifySettings $notifySettings
     * @param bool|null $pinned
     * @param bool|null $unreadMark
     * @param bool|null $viewForumAsMessages
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
        public readonly AbstractPeerNotifySettings $notifySettings,
        public readonly ?bool $pinned = null,
        public readonly ?bool $unreadMark = null,
        public readonly ?bool $viewForumAsMessages = null,
        public readonly ?int $pts = null,
        public readonly ?AbstractDraftMessage $draft = null,
        public readonly ?int $folderId = null,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 2);
        if ($this->unreadMark) $flags |= (1 << 3);
        if ($this->viewForumAsMessages) $flags |= (1 << 6);
        if ($this->pts !== null) $flags |= (1 << 0);
        if ($this->draft !== null) $flags |= (1 << 1);
        if ($this->folderId !== null) $flags |= (1 << 4);
        if ($this->ttlPeriod !== null) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->topMessage);
        $buffer .= $serializer->int32($this->readInboxMaxId);
        $buffer .= $serializer->int32($this->readOutboxMaxId);
        $buffer .= $serializer->int32($this->unreadCount);
        $buffer .= $serializer->int32($this->unreadMentionsCount);
        $buffer .= $serializer->int32($this->unreadReactionsCount);
        $buffer .= $this->notifySettings->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->pts);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->draft->serialize($serializer);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->folderId);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->int32($this->ttlPeriod);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pinned = ($flags & (1 << 2)) ? true : null;
        $unreadMark = ($flags & (1 << 3)) ? true : null;
        $viewForumAsMessages = ($flags & (1 << 6)) ? true : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $topMessage = $deserializer->int32($stream);
        $readInboxMaxId = $deserializer->int32($stream);
        $readOutboxMaxId = $deserializer->int32($stream);
        $unreadCount = $deserializer->int32($stream);
        $unreadMentionsCount = $deserializer->int32($stream);
        $unreadReactionsCount = $deserializer->int32($stream);
        $notifySettings = AbstractPeerNotifySettings::deserialize($deserializer, $stream);
        $pts = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $draft = ($flags & (1 << 1)) ? AbstractDraftMessage::deserialize($deserializer, $stream) : null;
        $folderId = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $ttlPeriod = ($flags & (1 << 5)) ? $deserializer->int32($stream) : null;
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