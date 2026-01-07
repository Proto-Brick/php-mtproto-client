<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channel
 */
final class Channel extends AbstractChat implements PeerEntity
{
    public const CONSTRUCTOR_ID = 0x1c32b11c;
    
    public string $predicate = 'channel';
    
    public function getPeerType(): string
    {
        return 'channel';
    }
    /**
     * @param int $id
     * @param string $title
     * @param AbstractChatPhoto $photo
     * @param int $date
     * @param true|null $creator
     * @param true|null $left
     * @param true|null $broadcast
     * @param true|null $verified
     * @param true|null $megagroup
     * @param true|null $restricted
     * @param true|null $signatures
     * @param true|null $min
     * @param true|null $scam
     * @param true|null $hasLink
     * @param true|null $hasGeo
     * @param true|null $slowmodeEnabled
     * @param true|null $callActive
     * @param true|null $callNotEmpty
     * @param true|null $fake
     * @param true|null $gigagroup
     * @param true|null $noforwards
     * @param true|null $joinToSend
     * @param true|null $joinRequest
     * @param true|null $forum
     * @param true|null $storiesHidden
     * @param true|null $storiesHiddenMin
     * @param true|null $storiesUnavailable
     * @param true|null $signatureProfiles
     * @param true|null $autotranslation
     * @param true|null $broadcastMessagesAllowed
     * @param true|null $monoforum
     * @param true|null $forumTabs
     * @param int|null $accessHash
     * @param string|null $username
     * @param list<RestrictionReason>|null $restrictionReason
     * @param ChatAdminRights|null $adminRights
     * @param ChatBannedRights|null $bannedRights
     * @param ChatBannedRights|null $defaultBannedRights
     * @param int|null $participantsCount
     * @param list<Username>|null $usernames
     * @param RecentStory|null $storiesMaxId
     * @param AbstractPeerColor|null $color
     * @param AbstractPeerColor|null $profileColor
     * @param AbstractEmojiStatus|null $emojiStatus
     * @param int|null $level
     * @param int|null $subscriptionUntilDate
     * @param int|null $botVerificationIcon
     * @param int|null $sendPaidMessagesStars
     * @param int|null $linkedMonoforumId
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly AbstractChatPhoto $photo,
        public readonly int $date,
        public readonly ?true $creator = null,
        public readonly ?true $left = null,
        public readonly ?true $broadcast = null,
        public readonly ?true $verified = null,
        public readonly ?true $megagroup = null,
        public readonly ?true $restricted = null,
        public readonly ?true $signatures = null,
        public readonly ?true $min = null,
        public readonly ?true $scam = null,
        public readonly ?true $hasLink = null,
        public readonly ?true $hasGeo = null,
        public readonly ?true $slowmodeEnabled = null,
        public readonly ?true $callActive = null,
        public readonly ?true $callNotEmpty = null,
        public readonly ?true $fake = null,
        public readonly ?true $gigagroup = null,
        public readonly ?true $noforwards = null,
        public readonly ?true $joinToSend = null,
        public readonly ?true $joinRequest = null,
        public readonly ?true $forum = null,
        public readonly ?true $storiesHidden = null,
        public readonly ?true $storiesHiddenMin = null,
        public readonly ?true $storiesUnavailable = null,
        public readonly ?true $signatureProfiles = null,
        public readonly ?true $autotranslation = null,
        public readonly ?true $broadcastMessagesAllowed = null,
        public readonly ?true $monoforum = null,
        public readonly ?true $forumTabs = null,
        public readonly ?int $accessHash = null,
        public readonly ?string $username = null,
        public readonly ?array $restrictionReason = null,
        public readonly ?ChatAdminRights $adminRights = null,
        public readonly ?ChatBannedRights $bannedRights = null,
        public readonly ?ChatBannedRights $defaultBannedRights = null,
        public readonly ?int $participantsCount = null,
        public readonly ?array $usernames = null,
        public readonly ?RecentStory $storiesMaxId = null,
        public readonly ?AbstractPeerColor $color = null,
        public readonly ?AbstractPeerColor $profileColor = null,
        public readonly ?AbstractEmojiStatus $emojiStatus = null,
        public readonly ?int $level = null,
        public readonly ?int $subscriptionUntilDate = null,
        public readonly ?int $botVerificationIcon = null,
        public readonly ?int $sendPaidMessagesStars = null,
        public readonly ?int $linkedMonoforumId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $flags2 = 0;
        if ($this->creator) {
            $flags |= (1 << 0);
        }
        if ($this->left) {
            $flags |= (1 << 2);
        }
        if ($this->broadcast) {
            $flags |= (1 << 5);
        }
        if ($this->verified) {
            $flags |= (1 << 7);
        }
        if ($this->megagroup) {
            $flags |= (1 << 8);
        }
        if ($this->restricted) {
            $flags |= (1 << 9);
        }
        if ($this->signatures) {
            $flags |= (1 << 11);
        }
        if ($this->min) {
            $flags |= (1 << 12);
        }
        if ($this->scam) {
            $flags |= (1 << 19);
        }
        if ($this->hasLink) {
            $flags |= (1 << 20);
        }
        if ($this->hasGeo) {
            $flags |= (1 << 21);
        }
        if ($this->slowmodeEnabled) {
            $flags |= (1 << 22);
        }
        if ($this->callActive) {
            $flags |= (1 << 23);
        }
        if ($this->callNotEmpty) {
            $flags |= (1 << 24);
        }
        if ($this->fake) {
            $flags |= (1 << 25);
        }
        if ($this->gigagroup) {
            $flags |= (1 << 26);
        }
        if ($this->noforwards) {
            $flags |= (1 << 27);
        }
        if ($this->joinToSend) {
            $flags |= (1 << 28);
        }
        if ($this->joinRequest) {
            $flags |= (1 << 29);
        }
        if ($this->forum) {
            $flags |= (1 << 30);
        }
        if ($this->storiesHidden) {
            $flags2 |= (1 << 1);
        }
        if ($this->storiesHiddenMin) {
            $flags2 |= (1 << 2);
        }
        if ($this->storiesUnavailable) {
            $flags2 |= (1 << 3);
        }
        if ($this->signatureProfiles) {
            $flags2 |= (1 << 12);
        }
        if ($this->autotranslation) {
            $flags2 |= (1 << 15);
        }
        if ($this->broadcastMessagesAllowed) {
            $flags2 |= (1 << 16);
        }
        if ($this->monoforum) {
            $flags2 |= (1 << 17);
        }
        if ($this->forumTabs) {
            $flags2 |= (1 << 19);
        }
        if ($this->accessHash !== null) {
            $flags |= (1 << 13);
        }
        if ($this->username !== null) {
            $flags |= (1 << 6);
        }
        if ($this->restrictionReason !== null) {
            $flags |= (1 << 9);
        }
        if ($this->adminRights !== null) {
            $flags |= (1 << 14);
        }
        if ($this->bannedRights !== null) {
            $flags |= (1 << 15);
        }
        if ($this->defaultBannedRights !== null) {
            $flags |= (1 << 18);
        }
        if ($this->participantsCount !== null) {
            $flags |= (1 << 17);
        }
        if ($this->usernames !== null) {
            $flags2 |= (1 << 0);
        }
        if ($this->storiesMaxId !== null) {
            $flags2 |= (1 << 4);
        }
        if ($this->color !== null) {
            $flags2 |= (1 << 7);
        }
        if ($this->profileColor !== null) {
            $flags2 |= (1 << 8);
        }
        if ($this->emojiStatus !== null) {
            $flags2 |= (1 << 9);
        }
        if ($this->level !== null) {
            $flags2 |= (1 << 10);
        }
        if ($this->subscriptionUntilDate !== null) {
            $flags2 |= (1 << 11);
        }
        if ($this->botVerificationIcon !== null) {
            $flags2 |= (1 << 13);
        }
        if ($this->sendPaidMessagesStars !== null) {
            $flags2 |= (1 << 14);
        }
        if ($this->linkedMonoforumId !== null) {
            $flags2 |= (1 << 18);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($flags2);
        $buffer .= Serializer::int64($this->id);
        if ($flags & (1 << 13)) {
            $buffer .= Serializer::int64($this->accessHash);
        }
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::bytes($this->username);
        }
        $buffer .= $this->photo->serialize();
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::vectorOfObjects($this->restrictionReason);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->adminRights->serialize();
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->bannedRights->serialize();
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->defaultBannedRights->serialize();
        }
        if ($flags & (1 << 17)) {
            $buffer .= Serializer::int32($this->participantsCount);
        }
        if ($flags2 & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->usernames);
        }
        if ($flags2 & (1 << 4)) {
            $buffer .= $this->storiesMaxId->serialize();
        }
        if ($flags2 & (1 << 7)) {
            $buffer .= $this->color->serialize();
        }
        if ($flags2 & (1 << 8)) {
            $buffer .= $this->profileColor->serialize();
        }
        if ($flags2 & (1 << 9)) {
            $buffer .= $this->emojiStatus->serialize();
        }
        if ($flags2 & (1 << 10)) {
            $buffer .= Serializer::int32($this->level);
        }
        if ($flags2 & (1 << 11)) {
            $buffer .= Serializer::int32($this->subscriptionUntilDate);
        }
        if ($flags2 & (1 << 13)) {
            $buffer .= Serializer::int64($this->botVerificationIcon);
        }
        if ($flags2 & (1 << 14)) {
            $buffer .= Serializer::int64($this->sendPaidMessagesStars);
        }
        if ($flags2 & (1 << 18)) {
            $buffer .= Serializer::int64($this->linkedMonoforumId);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $creator = (($flags & (1 << 0)) !== 0) ? true : null;
        $left = (($flags & (1 << 2)) !== 0) ? true : null;
        $broadcast = (($flags & (1 << 5)) !== 0) ? true : null;
        $verified = (($flags & (1 << 7)) !== 0) ? true : null;
        $megagroup = (($flags & (1 << 8)) !== 0) ? true : null;
        $restricted = (($flags & (1 << 9)) !== 0) ? true : null;
        $signatures = (($flags & (1 << 11)) !== 0) ? true : null;
        $min = (($flags & (1 << 12)) !== 0) ? true : null;
        $scam = (($flags & (1 << 19)) !== 0) ? true : null;
        $hasLink = (($flags & (1 << 20)) !== 0) ? true : null;
        $hasGeo = (($flags & (1 << 21)) !== 0) ? true : null;
        $slowmodeEnabled = (($flags & (1 << 22)) !== 0) ? true : null;
        $callActive = (($flags & (1 << 23)) !== 0) ? true : null;
        $callNotEmpty = (($flags & (1 << 24)) !== 0) ? true : null;
        $fake = (($flags & (1 << 25)) !== 0) ? true : null;
        $gigagroup = (($flags & (1 << 26)) !== 0) ? true : null;
        $noforwards = (($flags & (1 << 27)) !== 0) ? true : null;
        $joinToSend = (($flags & (1 << 28)) !== 0) ? true : null;
        $joinRequest = (($flags & (1 << 29)) !== 0) ? true : null;
        $forum = (($flags & (1 << 30)) !== 0) ? true : null;
        $flags2 = Deserializer::int32($__payload, $__offset);
        $storiesHidden = (($flags2 & (1 << 1)) !== 0) ? true : null;
        $storiesHiddenMin = (($flags2 & (1 << 2)) !== 0) ? true : null;
        $storiesUnavailable = (($flags2 & (1 << 3)) !== 0) ? true : null;
        $signatureProfiles = (($flags2 & (1 << 12)) !== 0) ? true : null;
        $autotranslation = (($flags2 & (1 << 15)) !== 0) ? true : null;
        $broadcastMessagesAllowed = (($flags2 & (1 << 16)) !== 0) ? true : null;
        $monoforum = (($flags2 & (1 << 17)) !== 0) ? true : null;
        $forumTabs = (($flags2 & (1 << 19)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = (($flags & (1 << 13)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $title = Deserializer::bytes($__payload, $__offset);
        $username = (($flags & (1 << 6)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $photo = AbstractChatPhoto::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $restrictionReason = (($flags & (1 << 9)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [RestrictionReason::class, 'deserialize']) : null;
        $adminRights = (($flags & (1 << 14)) !== 0) ? ChatAdminRights::deserialize($__payload, $__offset) : null;
        $bannedRights = (($flags & (1 << 15)) !== 0) ? ChatBannedRights::deserialize($__payload, $__offset) : null;
        $defaultBannedRights = (($flags & (1 << 18)) !== 0) ? ChatBannedRights::deserialize($__payload, $__offset) : null;
        $participantsCount = (($flags & (1 << 17)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $usernames = (($flags2 & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [Username::class, 'deserialize']) : null;
        $storiesMaxId = (($flags2 & (1 << 4)) !== 0) ? RecentStory::deserialize($__payload, $__offset) : null;
        $color = (($flags2 & (1 << 7)) !== 0) ? AbstractPeerColor::deserialize($__payload, $__offset) : null;
        $profileColor = (($flags2 & (1 << 8)) !== 0) ? AbstractPeerColor::deserialize($__payload, $__offset) : null;
        $emojiStatus = (($flags2 & (1 << 9)) !== 0) ? AbstractEmojiStatus::deserialize($__payload, $__offset) : null;
        $level = (($flags2 & (1 << 10)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $subscriptionUntilDate = (($flags2 & (1 << 11)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $botVerificationIcon = (($flags2 & (1 << 13)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $sendPaidMessagesStars = (($flags2 & (1 << 14)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $linkedMonoforumId = (($flags2 & (1 << 18)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

        return new self(
            $id,
            $title,
            $photo,
            $date,
            $creator,
            $left,
            $broadcast,
            $verified,
            $megagroup,
            $restricted,
            $signatures,
            $min,
            $scam,
            $hasLink,
            $hasGeo,
            $slowmodeEnabled,
            $callActive,
            $callNotEmpty,
            $fake,
            $gigagroup,
            $noforwards,
            $joinToSend,
            $joinRequest,
            $forum,
            $storiesHidden,
            $storiesHiddenMin,
            $storiesUnavailable,
            $signatureProfiles,
            $autotranslation,
            $broadcastMessagesAllowed,
            $monoforum,
            $forumTabs,
            $accessHash,
            $username,
            $restrictionReason,
            $adminRights,
            $bannedRights,
            $defaultBannedRights,
            $participantsCount,
            $usernames,
            $storiesMaxId,
            $color,
            $profileColor,
            $emojiStatus,
            $level,
            $subscriptionUntilDate,
            $botVerificationIcon,
            $sendPaidMessagesStars,
            $linkedMonoforumId
        );
    }
}