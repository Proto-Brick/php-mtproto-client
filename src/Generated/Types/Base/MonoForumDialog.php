<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->unreadMark) {
            $flags |= (1 << 3);
        }
        if ($this->nopaidMessagesException) {
            $flags |= (1 << 4);
        }
        if ($this->draft !== null) {
            $flags |= (1 << 1);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $unreadMark = (($flags & (1 << 3)) !== 0) ? true : null;
        $nopaidMessagesException = (($flags & (1 << 4)) !== 0) ? true : null;
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $topMessage = Deserializer::int32($__payload, $__offset);
        $readInboxMaxId = Deserializer::int32($__payload, $__offset);
        $readOutboxMaxId = Deserializer::int32($__payload, $__offset);
        $unreadCount = Deserializer::int32($__payload, $__offset);
        $unreadReactionsCount = Deserializer::int32($__payload, $__offset);
        $draft = (($flags & (1 << 1)) !== 0) ? AbstractDraftMessage::deserialize($__payload, $__offset) : null;

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