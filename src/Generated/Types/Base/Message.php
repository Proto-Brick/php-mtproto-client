<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/message
 */
final class Message extends AbstractMessage
{
    public const CONSTRUCTOR_ID = 0xb92f76cf;
    
    public string $predicate = 'message';
    
    /**
     * @param int $id
     * @param AbstractPeer $peerId
     * @param int $date
     * @param string $message
     * @param true|null $out
     * @param true|null $mentioned
     * @param true|null $mediaUnread
     * @param true|null $silent
     * @param true|null $post
     * @param true|null $fromScheduled
     * @param true|null $legacy
     * @param true|null $editHide
     * @param true|null $pinned
     * @param true|null $noforwards
     * @param true|null $invertMedia
     * @param true|null $offline
     * @param true|null $videoProcessingPending
     * @param true|null $paidSuggestedPostStars
     * @param true|null $paidSuggestedPostTon
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
     * @param int|null $reportDeliveryUntilDate
     * @param int|null $paidMessageStars
     * @param SuggestedPost|null $suggestedPost
     * @param int|null $scheduleRepeatPeriod
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractPeer $peerId,
        public readonly int $date,
        public readonly string $message,
        public readonly ?true $out = null,
        public readonly ?true $mentioned = null,
        public readonly ?true $mediaUnread = null,
        public readonly ?true $silent = null,
        public readonly ?true $post = null,
        public readonly ?true $fromScheduled = null,
        public readonly ?true $legacy = null,
        public readonly ?true $editHide = null,
        public readonly ?true $pinned = null,
        public readonly ?true $noforwards = null,
        public readonly ?true $invertMedia = null,
        public readonly ?true $offline = null,
        public readonly ?true $videoProcessingPending = null,
        public readonly ?true $paidSuggestedPostStars = null,
        public readonly ?true $paidSuggestedPostTon = null,
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
        public readonly ?FactCheck $factcheck = null,
        public readonly ?int $reportDeliveryUntilDate = null,
        public readonly ?int $paidMessageStars = null,
        public readonly ?SuggestedPost $suggestedPost = null,
        public readonly ?int $scheduleRepeatPeriod = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $flags2 = 0;
        if ($this->out) {
            $flags |= (1 << 1);
        }
        if ($this->mentioned) {
            $flags |= (1 << 4);
        }
        if ($this->mediaUnread) {
            $flags |= (1 << 5);
        }
        if ($this->silent) {
            $flags |= (1 << 13);
        }
        if ($this->post) {
            $flags |= (1 << 14);
        }
        if ($this->fromScheduled) {
            $flags |= (1 << 18);
        }
        if ($this->legacy) {
            $flags |= (1 << 19);
        }
        if ($this->editHide) {
            $flags |= (1 << 21);
        }
        if ($this->pinned) {
            $flags |= (1 << 24);
        }
        if ($this->noforwards) {
            $flags |= (1 << 26);
        }
        if ($this->invertMedia) {
            $flags |= (1 << 27);
        }
        if ($this->offline) {
            $flags2 |= (1 << 1);
        }
        if ($this->videoProcessingPending) {
            $flags2 |= (1 << 4);
        }
        if ($this->paidSuggestedPostStars) {
            $flags2 |= (1 << 8);
        }
        if ($this->paidSuggestedPostTon) {
            $flags2 |= (1 << 9);
        }
        if ($this->fromId !== null) {
            $flags |= (1 << 8);
        }
        if ($this->fromBoostsApplied !== null) {
            $flags |= (1 << 29);
        }
        if ($this->savedPeerId !== null) {
            $flags |= (1 << 28);
        }
        if ($this->fwdFrom !== null) {
            $flags |= (1 << 2);
        }
        if ($this->viaBotId !== null) {
            $flags |= (1 << 11);
        }
        if ($this->viaBusinessBotId !== null) {
            $flags2 |= (1 << 0);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 3);
        }
        if ($this->media !== null) {
            $flags |= (1 << 9);
        }
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 6);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 7);
        }
        if ($this->views !== null) {
            $flags |= (1 << 10);
        }
        if ($this->forwards !== null) {
            $flags |= (1 << 10);
        }
        if ($this->replies !== null) {
            $flags |= (1 << 23);
        }
        if ($this->editDate !== null) {
            $flags |= (1 << 15);
        }
        if ($this->postAuthor !== null) {
            $flags |= (1 << 16);
        }
        if ($this->groupedId !== null) {
            $flags |= (1 << 17);
        }
        if ($this->reactions !== null) {
            $flags |= (1 << 20);
        }
        if ($this->restrictionReason !== null) {
            $flags |= (1 << 22);
        }
        if ($this->ttlPeriod !== null) {
            $flags |= (1 << 25);
        }
        if ($this->quickReplyShortcutId !== null) {
            $flags |= (1 << 30);
        }
        if ($this->effect !== null) {
            $flags2 |= (1 << 2);
        }
        if ($this->factcheck !== null) {
            $flags2 |= (1 << 3);
        }
        if ($this->reportDeliveryUntilDate !== null) {
            $flags2 |= (1 << 5);
        }
        if ($this->paidMessageStars !== null) {
            $flags2 |= (1 << 6);
        }
        if ($this->suggestedPost !== null) {
            $flags2 |= (1 << 7);
        }
        if ($this->scheduleRepeatPeriod !== null) {
            $flags2 |= (1 << 10);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($flags2);
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 8)) {
            $buffer .= $this->fromId->serialize();
        }
        if ($flags & (1 << 29)) {
            $buffer .= Serializer::int32($this->fromBoostsApplied);
        }
        $buffer .= $this->peerId->serialize();
        if ($flags & (1 << 28)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->fwdFrom->serialize();
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::int64($this->viaBotId);
        }
        if ($flags2 & (1 << 0)) {
            $buffer .= Serializer::int64($this->viaBusinessBotId);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->replyTo->serialize();
        }
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 9)) {
            $buffer .= $this->media->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->views);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->forwards);
        }
        if ($flags & (1 << 23)) {
            $buffer .= $this->replies->serialize();
        }
        if ($flags & (1 << 15)) {
            $buffer .= Serializer::int32($this->editDate);
        }
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::bytes($this->postAuthor);
        }
        if ($flags & (1 << 17)) {
            $buffer .= Serializer::int64($this->groupedId);
        }
        if ($flags & (1 << 20)) {
            $buffer .= $this->reactions->serialize();
        }
        if ($flags & (1 << 22)) {
            $buffer .= Serializer::vectorOfObjects($this->restrictionReason);
        }
        if ($flags & (1 << 25)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }
        if ($flags & (1 << 30)) {
            $buffer .= Serializer::int32($this->quickReplyShortcutId);
        }
        if ($flags2 & (1 << 2)) {
            $buffer .= Serializer::int64($this->effect);
        }
        if ($flags2 & (1 << 3)) {
            $buffer .= $this->factcheck->serialize();
        }
        if ($flags2 & (1 << 5)) {
            $buffer .= Serializer::int32($this->reportDeliveryUntilDate);
        }
        if ($flags2 & (1 << 6)) {
            $buffer .= Serializer::int64($this->paidMessageStars);
        }
        if ($flags2 & (1 << 7)) {
            $buffer .= $this->suggestedPost->serialize();
        }
        if ($flags2 & (1 << 10)) {
            $buffer .= Serializer::int32($this->scheduleRepeatPeriod);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $out = (($flags & (1 << 1)) !== 0) ? true : null;
        $mentioned = (($flags & (1 << 4)) !== 0) ? true : null;
        $mediaUnread = (($flags & (1 << 5)) !== 0) ? true : null;
        $silent = (($flags & (1 << 13)) !== 0) ? true : null;
        $post = (($flags & (1 << 14)) !== 0) ? true : null;
        $fromScheduled = (($flags & (1 << 18)) !== 0) ? true : null;
        $legacy = (($flags & (1 << 19)) !== 0) ? true : null;
        $editHide = (($flags & (1 << 21)) !== 0) ? true : null;
        $pinned = (($flags & (1 << 24)) !== 0) ? true : null;
        $noforwards = (($flags & (1 << 26)) !== 0) ? true : null;
        $invertMedia = (($flags & (1 << 27)) !== 0) ? true : null;
        $flags2 = Deserializer::int32($__payload, $__offset);
        $offline = (($flags2 & (1 << 1)) !== 0) ? true : null;
        $videoProcessingPending = (($flags2 & (1 << 4)) !== 0) ? true : null;
        $paidSuggestedPostStars = (($flags2 & (1 << 8)) !== 0) ? true : null;
        $paidSuggestedPostTon = (($flags2 & (1 << 9)) !== 0) ? true : null;
        $id = Deserializer::int32($__payload, $__offset);
        $fromId = (($flags & (1 << 8)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $fromBoostsApplied = (($flags & (1 << 29)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $peerId = AbstractPeer::deserialize($__payload, $__offset);
        $savedPeerId = (($flags & (1 << 28)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $fwdFrom = (($flags & (1 << 2)) !== 0) ? MessageFwdHeader::deserialize($__payload, $__offset) : null;
        $viaBotId = (($flags & (1 << 11)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $viaBusinessBotId = (($flags2 & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $replyTo = (($flags & (1 << 3)) !== 0) ? AbstractMessageReplyHeader::deserialize($__payload, $__offset) : null;
        $date = Deserializer::int32($__payload, $__offset);
        $message = Deserializer::bytes($__payload, $__offset);
        $media = (($flags & (1 << 9)) !== 0) ? AbstractMessageMedia::deserialize($__payload, $__offset) : null;
        $replyMarkup = (($flags & (1 << 6)) !== 0) ? AbstractReplyMarkup::deserialize($__payload, $__offset) : null;
        $entities = (($flags & (1 << 7)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']) : null;
        $views = (($flags & (1 << 10)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $forwards = (($flags & (1 << 10)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $replies = (($flags & (1 << 23)) !== 0) ? MessageReplies::deserialize($__payload, $__offset) : null;
        $editDate = (($flags & (1 << 15)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $postAuthor = (($flags & (1 << 16)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $groupedId = (($flags & (1 << 17)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $reactions = (($flags & (1 << 20)) !== 0) ? MessageReactions::deserialize($__payload, $__offset) : null;
        $restrictionReason = (($flags & (1 << 22)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [RestrictionReason::class, 'deserialize']) : null;
        $ttlPeriod = (($flags & (1 << 25)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $quickReplyShortcutId = (($flags & (1 << 30)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $effect = (($flags2 & (1 << 2)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $factcheck = (($flags2 & (1 << 3)) !== 0) ? FactCheck::deserialize($__payload, $__offset) : null;
        $reportDeliveryUntilDate = (($flags2 & (1 << 5)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $paidMessageStars = (($flags2 & (1 << 6)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $suggestedPost = (($flags2 & (1 << 7)) !== 0) ? SuggestedPost::deserialize($__payload, $__offset) : null;
        $scheduleRepeatPeriod = (($flags2 & (1 << 10)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

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
            $paidSuggestedPostStars,
            $paidSuggestedPostTon,
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
            $factcheck,
            $reportDeliveryUntilDate,
            $paidMessageStars,
            $suggestedPost,
            $scheduleRepeatPeriod
        );
    }
}