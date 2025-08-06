<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageReplyHeader
 */
final class MessageReplyHeader extends AbstractMessageReplyHeader
{
    public const CONSTRUCTOR_ID = 0xafbc09db;
    
    public string $_ = 'messageReplyHeader';
    
    /**
     * @param bool|null $replyToScheduled
     * @param bool|null $forumTopic
     * @param bool|null $quote
     * @param int|null $replyToMsgId
     * @param AbstractPeer|null $replyToPeerId
     * @param MessageFwdHeader|null $replyFrom
     * @param AbstractMessageMedia|null $replyMedia
     * @param int|null $replyToTopId
     * @param string|null $quoteText
     * @param list<AbstractMessageEntity>|null $quoteEntities
     * @param int|null $quoteOffset
     */
    public function __construct(
        public readonly ?bool $replyToScheduled = null,
        public readonly ?bool $forumTopic = null,
        public readonly ?bool $quote = null,
        public readonly ?int $replyToMsgId = null,
        public readonly ?AbstractPeer $replyToPeerId = null,
        public readonly ?MessageFwdHeader $replyFrom = null,
        public readonly ?AbstractMessageMedia $replyMedia = null,
        public readonly ?int $replyToTopId = null,
        public readonly ?string $quoteText = null,
        public readonly ?array $quoteEntities = null,
        public readonly ?int $quoteOffset = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyToScheduled) $flags |= (1 << 2);
        if ($this->forumTopic) $flags |= (1 << 3);
        if ($this->quote) $flags |= (1 << 9);
        if ($this->replyToMsgId !== null) $flags |= (1 << 4);
        if ($this->replyToPeerId !== null) $flags |= (1 << 0);
        if ($this->replyFrom !== null) $flags |= (1 << 5);
        if ($this->replyMedia !== null) $flags |= (1 << 8);
        if ($this->replyToTopId !== null) $flags |= (1 << 1);
        if ($this->quoteText !== null) $flags |= (1 << 6);
        if ($this->quoteEntities !== null) $flags |= (1 << 7);
        if ($this->quoteOffset !== null) $flags |= (1 << 10);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->replyToMsgId);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyToPeerId->serialize($serializer);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->replyFrom->serialize($serializer);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->replyMedia->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->replyToTopId);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->bytes($this->quoteText);
        }
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->vectorOfObjects($this->quoteEntities);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->int32($this->quoteOffset);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $replyToScheduled = ($flags & (1 << 2)) ? true : null;
        $forumTopic = ($flags & (1 << 3)) ? true : null;
        $quote = ($flags & (1 << 9)) ? true : null;
        $replyToMsgId = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $replyToPeerId = ($flags & (1 << 0)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $replyFrom = ($flags & (1 << 5)) ? MessageFwdHeader::deserialize($deserializer, $stream) : null;
        $replyMedia = ($flags & (1 << 8)) ? AbstractMessageMedia::deserialize($deserializer, $stream) : null;
        $replyToTopId = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $quoteText = ($flags & (1 << 6)) ? $deserializer->bytes($stream) : null;
        $quoteEntities = ($flags & (1 << 7)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $quoteOffset = ($flags & (1 << 10)) ? $deserializer->int32($stream) : null;
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
            $quoteOffset
        );
    }
}