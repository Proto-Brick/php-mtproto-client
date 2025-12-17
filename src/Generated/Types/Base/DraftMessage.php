<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/draftMessage
 */
final class DraftMessage extends AbstractDraftMessage
{
    public const CONSTRUCTOR_ID = 0x96eaa5eb;
    
    public string $predicate = 'draftMessage';
    
    /**
     * @param string $message
     * @param int $date
     * @param true|null $noWebpage
     * @param true|null $invertMedia
     * @param AbstractInputReplyTo|null $replyTo
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractInputMedia|null $media
     * @param int|null $effect
     * @param SuggestedPost|null $suggestedPost
     */
    public function __construct(
        public readonly string $message,
        public readonly int $date,
        public readonly ?true $noWebpage = null,
        public readonly ?true $invertMedia = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractInputMedia $media = null,
        public readonly ?int $effect = null,
        public readonly ?SuggestedPost $suggestedPost = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) {
            $flags |= (1 << 1);
        }
        if ($this->invertMedia) {
            $flags |= (1 << 6);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 4);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 3);
        }
        if ($this->media !== null) {
            $flags |= (1 << 5);
        }
        if ($this->effect !== null) {
            $flags |= (1 << 7);
        }
        if ($this->suggestedPost !== null) {
            $flags |= (1 << 8);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 4)) {
            $buffer .= $this->replyTo->serialize();
        }
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->media->serialize();
        }
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int64($this->effect);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->suggestedPost->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $noWebpage = (($flags & (1 << 1)) !== 0) ? true : null;
        $invertMedia = (($flags & (1 << 6)) !== 0) ? true : null;
        $replyTo = (($flags & (1 << 4)) !== 0) ? AbstractInputReplyTo::deserialize($__payload, $__offset) : null;
        $message = Deserializer::bytes($__payload, $__offset);
        $entities = (($flags & (1 << 3)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']) : null;
        $media = (($flags & (1 << 5)) !== 0) ? AbstractInputMedia::deserialize($__payload, $__offset) : null;
        $date = Deserializer::int32($__payload, $__offset);
        $effect = (($flags & (1 << 7)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $suggestedPost = (($flags & (1 << 8)) !== 0) ? SuggestedPost::deserialize($__payload, $__offset) : null;

        return new self(
            $message,
            $date,
            $noWebpage,
            $invertMedia,
            $replyTo,
            $entities,
            $media,
            $effect,
            $suggestedPost
        );
    }
}