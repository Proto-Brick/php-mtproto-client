<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/monoForumDialog
 */
final class MonoForumDialog extends AbstractSavedDialog
{
    public const CONSTRUCTOR_ID = 0x64407ea7;
    
    public string $predicate = 'monoForumDialog';
    
    /**
     * @param AbstractPeer $peer
     * @param int $topMessage
     * @param int $readInboxMaxId
     * @param int $readOutboxMaxId
     * @param int $unreadCount
     * @param int $unreadReactionsCount
     * @param true|null $unreadMark
     * @param true|null $nopaidMessagesException
     * @param AbstractDraftMessage|null $draft
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $topMessage,
        public readonly int $readInboxMaxId,
        public readonly int $readOutboxMaxId,
        public readonly int $unreadCount,
        public readonly int $unreadReactionsCount,
        public readonly ?true $unreadMark = null,
        public readonly ?true $nopaidMessagesException = null,
        public readonly ?AbstractDraftMessage $draft = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unreadMark) $flags |= (1 << 3);
        if ($this->nopaidMessagesException) $flags |= (1 << 4);
        if ($this->draft !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topMessage);
        $buffer .= Serializer::int32($this->readInboxMaxId);
        $buffer .= Serializer::int32($this->readOutboxMaxId);
        $buffer .= Serializer::int32($this->unreadCount);
        $buffer .= Serializer::int32($this->unreadReactionsCount);
        if ($flags & (1 << 1)) {
            $buffer .= $this->draft->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $unreadMark = ($flags & (1 << 3)) ? true : null;
        $nopaidMessagesException = ($flags & (1 << 4)) ? true : null;
        $peer = AbstractPeer::deserialize($stream);
        $topMessage = Deserializer::int32($stream);
        $readInboxMaxId = Deserializer::int32($stream);
        $readOutboxMaxId = Deserializer::int32($stream);
        $unreadCount = Deserializer::int32($stream);
        $unreadReactionsCount = Deserializer::int32($stream);
        $draft = ($flags & (1 << 1)) ? AbstractDraftMessage::deserialize($stream) : null;

        return new self(
            $peer,
            $topMessage,
            $readInboxMaxId,
            $readOutboxMaxId,
            $unreadCount,
            $unreadReactionsCount,
            $unreadMark,
            $nopaidMessagesException,
            $draft
        );
    }
}