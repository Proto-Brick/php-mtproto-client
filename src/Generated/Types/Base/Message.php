<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/message
 */
final class Message extends AbstractMessage
{
    public const CONSTRUCTOR_ID = 0x94345242;
    
    public string $_ = 'message';
    
    /**
     * @param int $id
     * @param AbstractPeer $peerId
     * @param int $date
     * @param string $message
     * @param bool|null $out
     * @param bool|null $mentioned
     * @param bool|null $mediaUnread
     * @param bool|null $silent
     * @param bool|null $post
     * @param bool|null $fromScheduled
     * @param bool|null $legacy
     * @param bool|null $editHide
     * @param bool|null $pinned
     * @param bool|null $noforwards
     * @param bool|null $invertMedia
     * @param bool|null $offline
     * @param bool|null $videoProcessingPending
     * @param AbstractPeer|null $fromId
     * @param int|null $fromBoostsApplied
     * @param AbstractPeer|null $savedPeerId
     * @param MessageFwdHeader|null $fwdFrom
     * @param int|null $viaBotId
     * @param int|null $viaBusinessBotId
     * @param AbstractMessageReplyHeader|null $replyTo
     * @param AbstractMessageMedia|null $media
     * @param AbstractReplyMarkup|null $replyMarkup
     * @param list<AbstractMessageEntity>|null $entities
     * @param int|null $views
     * @param int|null $forwards
     * @param MessageReplies|null $replies
     * @param int|null $editDate
     * @param string|null $postAuthor
     * @param int|null $groupedId
     * @param MessageReactions|null $reactions
     * @param list<RestrictionReason>|null $restrictionReason
     * @param int|null $ttlPeriod
     * @param int|null $quickReplyShortcutId
     * @param int|null $effect
     * @param FactCheck|null $factcheck
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractPeer $peerId,
        public readonly int $date,
        public readonly string $message,
        public readonly ?bool $out = null,
        public readonly ?bool $mentioned = null,
        public readonly ?bool $mediaUnread = null,
        public readonly ?bool $silent = null,
        public readonly ?bool $post = null,
        public readonly ?bool $fromScheduled = null,
        public readonly ?bool $legacy = null,
        public readonly ?bool $editHide = null,
        public readonly ?bool $pinned = null,
        public readonly ?bool $noforwards = null,
        public readonly ?bool $invertMedia = null,
        public readonly ?bool $offline = null,
        public readonly ?bool $videoProcessingPending = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?int $fromBoostsApplied = null,
        public readonly ?AbstractPeer $savedPeerId = null,
        public readonly ?MessageFwdHeader $fwdFrom = null,
        public readonly ?int $viaBotId = null,
        public readonly ?int $viaBusinessBotId = null,
        public readonly ?AbstractMessageReplyHeader $replyTo = null,
        public readonly ?AbstractMessageMedia $media = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null,
        public readonly ?array $entities = null,
        public readonly ?int $views = null,
        public readonly ?int $forwards = null,
        public readonly ?MessageReplies $replies = null,
        public readonly ?int $editDate = null,
        public readonly ?string $postAuthor = null,
        public readonly ?int $groupedId = null,
        public readonly ?MessageReactions $reactions = null,
        public readonly ?array $restrictionReason = null,
        public readonly ?int $ttlPeriod = null,
        public readonly ?int $quickReplyShortcutId = null,
        public readonly ?int $effect = null,
        public readonly ?FactCheck $factcheck = null
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
        if ($this->fromScheduled) $flags |= (1 << 18);
        if ($this->legacy) $flags |= (1 << 19);
        if ($this->editHide) $flags |= (1 << 21);
        if ($this->pinned) $flags |= (1 << 24);
        if ($this->noforwards) $flags |= (1 << 26);
        if ($this->invertMedia) $flags |= (1 << 27);
        if ($this->fromId !== null) $flags |= (1 << 8);
        if ($this->fromBoostsApplied !== null) $flags |= (1 << 29);
        if ($this->savedPeerId !== null) $flags |= (1 << 28);
        if ($this->fwdFrom !== null) $flags |= (1 << 2);
        if ($this->viaBotId !== null) $flags |= (1 << 11);
        if ($this->replyTo !== null) $flags |= (1 << 3);
        if ($this->media !== null) $flags |= (1 << 9);
        if ($this->replyMarkup !== null) $flags |= (1 << 6);
        if ($this->entities !== null) $flags |= (1 << 7);
        if ($this->views !== null) $flags |= (1 << 10);
        if ($this->forwards !== null) $flags |= (1 << 10);
        if ($this->replies !== null) $flags |= (1 << 23);
        if ($this->editDate !== null) $flags |= (1 << 15);
        if ($this->postAuthor !== null) $flags |= (1 << 16);
        if ($this->groupedId !== null) $flags |= (1 << 17);
        if ($this->reactions !== null) $flags |= (1 << 20);
        if ($this->restrictionReason !== null) $flags |= (1 << 22);
        if ($this->ttlPeriod !== null) $flags |= (1 << 25);
        if ($this->quickReplyShortcutId !== null) $flags |= (1 << 30);
        $buffer .= $serializer->int32($flags);
        $flags2 = 0;
        if ($this->offline) $flags2 |= (1 << 1);
        if ($this->videoProcessingPending) $flags2 |= (1 << 4);
        if ($this->viaBusinessBotId !== null) $flags2 |= (1 << 0);
        if ($this->effect !== null) $flags2 |= (1 << 2);
        if ($this->factcheck !== null) $flags2 |= (1 << 3);
        $buffer .= $serializer->int32($flags2);

        $buffer .= $serializer->int32($this->id);
        if ($flags & (1 << 8)) {
            $buffer .= $this->fromId->serialize($serializer);
        }
        if ($flags & (1 << 29)) {
            $buffer .= $serializer->int32($this->fromBoostsApplied);
        }
        $buffer .= $this->peerId->serialize($serializer);
        if ($flags & (1 << 28)) {
            $buffer .= $this->savedPeerId->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->fwdFrom->serialize($serializer);
        }
        if ($flags & (1 << 11)) {
            $buffer .= $serializer->int64($this->viaBotId);
        }
        if ($flags2 & (1 << 0)) {
            $buffer .= $serializer->int64($this->viaBusinessBotId);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->replyTo->serialize($serializer);
        }
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 9)) {
            $buffer .= $this->media->serialize($serializer);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->int32($this->views);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->int32($this->forwards);
        }
        if ($flags & (1 << 23)) {
            $buffer .= $this->replies->serialize($serializer);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $serializer->int32($this->editDate);
        }
        if ($flags & (1 << 16)) {
            $buffer .= $serializer->bytes($this->postAuthor);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $serializer->int64($this->groupedId);
        }
        if ($flags & (1 << 20)) {
            $buffer .= $this->reactions->serialize($serializer);
        }
        if ($flags & (1 << 22)) {
            $buffer .= $serializer->vectorOfObjects($this->restrictionReason);
        }
        if ($flags & (1 << 25)) {
            $buffer .= $serializer->int32($this->ttlPeriod);
        }
        if ($flags & (1 << 30)) {
            $buffer .= $serializer->int32($this->quickReplyShortcutId);
        }
        if ($flags2 & (1 << 2)) {
            $buffer .= $serializer->int64($this->effect);
        }
        if ($flags2 & (1 << 3)) {
            $buffer .= $this->factcheck->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);
        $flags2 = $deserializer->int32($stream);

        $out = ($flags & (1 << 1)) ? true : null;
        $mentioned = ($flags & (1 << 4)) ? true : null;
        $mediaUnread = ($flags & (1 << 5)) ? true : null;
        $silent = ($flags & (1 << 13)) ? true : null;
        $post = ($flags & (1 << 14)) ? true : null;
        $fromScheduled = ($flags & (1 << 18)) ? true : null;
        $legacy = ($flags & (1 << 19)) ? true : null;
        $editHide = ($flags & (1 << 21)) ? true : null;
        $pinned = ($flags & (1 << 24)) ? true : null;
        $noforwards = ($flags & (1 << 26)) ? true : null;
        $invertMedia = ($flags & (1 << 27)) ? true : null;
        $offline = ($flags2 & (1 << 1)) ? true : null;
        $videoProcessingPending = ($flags2 & (1 << 4)) ? true : null;
        $id = $deserializer->int32($stream);
        $fromId = ($flags & (1 << 8)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $fromBoostsApplied = ($flags & (1 << 29)) ? $deserializer->int32($stream) : null;
        $peerId = AbstractPeer::deserialize($deserializer, $stream);
        $savedPeerId = ($flags & (1 << 28)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $fwdFrom = ($flags & (1 << 2)) ? MessageFwdHeader::deserialize($deserializer, $stream) : null;
        $viaBotId = ($flags & (1 << 11)) ? $deserializer->int64($stream) : null;
        $viaBusinessBotId = ($flags2 & (1 << 0)) ? $deserializer->int64($stream) : null;
        $replyTo = ($flags & (1 << 3)) ? AbstractMessageReplyHeader::deserialize($deserializer, $stream) : null;
        $date = $deserializer->int32($stream);
        $message = $deserializer->bytes($stream);
        $media = ($flags & (1 << 9)) ? AbstractMessageMedia::deserialize($deserializer, $stream) : null;
        $replyMarkup = ($flags & (1 << 6)) ? AbstractReplyMarkup::deserialize($deserializer, $stream) : null;
        $entities = ($flags & (1 << 7)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $views = ($flags & (1 << 10)) ? $deserializer->int32($stream) : null;
        $forwards = ($flags & (1 << 10)) ? $deserializer->int32($stream) : null;
        $replies = ($flags & (1 << 23)) ? MessageReplies::deserialize($deserializer, $stream) : null;
        $editDate = ($flags & (1 << 15)) ? $deserializer->int32($stream) : null;
        $postAuthor = ($flags & (1 << 16)) ? $deserializer->bytes($stream) : null;
        $groupedId = ($flags & (1 << 17)) ? $deserializer->int64($stream) : null;
        $reactions = ($flags & (1 << 20)) ? MessageReactions::deserialize($deserializer, $stream) : null;
        $restrictionReason = ($flags & (1 << 22)) ? $deserializer->vectorOfObjects($stream, [RestrictionReason::class, 'deserialize']) : null;
        $ttlPeriod = ($flags & (1 << 25)) ? $deserializer->int32($stream) : null;
        $quickReplyShortcutId = ($flags & (1 << 30)) ? $deserializer->int32($stream) : null;
        $effect = ($flags2 & (1 << 2)) ? $deserializer->int64($stream) : null;
        $factcheck = ($flags2 & (1 << 3)) ? FactCheck::deserialize($deserializer, $stream) : null;
        return new self(
            $id,
            $peerId,
            $date,
            $message,
            $out,
            $mentioned,
            $mediaUnread,
            $silent,
            $post,
            $fromScheduled,
            $legacy,
            $editHide,
            $pinned,
            $noforwards,
            $invertMedia,
            $offline,
            $videoProcessingPending,
            $fromId,
            $fromBoostsApplied,
            $savedPeerId,
            $fwdFrom,
            $viaBotId,
            $viaBusinessBotId,
            $replyTo,
            $media,
            $replyMarkup,
            $entities,
            $views,
            $forwards,
            $replies,
            $editDate,
            $postAuthor,
            $groupedId,
            $reactions,
            $restrictionReason,
            $ttlPeriod,
            $quickReplyShortcutId,
            $effect,
            $factcheck
        );
    }
}