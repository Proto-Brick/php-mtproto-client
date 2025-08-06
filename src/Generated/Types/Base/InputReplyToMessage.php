<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputReplyToMessage
 */
final class InputReplyToMessage extends AbstractInputReplyTo
{
    public const CONSTRUCTOR_ID = 0x22c0f6d5;
    
    public string $_ = 'inputReplyToMessage';
    
    /**
     * @param int $replyToMsgId
     * @param int|null $topMsgId
     * @param AbstractInputPeer|null $replyToPeerId
     * @param string|null $quoteText
     * @param list<AbstractMessageEntity>|null $quoteEntities
     * @param int|null $quoteOffset
     */
    public function __construct(
        public readonly int $replyToMsgId,
        public readonly ?int $topMsgId = null,
        public readonly ?AbstractInputPeer $replyToPeerId = null,
        public readonly ?string $quoteText = null,
        public readonly ?array $quoteEntities = null,
        public readonly ?int $quoteOffset = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        if ($this->replyToPeerId !== null) $flags |= (1 << 1);
        if ($this->quoteText !== null) $flags |= (1 << 2);
        if ($this->quoteEntities !== null) $flags |= (1 << 3);
        if ($this->quoteOffset !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->replyToMsgId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->topMsgId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->replyToPeerId->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->quoteText);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->quoteEntities);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->quoteOffset);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $replyToMsgId = $deserializer->int32($stream);
        $topMsgId = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $replyToPeerId = ($flags & (1 << 1)) ? AbstractInputPeer::deserialize($deserializer, $stream) : null;
        $quoteText = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $quoteEntities = ($flags & (1 << 3)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $quoteOffset = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        return new self(
            $replyToMsgId,
            $topMsgId,
            $replyToPeerId,
            $quoteText,
            $quoteEntities,
            $quoteOffset
        );
    }
}