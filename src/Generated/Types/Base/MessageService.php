<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageService
 */
final class MessageService extends AbstractMessage
{
    public const CONSTRUCTOR_ID = 0x2b085862;
    
    public string $_ = 'messageService';
    
    /**
     * @param int $id
     * @param AbstractPeer $peerId
     * @param int $date
     * @param AbstractMessageAction $action
     * @param bool|null $out
     * @param bool|null $mentioned
     * @param bool|null $mediaUnread
     * @param bool|null $silent
     * @param bool|null $post
     * @param bool|null $legacy
     * @param AbstractPeer|null $fromId
     * @param AbstractMessageReplyHeader|null $replyTo
     * @param int|null $ttlPeriod
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractPeer $peerId,
        public readonly int $date,
        public readonly AbstractMessageAction $action,
        public readonly ?bool $out = null,
        public readonly ?bool $mentioned = null,
        public readonly ?bool $mediaUnread = null,
        public readonly ?bool $silent = null,
        public readonly ?bool $post = null,
        public readonly ?bool $legacy = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?AbstractMessageReplyHeader $replyTo = null,
        public readonly ?int $ttlPeriod = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->out) $flags |= (1 << 1);
        if ($this->mentioned) $flags |= (1 << 4);
        if ($this->mediaUnread) $flags |= (1 << 5);
        if ($this->silent) $flags |= (1 << 13);
        if ($this->post) $flags |= (1 << 14);
        if ($this->legacy) $flags |= (1 << 19);
        if ($this->fromId !== null) $flags |= (1 << 8);
        if ($this->replyTo !== null) $flags |= (1 << 3);
        if ($this->ttlPeriod !== null) $flags |= (1 << 25);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        if ($flags & (1 << 8)) {
            $buffer .= $this->fromId->serialize($serializer);
        }
        $buffer .= $this->peerId->serialize($serializer);
        if ($flags & (1 << 3)) {
            $buffer .= $this->replyTo->serialize($serializer);
        }
        $buffer .= $serializer->int32($this->date);
        $buffer .= $this->action->serialize($serializer);
        if ($flags & (1 << 25)) {
            $buffer .= $serializer->int32($this->ttlPeriod);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $out = ($flags & (1 << 1)) ? true : null;
        $mentioned = ($flags & (1 << 4)) ? true : null;
        $mediaUnread = ($flags & (1 << 5)) ? true : null;
        $silent = ($flags & (1 << 13)) ? true : null;
        $post = ($flags & (1 << 14)) ? true : null;
        $legacy = ($flags & (1 << 19)) ? true : null;
        $id = $deserializer->int32($stream);
        $fromId = ($flags & (1 << 8)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $peerId = AbstractPeer::deserialize($deserializer, $stream);
        $replyTo = ($flags & (1 << 3)) ? AbstractMessageReplyHeader::deserialize($deserializer, $stream) : null;
        $date = $deserializer->int32($stream);
        $action = AbstractMessageAction::deserialize($deserializer, $stream);
        $ttlPeriod = ($flags & (1 << 25)) ? $deserializer->int32($stream) : null;
        return new self(
            $id,
            $peerId,
            $date,
            $action,
            $out,
            $mentioned,
            $mediaUnread,
            $silent,
            $post,
            $legacy,
            $fromId,
            $replyTo,
            $ttlPeriod
        );
    }
}