<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageReplyHeader
 */
final class MessageReplyHeader extends AbstractMessageReplyHeader
{
    public const CONSTRUCTOR_ID = 0x6917560b;
    
    public string $predicate = 'messageReplyHeader';
    
    /**
     * @param true|null $replyToScheduled
     * @param true|null $forumTopic
     * @param true|null $quote
     * @param int|null $replyToMsgId
     * @param AbstractPeer|null $replyToPeerId
     * @param MessageFwdHeader|null $replyFrom
     * @param AbstractMessageMedia|null $replyMedia
     * @param int|null $replyToTopId
     * @param string|null $quoteText
     * @param list<AbstractMessageEntity>|null $quoteEntities
     * @param int|null $quoteOffset
     * @param int|null $todoItemId
     */
    public function __construct(
        public readonly ?true $replyToScheduled = null,
        public readonly ?true $forumTopic = null,
        public readonly ?true $quote = null,
        public readonly ?int $replyToMsgId = null,
        public readonly ?AbstractPeer $replyToPeerId = null,
        public readonly ?MessageFwdHeader $replyFrom = null,
        public readonly ?AbstractMessageMedia $replyMedia = null,
        public readonly ?int $replyToTopId = null,
        public readonly ?string $quoteText = null,
        public readonly ?array $quoteEntities = null,
        public readonly ?int $quoteOffset = null,
        public readonly ?int $todoItemId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyToScheduled) {
            $flags |= (1 << 2);
        }
        if ($this->forumTopic) {
            $flags |= (1 << 3);
        }
        if ($this->quote) {
            $flags |= (1 << 9);
        }
        if ($this->replyToMsgId !== null) {
            $flags |= (1 << 4);
        }
        if ($this->replyToPeerId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->replyFrom !== null) {
            $flags |= (1 << 5);
        }
        if ($this->replyMedia !== null) {
            $flags |= (1 << 8);
        }
        if ($this->replyToTopId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->quoteText !== null) {
            $flags |= (1 << 6);
        }
        if ($this->quoteEntities !== null) {
            $flags |= (1 << 7);
        }
        if ($this->quoteOffset !== null) {
            $flags |= (1 << 10);
        }
        if ($this->todoItemId !== null) {
            $flags |= (1 << 11);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->replyToMsgId);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyToPeerId->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->replyFrom->serialize();
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->replyMedia->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->replyToTopId);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::bytes($this->quoteText);
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::vectorOfObjects($this->quoteEntities);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->quoteOffset);
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::int32($this->todoItemId);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $replyToScheduled = (($flags & (1 << 2)) !== 0) ? true : null;
        $forumTopic = (($flags & (1 << 3)) !== 0) ? true : null;
        $quote = (($flags & (1 << 9)) !== 0) ? true : null;
        $replyToMsgId = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $replyToPeerId = (($flags & (1 << 0)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $replyFrom = (($flags & (1 << 5)) !== 0) ? MessageFwdHeader::deserialize($__payload, $__offset) : null;
        $replyMedia = (($flags & (1 << 8)) !== 0) ? AbstractMessageMedia::deserialize($__payload, $__offset) : null;
        $replyToTopId = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $quoteText = (($flags & (1 << 6)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $quoteEntities = (($flags & (1 << 7)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']) : null;
        $quoteOffset = (($flags & (1 << 10)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $todoItemId = (($flags & (1 << 11)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $replyToScheduled,
            $forumTopic,
            $quote,
            $replyToMsgId,
            $replyToPeerId,
            $replyFrom,
            $replyMedia,
            $replyToTopId,
            $quoteText,
            $quoteEntities,
            $quoteOffset,
            $todoItemId
        );
    }
}