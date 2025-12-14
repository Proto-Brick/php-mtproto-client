<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageService
 */
final class MessageService extends AbstractMessage
{
    public const CONSTRUCTOR_ID = 0x7a800e0a;
    
    public string $predicate = 'messageService';
    
    /**
     * @param int $id
     * @param AbstractPeer $peerId
     * @param int $date
     * @param AbstractMessageAction $action
     * @param true|null $out
     * @param true|null $mentioned
     * @param true|null $mediaUnread
     * @param true|null $reactionsArePossible
     * @param true|null $silent
     * @param true|null $post
     * @param true|null $legacy
     * @param AbstractPeer|null $fromId
     * @param AbstractPeer|null $savedPeerId
     * @param AbstractMessageReplyHeader|null $replyTo
     * @param MessageReactions|null $reactions
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractPeer $peerId,
        public readonly int $date,
        public readonly AbstractMessageAction $action,
        public readonly ?true $out = null,
        public readonly ?true $mentioned = null,
        public readonly ?true $mediaUnread = null,
        public readonly ?true $reactionsArePossible = null,
        public readonly ?true $silent = null,
        public readonly ?true $post = null,
        public readonly ?true $legacy = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?AbstractPeer $savedPeerId = null,
        public readonly ?AbstractMessageReplyHeader $replyTo = null,
        public readonly ?MessageReactions $reactions = null,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->out) {
            $flags |= (1 << 1);
        }
        if ($this->mentioned) {
            $flags |= (1 << 4);
        }
        if ($this->mediaUnread) {
            $flags |= (1 << 5);
        }
        if ($this->reactionsArePossible) {
            $flags |= (1 << 9);
        }
        if ($this->silent) {
            $flags |= (1 << 13);
        }
        if ($this->post) {
            $flags |= (1 << 14);
        }
        if ($this->legacy) {
            $flags |= (1 << 19);
        }
        if ($this->fromId !== null) {
            $flags |= (1 << 8);
        }
        if ($this->savedPeerId !== null) {
            $flags |= (1 << 28);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 3);
        }
        if ($this->reactions !== null) {
            $flags |= (1 << 20);
        }
        if ($this->ttlPeriod !== null) {
            $flags |= (1 << 25);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 8)) {
            $buffer .= $this->fromId->serialize();
        }
        $buffer .= $this->peerId->serialize();
        if ($flags & (1 << 28)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->replyTo->serialize();
        }
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->action->serialize();
        if ($flags & (1 << 20)) {
            $buffer .= $this->reactions->serialize();
        }
        if ($flags & (1 << 25)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $out = (($flags & (1 << 1)) !== 0) ? true : null;
        $mentioned = (($flags & (1 << 4)) !== 0) ? true : null;
        $mediaUnread = (($flags & (1 << 5)) !== 0) ? true : null;
        $reactionsArePossible = (($flags & (1 << 9)) !== 0) ? true : null;
        $silent = (($flags & (1 << 13)) !== 0) ? true : null;
        $post = (($flags & (1 << 14)) !== 0) ? true : null;
        $legacy = (($flags & (1 << 19)) !== 0) ? true : null;
        $id = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $fromId = (($flags & (1 << 8)) !== 0) ? AbstractPeer::deserialize($stream) : null;
        $peerId = AbstractPeer::deserialize($stream);
        $savedPeerId = (($flags & (1 << 28)) !== 0) ? AbstractPeer::deserialize($stream) : null;
        $replyTo = (($flags & (1 << 3)) !== 0) ? AbstractMessageReplyHeader::deserialize($stream) : null;
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $action = AbstractMessageAction::deserialize($stream);
        $reactions = (($flags & (1 << 20)) !== 0) ? MessageReactions::deserialize($stream) : null;
        $ttlPeriod = (($flags & (1 << 25)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $id,
            $peerId,
            $date,
            $action,
            $out,
            $mentioned,
            $mediaUnread,
            $reactionsArePossible,
            $silent,
            $post,
            $legacy,
            $fromId,
            $savedPeerId,
            $replyTo,
            $reactions,
            $ttlPeriod
        );
    }
}