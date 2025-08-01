<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channel
 */
final class Channel extends AbstractChat
{
    public const CONSTRUCTOR_ID = 4265900221;
    
    public string $_ = 'channel';
    
    /**
     * @param int $id
     * @param string $title
     * @param AbstractChatPhoto $photo
     * @param int $date
     * @param bool|null $creator
     * @param bool|null $left
     * @param bool|null $broadcast
     * @param bool|null $verified
     * @param bool|null $megagroup
     * @param bool|null $restricted
     * @param bool|null $signatures
     * @param bool|null $min
     * @param bool|null $scam
     * @param bool|null $hasLink
     * @param bool|null $hasGeo
     * @param bool|null $slowmodeEnabled
     * @param bool|null $callActive
     * @param bool|null $callNotEmpty
     * @param bool|null $fake
     * @param bool|null $gigagroup
     * @param bool|null $noforwards
     * @param bool|null $joinToSend
     * @param bool|null $joinRequest
     * @param bool|null $forum
     * @param bool|null $storiesHidden
     * @param bool|null $storiesHiddenMin
     * @param bool|null $storiesUnavailable
     * @param bool|null $signatureProfiles
     * @param int|null $accessHash
     * @param string|null $username
     * @param list<AbstractRestrictionReason>|null $restrictionReason
     * @param AbstractChatAdminRights|null $adminRights
     * @param AbstractChatBannedRights|null $bannedRights
     * @param AbstractChatBannedRights|null $defaultBannedRights
     * @param int|null $participantsCount
     * @param list<AbstractUsername>|null $usernames
     * @param int|null $storiesMaxId
     * @param AbstractPeerColor|null $color
     * @param AbstractPeerColor|null $profileColor
     * @param AbstractEmojiStatus|null $emojiStatus
     * @param int|null $level
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly AbstractChatPhoto $photo,
        public readonly int $date,
        public readonly ?bool $creator = null,
        public readonly ?bool $left = null,
        public readonly ?bool $broadcast = null,
        public readonly ?bool $verified = null,
        public readonly ?bool $megagroup = null,
        public readonly ?bool $restricted = null,
        public readonly ?bool $signatures = null,
        public readonly ?bool $min = null,
        public readonly ?bool $scam = null,
        public readonly ?bool $hasLink = null,
        public readonly ?bool $hasGeo = null,
        public readonly ?bool $slowmodeEnabled = null,
        public readonly ?bool $callActive = null,
        public readonly ?bool $callNotEmpty = null,
        public readonly ?bool $fake = null,
        public readonly ?bool $gigagroup = null,
        public readonly ?bool $noforwards = null,
        public readonly ?bool $joinToSend = null,
        public readonly ?bool $joinRequest = null,
        public readonly ?bool $forum = null,
        public readonly ?bool $storiesHidden = null,
        public readonly ?bool $storiesHiddenMin = null,
        public readonly ?bool $storiesUnavailable = null,
        public readonly ?bool $signatureProfiles = null,
        public readonly ?int $accessHash = null,
        public readonly ?string $username = null,
        public readonly ?array $restrictionReason = null,
        public readonly ?AbstractChatAdminRights $adminRights = null,
        public readonly ?AbstractChatBannedRights $bannedRights = null,
        public readonly ?AbstractChatBannedRights $defaultBannedRights = null,
        public readonly ?int $participantsCount = null,
        public readonly ?array $usernames = null,
        public readonly ?int $storiesMaxId = null,
        public readonly ?AbstractPeerColor $color = null,
        public readonly ?AbstractPeerColor $profileColor = null,
        public readonly ?AbstractEmojiStatus $emojiStatus = null,
        public readonly ?int $level = null,
        public readonly ?int $subscriptionUntilDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) $flags |= (1 << 0);
        if ($this->left) $flags |= (1 << 2);
        if ($this->broadcast) $flags |= (1 << 5);
        if ($this->verified) $flags |= (1 << 7);
        if ($this->megagroup) $flags |= (1 << 8);
        if ($this->restricted) $flags |= (1 << 9);
        if ($this->signatures) $flags |= (1 << 11);
        if ($this->min) $flags |= (1 << 12);
        if ($this->scam) $flags |= (1 << 19);
        if ($this->hasLink) $flags |= (1 << 20);
        if ($this->hasGeo) $flags |= (1 << 21);
        if ($this->slowmodeEnabled) $flags |= (1 << 22);
        if ($this->callActive) $flags |= (1 << 23);
        if ($this->callNotEmpty) $flags |= (1 << 24);
        if ($this->fake) $flags |= (1 << 25);
        if ($this->gigagroup) $flags |= (1 << 26);
        if ($this->noforwards) $flags |= (1 << 27);
        if ($this->joinToSend) $flags |= (1 << 28);
        if ($this->joinRequest) $flags |= (1 << 29);
        if ($this->forum) $flags |= (1 << 30);
        if ($this->accessHash !== null) $flags |= (1 << 13);
        if ($this->username !== null) $flags |= (1 << 6);
        if ($this->restrictionReason !== null) $flags |= (1 << 9);
        if ($this->adminRights !== null) $flags |= (1 << 14);
        if ($this->bannedRights !== null) $flags |= (1 << 15);
        if ($this->defaultBannedRights !== null) $flags |= (1 << 18);
        if ($this->participantsCount !== null) $flags |= (1 << 17);
        $buffer .= $serializer->int32($flags);
        $flags2 = 0;
        if ($this->storiesHidden) $flags2 |= (1 << 1);
        if ($this->storiesHiddenMin) $flags2 |= (1 << 2);
        if ($this->storiesUnavailable) $flags2 |= (1 << 3);
        if ($this->signatureProfiles) $flags2 |= (1 << 12);
        if ($this->usernames !== null) $flags2 |= (1 << 0);
        if ($this->storiesMaxId !== null) $flags2 |= (1 << 4);
        if ($this->color !== null) $flags2 |= (1 << 7);
        if ($this->profileColor !== null) $flags2 |= (1 << 8);
        if ($this->emojiStatus !== null) $flags2 |= (1 << 9);
        if ($this->level !== null) $flags2 |= (1 << 10);
        if ($this->subscriptionUntilDate !== null) $flags2 |= (1 << 11);
        $buffer .= $serializer->int32($flags2);

        $buffer .= $serializer->int64($this->id);
        if ($flags & (1 << 13)) {
            $buffer .= $serializer->int64($this->accessHash);
        }
        $buffer .= $serializer->bytes($this->title);
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->bytes($this->username);
        }
        $buffer .= $this->photo->serialize($serializer);
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 9)) {
            $buffer .= $serializer->vectorOfObjects($this->restrictionReason);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->adminRights->serialize($serializer);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->bannedRights->serialize($serializer);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->defaultBannedRights->serialize($serializer);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $serializer->int32($this->participantsCount);
        }
        if ($flags2 & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->usernames);
        }
        if ($flags2 & (1 << 4)) {
            $buffer .= $serializer->int32($this->storiesMaxId);
        }
        if ($flags2 & (1 << 7)) {
            $buffer .= $this->color->serialize($serializer);
        }
        if ($flags2 & (1 << 8)) {
            $buffer .= $this->profileColor->serialize($serializer);
        }
        if ($flags2 & (1 << 9)) {
            $buffer .= $this->emojiStatus->serialize($serializer);
        }
        if ($flags2 & (1 << 10)) {
            $buffer .= $serializer->int32($this->level);
        }
        if ($flags2 & (1 << 11)) {
            $buffer .= $serializer->int32($this->subscriptionUntilDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);
        $flags2 = $deserializer->int32($stream);

        $creator = ($flags & (1 << 0)) ? true : null;
        $left = ($flags & (1 << 2)) ? true : null;
        $broadcast = ($flags & (1 << 5)) ? true : null;
        $verified = ($flags & (1 << 7)) ? true : null;
        $megagroup = ($flags & (1 << 8)) ? true : null;
        $restricted = ($flags & (1 << 9)) ? true : null;
        $signatures = ($flags & (1 << 11)) ? true : null;
        $min = ($flags & (1 << 12)) ? true : null;
        $scam = ($flags & (1 << 19)) ? true : null;
        $hasLink = ($flags & (1 << 20)) ? true : null;
        $hasGeo = ($flags & (1 << 21)) ? true : null;
        $slowmodeEnabled = ($flags & (1 << 22)) ? true : null;
        $callActive = ($flags & (1 << 23)) ? true : null;
        $callNotEmpty = ($flags & (1 << 24)) ? true : null;
        $fake = ($flags & (1 << 25)) ? true : null;
        $gigagroup = ($flags & (1 << 26)) ? true : null;
        $noforwards = ($flags & (1 << 27)) ? true : null;
        $joinToSend = ($flags & (1 << 28)) ? true : null;
        $joinRequest = ($flags & (1 << 29)) ? true : null;
        $forum = ($flags & (1 << 30)) ? true : null;
        $storiesHidden = ($flags2 & (1 << 1)) ? true : null;
        $storiesHiddenMin = ($flags2 & (1 << 2)) ? true : null;
        $storiesUnavailable = ($flags2 & (1 << 3)) ? true : null;
        $signatureProfiles = ($flags2 & (1 << 12)) ? true : null;
        $id = $deserializer->int64($stream);
        $accessHash = ($flags & (1 << 13)) ? $deserializer->int64($stream) : null;
        $title = $deserializer->bytes($stream);
        $username = ($flags & (1 << 6)) ? $deserializer->bytes($stream) : null;
        $photo = AbstractChatPhoto::deserialize($deserializer, $stream);
        $date = $deserializer->int32($stream);
        $restrictionReason = ($flags & (1 << 9)) ? $deserializer->vectorOfObjects($stream, [AbstractRestrictionReason::class, 'deserialize']) : null;
        $adminRights = ($flags & (1 << 14)) ? AbstractChatAdminRights::deserialize($deserializer, $stream) : null;
        $bannedRights = ($flags & (1 << 15)) ? AbstractChatBannedRights::deserialize($deserializer, $stream) : null;
        $defaultBannedRights = ($flags & (1 << 18)) ? AbstractChatBannedRights::deserialize($deserializer, $stream) : null;
        $participantsCount = ($flags & (1 << 17)) ? $deserializer->int32($stream) : null;
        $usernames = ($flags2 & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AbstractUsername::class, 'deserialize']) : null;
        $storiesMaxId = ($flags2 & (1 << 4)) ? $deserializer->int32($stream) : null;
        $color = ($flags2 & (1 << 7)) ? AbstractPeerColor::deserialize($deserializer, $stream) : null;
        $profileColor = ($flags2 & (1 << 8)) ? AbstractPeerColor::deserialize($deserializer, $stream) : null;
        $emojiStatus = ($flags2 & (1 << 9)) ? AbstractEmojiStatus::deserialize($deserializer, $stream) : null;
        $level = ($flags2 & (1 << 10)) ? $deserializer->int32($stream) : null;
        $subscriptionUntilDate = ($flags2 & (1 << 11)) ? $deserializer->int32($stream) : null;
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
            $subscriptionUntilDate
        );
    }
}