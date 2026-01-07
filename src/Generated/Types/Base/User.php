<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/user
 */
final class User extends AbstractUser implements PeerEntity
{
    public const CONSTRUCTOR_ID = 0x31774388;
    
    public string $predicate = 'user';
    
    public function getPeerType(): string
    {
        return 'user';
    }
    /**
     * @param int $id
     * @param true|null $self
     * @param true|null $contact
     * @param true|null $mutualContact
     * @param true|null $deleted
     * @param true|null $bot
     * @param true|null $botChatHistory
     * @param true|null $botNochats
     * @param true|null $verified
     * @param true|null $restricted
     * @param true|null $min
     * @param true|null $botInlineGeo
     * @param true|null $support
     * @param true|null $scam
     * @param true|null $applyMinPhoto
     * @param true|null $fake
     * @param true|null $botAttachMenu
     * @param true|null $premium
     * @param true|null $attachMenuEnabled
     * @param true|null $botCanEdit
     * @param true|null $closeFriend
     * @param true|null $storiesHidden
     * @param true|null $storiesUnavailable
     * @param true|null $contactRequirePremium
     * @param true|null $botBusiness
     * @param true|null $botHasMainApp
     * @param true|null $botForumView
     * @param int|null $accessHash
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $username
     * @param string|null $phone
     * @param AbstractUserProfilePhoto|null $photo
     * @param AbstractUserStatus|null $status
     * @param int|null $botInfoVersion
     * @param list<RestrictionReason>|null $restrictionReason
     * @param string|null $botInlinePlaceholder
     * @param string|null $langCode
     * @param AbstractEmojiStatus|null $emojiStatus
     * @param list<Username>|null $usernames
     * @param RecentStory|null $storiesMaxId
     * @param AbstractPeerColor|null $color
     * @param AbstractPeerColor|null $profileColor
     * @param int|null $botActiveUsers
     * @param int|null $botVerificationIcon
     * @param int|null $sendPaidMessagesStars
     */
    public function __construct(
        public readonly int $id,
        public readonly ?true $self = null,
        public readonly ?true $contact = null,
        public readonly ?true $mutualContact = null,
        public readonly ?true $deleted = null,
        public readonly ?true $bot = null,
        public readonly ?true $botChatHistory = null,
        public readonly ?true $botNochats = null,
        public readonly ?true $verified = null,
        public readonly ?true $restricted = null,
        public readonly ?true $min = null,
        public readonly ?true $botInlineGeo = null,
        public readonly ?true $support = null,
        public readonly ?true $scam = null,
        public readonly ?true $applyMinPhoto = null,
        public readonly ?true $fake = null,
        public readonly ?true $botAttachMenu = null,
        public readonly ?true $premium = null,
        public readonly ?true $attachMenuEnabled = null,
        public readonly ?true $botCanEdit = null,
        public readonly ?true $closeFriend = null,
        public readonly ?true $storiesHidden = null,
        public readonly ?true $storiesUnavailable = null,
        public readonly ?true $contactRequirePremium = null,
        public readonly ?true $botBusiness = null,
        public readonly ?true $botHasMainApp = null,
        public readonly ?true $botForumView = null,
        public readonly ?int $accessHash = null,
        public readonly ?string $firstName = null,
        public readonly ?string $lastName = null,
        public readonly ?string $username = null,
        public readonly ?string $phone = null,
        public readonly ?AbstractUserProfilePhoto $photo = null,
        public readonly ?AbstractUserStatus $status = null,
        public readonly ?int $botInfoVersion = null,
        public readonly ?array $restrictionReason = null,
        public readonly ?string $botInlinePlaceholder = null,
        public readonly ?string $langCode = null,
        public readonly ?AbstractEmojiStatus $emojiStatus = null,
        public readonly ?array $usernames = null,
        public readonly ?RecentStory $storiesMaxId = null,
        public readonly ?AbstractPeerColor $color = null,
        public readonly ?AbstractPeerColor $profileColor = null,
        public readonly ?int $botActiveUsers = null,
        public readonly ?int $botVerificationIcon = null,
        public readonly ?int $sendPaidMessagesStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $flags2 = 0;
        if ($this->self) {
            $flags |= (1 << 10);
        }
        if ($this->contact) {
            $flags |= (1 << 11);
        }
        if ($this->mutualContact) {
            $flags |= (1 << 12);
        }
        if ($this->deleted) {
            $flags |= (1 << 13);
        }
        if ($this->bot) {
            $flags |= (1 << 14);
        }
        if ($this->botChatHistory) {
            $flags |= (1 << 15);
        }
        if ($this->botNochats) {
            $flags |= (1 << 16);
        }
        if ($this->verified) {
            $flags |= (1 << 17);
        }
        if ($this->restricted) {
            $flags |= (1 << 18);
        }
        if ($this->min) {
            $flags |= (1 << 20);
        }
        if ($this->botInlineGeo) {
            $flags |= (1 << 21);
        }
        if ($this->support) {
            $flags |= (1 << 23);
        }
        if ($this->scam) {
            $flags |= (1 << 24);
        }
        if ($this->applyMinPhoto) {
            $flags |= (1 << 25);
        }
        if ($this->fake) {
            $flags |= (1 << 26);
        }
        if ($this->botAttachMenu) {
            $flags |= (1 << 27);
        }
        if ($this->premium) {
            $flags |= (1 << 28);
        }
        if ($this->attachMenuEnabled) {
            $flags |= (1 << 29);
        }
        if ($this->botCanEdit) {
            $flags2 |= (1 << 1);
        }
        if ($this->closeFriend) {
            $flags2 |= (1 << 2);
        }
        if ($this->storiesHidden) {
            $flags2 |= (1 << 3);
        }
        if ($this->storiesUnavailable) {
            $flags2 |= (1 << 4);
        }
        if ($this->contactRequirePremium) {
            $flags2 |= (1 << 10);
        }
        if ($this->botBusiness) {
            $flags2 |= (1 << 11);
        }
        if ($this->botHasMainApp) {
            $flags2 |= (1 << 13);
        }
        if ($this->botForumView) {
            $flags2 |= (1 << 16);
        }
        if ($this->accessHash !== null) {
            $flags |= (1 << 0);
        }
        if ($this->firstName !== null) {
            $flags |= (1 << 1);
        }
        if ($this->lastName !== null) {
            $flags |= (1 << 2);
        }
        if ($this->username !== null) {
            $flags |= (1 << 3);
        }
        if ($this->phone !== null) {
            $flags |= (1 << 4);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 5);
        }
        if ($this->status !== null) {
            $flags |= (1 << 6);
        }
        if ($this->botInfoVersion !== null) {
            $flags |= (1 << 14);
        }
        if ($this->restrictionReason !== null) {
            $flags |= (1 << 18);
        }
        if ($this->botInlinePlaceholder !== null) {
            $flags |= (1 << 19);
        }
        if ($this->langCode !== null) {
            $flags |= (1 << 22);
        }
        if ($this->emojiStatus !== null) {
            $flags |= (1 << 30);
        }
        if ($this->usernames !== null) {
            $flags2 |= (1 << 0);
        }
        if ($this->storiesMaxId !== null) {
            $flags2 |= (1 << 5);
        }
        if ($this->color !== null) {
            $flags2 |= (1 << 8);
        }
        if ($this->profileColor !== null) {
            $flags2 |= (1 << 9);
        }
        if ($this->botActiveUsers !== null) {
            $flags2 |= (1 << 12);
        }
        if ($this->botVerificationIcon !== null) {
            $flags2 |= (1 << 14);
        }
        if ($this->sendPaidMessagesStars !== null) {
            $flags2 |= (1 << 15);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($flags2);
        $buffer .= Serializer::int64($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->accessHash);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->firstName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->lastName);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->username);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->phone);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->status->serialize();
        }
        if ($flags & (1 << 14)) {
            $buffer .= Serializer::int32($this->botInfoVersion);
        }
        if ($flags & (1 << 18)) {
            $buffer .= Serializer::vectorOfObjects($this->restrictionReason);
        }
        if ($flags & (1 << 19)) {
            $buffer .= Serializer::bytes($this->botInlinePlaceholder);
        }
        if ($flags & (1 << 22)) {
            $buffer .= Serializer::bytes($this->langCode);
        }
        if ($flags & (1 << 30)) {
            $buffer .= $this->emojiStatus->serialize();
        }
        if ($flags2 & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->usernames);
        }
        if ($flags2 & (1 << 5)) {
            $buffer .= $this->storiesMaxId->serialize();
        }
        if ($flags2 & (1 << 8)) {
            $buffer .= $this->color->serialize();
        }
        if ($flags2 & (1 << 9)) {
            $buffer .= $this->profileColor->serialize();
        }
        if ($flags2 & (1 << 12)) {
            $buffer .= Serializer::int32($this->botActiveUsers);
        }
        if ($flags2 & (1 << 14)) {
            $buffer .= Serializer::int64($this->botVerificationIcon);
        }
        if ($flags2 & (1 << 15)) {
            $buffer .= Serializer::int64($this->sendPaidMessagesStars);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $self = (($flags & (1 << 10)) !== 0) ? true : null;
        $contact = (($flags & (1 << 11)) !== 0) ? true : null;
        $mutualContact = (($flags & (1 << 12)) !== 0) ? true : null;
        $deleted = (($flags & (1 << 13)) !== 0) ? true : null;
        $bot = (($flags & (1 << 14)) !== 0) ? true : null;
        $botChatHistory = (($flags & (1 << 15)) !== 0) ? true : null;
        $botNochats = (($flags & (1 << 16)) !== 0) ? true : null;
        $verified = (($flags & (1 << 17)) !== 0) ? true : null;
        $restricted = (($flags & (1 << 18)) !== 0) ? true : null;
        $min = (($flags & (1 << 20)) !== 0) ? true : null;
        $botInlineGeo = (($flags & (1 << 21)) !== 0) ? true : null;
        $support = (($flags & (1 << 23)) !== 0) ? true : null;
        $scam = (($flags & (1 << 24)) !== 0) ? true : null;
        $applyMinPhoto = (($flags & (1 << 25)) !== 0) ? true : null;
        $fake = (($flags & (1 << 26)) !== 0) ? true : null;
        $botAttachMenu = (($flags & (1 << 27)) !== 0) ? true : null;
        $premium = (($flags & (1 << 28)) !== 0) ? true : null;
        $attachMenuEnabled = (($flags & (1 << 29)) !== 0) ? true : null;
        $flags2 = Deserializer::int32($__payload, $__offset);
        $botCanEdit = (($flags2 & (1 << 1)) !== 0) ? true : null;
        $closeFriend = (($flags2 & (1 << 2)) !== 0) ? true : null;
        $storiesHidden = (($flags2 & (1 << 3)) !== 0) ? true : null;
        $storiesUnavailable = (($flags2 & (1 << 4)) !== 0) ? true : null;
        $contactRequirePremium = (($flags2 & (1 << 10)) !== 0) ? true : null;
        $botBusiness = (($flags2 & (1 << 11)) !== 0) ? true : null;
        $botHasMainApp = (($flags2 & (1 << 13)) !== 0) ? true : null;
        $botForumView = (($flags2 & (1 << 16)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $firstName = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $lastName = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $username = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $phone = (($flags & (1 << 4)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $photo = (($flags & (1 << 5)) !== 0) ? AbstractUserProfilePhoto::deserialize($__payload, $__offset) : null;
        $status = (($flags & (1 << 6)) !== 0) ? AbstractUserStatus::deserialize($__payload, $__offset) : null;
        $botInfoVersion = (($flags & (1 << 14)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $restrictionReason = (($flags & (1 << 18)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [RestrictionReason::class, 'deserialize']) : null;
        $botInlinePlaceholder = (($flags & (1 << 19)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $langCode = (($flags & (1 << 22)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $emojiStatus = (($flags & (1 << 30)) !== 0) ? AbstractEmojiStatus::deserialize($__payload, $__offset) : null;
        $usernames = (($flags2 & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [Username::class, 'deserialize']) : null;
        $storiesMaxId = (($flags2 & (1 << 5)) !== 0) ? RecentStory::deserialize($__payload, $__offset) : null;
        $color = (($flags2 & (1 << 8)) !== 0) ? AbstractPeerColor::deserialize($__payload, $__offset) : null;
        $profileColor = (($flags2 & (1 << 9)) !== 0) ? AbstractPeerColor::deserialize($__payload, $__offset) : null;
        $botActiveUsers = (($flags2 & (1 << 12)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $botVerificationIcon = (($flags2 & (1 << 14)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $sendPaidMessagesStars = (($flags2 & (1 << 15)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

        return new self(
            $id,
            $self,
            $contact,
            $mutualContact,
            $deleted,
            $bot,
            $botChatHistory,
            $botNochats,
            $verified,
            $restricted,
            $min,
            $botInlineGeo,
            $support,
            $scam,
            $applyMinPhoto,
            $fake,
            $botAttachMenu,
            $premium,
            $attachMenuEnabled,
            $botCanEdit,
            $closeFriend,
            $storiesHidden,
            $storiesUnavailable,
            $contactRequirePremium,
            $botBusiness,
            $botHasMainApp,
            $botForumView,
            $accessHash,
            $firstName,
            $lastName,
            $username,
            $phone,
            $photo,
            $status,
            $botInfoVersion,
            $restrictionReason,
            $botInlinePlaceholder,
            $langCode,
            $emojiStatus,
            $usernames,
            $storiesMaxId,
            $color,
            $profileColor,
            $botActiveUsers,
            $botVerificationIcon,
            $sendPaidMessagesStars
        );
    }
}