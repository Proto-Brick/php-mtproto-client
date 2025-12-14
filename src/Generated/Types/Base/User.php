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
    public const CONSTRUCTOR_ID = 0x20b1422;
    
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
     * @param int|null $storiesMaxId
     * @param PeerColor|null $color
     * @param PeerColor|null $profileColor
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
        public readonly ?int $storiesMaxId = null,
        public readonly ?PeerColor $color = null,
        public readonly ?PeerColor $profileColor = null,
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
            $buffer .= Serializer::int32($this->storiesMaxId);
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
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
        $flags2 = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $botCanEdit = (($flags2 & (1 << 1)) !== 0) ? true : null;
        $closeFriend = (($flags2 & (1 << 2)) !== 0) ? true : null;
        $storiesHidden = (($flags2 & (1 << 3)) !== 0) ? true : null;
        $storiesUnavailable = (($flags2 & (1 << 4)) !== 0) ? true : null;
        $contactRequirePremium = (($flags2 & (1 << 10)) !== 0) ? true : null;
        $botBusiness = (($flags2 & (1 << 11)) !== 0) ? true : null;
        $botHasMainApp = (($flags2 & (1 << 13)) !== 0) ? true : null;
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $accessHash = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;
        $firstName = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $lastName = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $username = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($stream) : null;
        $phone = (($flags & (1 << 4)) !== 0) ? Deserializer::bytes($stream) : null;
        $photo = (($flags & (1 << 5)) !== 0) ? AbstractUserProfilePhoto::deserialize($stream) : null;
        $status = (($flags & (1 << 6)) !== 0) ? AbstractUserStatus::deserialize($stream) : null;
        $botInfoVersion = (($flags & (1 << 14)) !== 0) ? Deserializer::int32($stream) : null;
        $restrictionReason = (($flags & (1 << 18)) !== 0) ? Deserializer::vectorOfObjects($stream, [RestrictionReason::class, 'deserialize']) : null;
        $botInlinePlaceholder = (($flags & (1 << 19)) !== 0) ? Deserializer::bytes($stream) : null;
        $langCode = (($flags & (1 << 22)) !== 0) ? Deserializer::bytes($stream) : null;
        $emojiStatus = (($flags & (1 << 30)) !== 0) ? AbstractEmojiStatus::deserialize($stream) : null;
        $usernames = (($flags2 & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($stream, [Username::class, 'deserialize']) : null;
        $storiesMaxId = (($flags2 & (1 << 5)) !== 0) ? Deserializer::int32($stream) : null;
        $color = (($flags2 & (1 << 8)) !== 0) ? PeerColor::deserialize($stream) : null;
        $profileColor = (($flags2 & (1 << 9)) !== 0) ? PeerColor::deserialize($stream) : null;
        $botActiveUsers = (($flags2 & (1 << 12)) !== 0) ? Deserializer::int32($stream) : null;
        $botVerificationIcon = (($flags2 & (1 << 14)) !== 0) ? Deserializer::int64($stream) : null;
        $sendPaidMessagesStars = (($flags2 & (1 << 15)) !== 0) ? Deserializer::int64($stream) : null;

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