<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputReplyToMessage
 */
final class InputReplyToMessage extends AbstractInputReplyTo
{
    public const CONSTRUCTOR_ID = 0x869fbe10;
    
    public string $predicate = 'inputReplyToMessage';
    
    /**
     * @param int $replyToMsgId
     * @param int|null $topMsgId
     * @param AbstractInputPeer|null $replyToPeerId
     * @param string|null $quoteText
     * @param list<AbstractMessageEntity>|null $quoteEntities
     * @param int|null $quoteOffset
     * @param AbstractInputPeer|null $monoforumPeerId
     * @param int|null $todoItemId
     */
    public function __construct(
        public readonly int $replyToMsgId,
        public readonly ?int $topMsgId = null,
        public readonly ?AbstractInputPeer $replyToPeerId = null,
        public readonly ?string $quoteText = null,
        public readonly ?array $quoteEntities = null,
        public readonly ?int $quoteOffset = null,
        public readonly ?AbstractInputPeer $monoforumPeerId = null,
        public readonly ?int $todoItemId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->replyToPeerId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->quoteText !== null) {
            $flags |= (1 << 2);
        }
        if ($this->quoteEntities !== null) {
            $flags |= (1 << 3);
        }
        if ($this->quoteOffset !== null) {
            $flags |= (1 << 4);
        }
        if ($this->monoforumPeerId !== null) {
            $flags |= (1 << 5);
        }
        if ($this->todoItemId !== null) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->replyToMsgId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->replyToPeerId->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->quoteText);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->quoteEntities);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->quoteOffset);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->monoforumPeerId->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->todoItemId);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $replyToMsgId = Deserializer::int32($stream);
        $topMsgId = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $replyToPeerId = (($flags & (1 << 1)) !== 0) ? AbstractInputPeer::deserialize($stream) : null;
        $quoteText = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $quoteEntities = (($flags & (1 << 3)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $quoteOffset = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($stream) : null;
        $monoforumPeerId = (($flags & (1 << 5)) !== 0) ? AbstractInputPeer::deserialize($stream) : null;
        $todoItemId = (($flags & (1 << 6)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $replyToMsgId,
            $topMsgId,
            $replyToPeerId,
            $quoteText,
            $quoteEntities,
            $quoteOffset,
            $monoforumPeerId,
            $todoItemId
        );
    }
}