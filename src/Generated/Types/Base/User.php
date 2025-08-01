<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/user
 */
final class User extends AbstractUser
{
    public const CONSTRUCTOR_ID = 2201046986;
    
    public string $_ = 'user';
    
    /**
     * @param int $id
     * @param bool|null $self
     * @param bool|null $contact
     * @param bool|null $mutualContact
     * @param bool|null $deleted
     * @param bool|null $bot
     * @param bool|null $botChatHistory
     * @param bool|null $botNochats
     * @param bool|null $verified
     * @param bool|null $restricted
     * @param bool|null $min
     * @param bool|null $botInlineGeo
     * @param bool|null $support
     * @param bool|null $scam
     * @param bool|null $applyMinPhoto
     * @param bool|null $fake
     * @param bool|null $botAttachMenu
     * @param bool|null $premium
     * @param bool|null $attachMenuEnabled
     * @param bool|null $botCanEdit
     * @param bool|null $closeFriend
     * @param bool|null $storiesHidden
     * @param bool|null $storiesUnavailable
     * @param bool|null $contactRequirePremium
     * @param bool|null $botBusiness
     * @param bool|null $botHasMainApp
     * @param int|null $accessHash
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $username
     * @param string|null $phone
     * @param AbstractUserProfilePhoto|null $photo
     * @param AbstractUserStatus|null $status
     * @param int|null $botInfoVersion
     * @param list<AbstractRestrictionReason>|null $restrictionReason
     * @param string|null $botInlinePlaceholder
     * @param string|null $langCode
     * @param AbstractEmojiStatus|null $emojiStatus
     * @param list<AbstractUsername>|null $usernames
     * @param int|null $storiesMaxId
     * @param AbstractPeerColor|null $color
     * @param AbstractPeerColor|null $profileColor
     * @param int|null $botActiveUsers
     */
    public function __construct(
        public readonly int $id,
        public readonly ?bool $self = null,
        public readonly ?bool $contact = null,
        public readonly ?bool $mutualContact = null,
        public readonly ?bool $deleted = null,
        public readonly ?bool $bot = null,
        public readonly ?bool $botChatHistory = null,
        public readonly ?bool $botNochats = null,
        public readonly ?bool $verified = null,
        public readonly ?bool $restricted = null,
        public readonly ?bool $min = null,
        public readonly ?bool $botInlineGeo = null,
        public readonly ?bool $support = null,
        public readonly ?bool $scam = null,
        public readonly ?bool $applyMinPhoto = null,
        public readonly ?bool $fake = null,
        public readonly ?bool $botAttachMenu = null,
        public readonly ?bool $premium = null,
        public readonly ?bool $attachMenuEnabled = null,
        public readonly ?bool $botCanEdit = null,
        public readonly ?bool $closeFriend = null,
        public readonly ?bool $storiesHidden = null,
        public readonly ?bool $storiesUnavailable = null,
        public readonly ?bool $contactRequirePremium = null,
        public readonly ?bool $botBusiness = null,
        public readonly ?bool $botHasMainApp = null,
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
        public readonly ?AbstractPeerColor $color = null,
        public readonly ?AbstractPeerColor $profileColor = null,
        public readonly ?int $botActiveUsers = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->self) $flags |= (1 << 10);
        if ($this->contact) $flags |= (1 << 11);
        if ($this->mutualContact) $flags |= (1 << 12);
        if ($this->deleted) $flags |= (1 << 13);
        if ($this->bot) $flags |= (1 << 14);
        if ($this->botChatHistory) $flags |= (1 << 15);
        if ($this->botNochats) $flags |= (1 << 16);
        if ($this->verified) $flags |= (1 << 17);
        if ($this->restricted) $flags |= (1 << 18);
        if ($this->min) $flags |= (1 << 20);
        if ($this->botInlineGeo) $flags |= (1 << 21);
        if ($this->support) $flags |= (1 << 23);
        if ($this->scam) $flags |= (1 << 24);
        if ($this->applyMinPhoto) $flags |= (1 << 25);
        if ($this->fake) $flags |= (1 << 26);
        if ($this->botAttachMenu) $flags |= (1 << 27);
        if ($this->premium) $flags |= (1 << 28);
        if ($this->attachMenuEnabled) $flags |= (1 << 29);
        if ($this->accessHash !== null) $flags |= (1 << 0);
        if ($this->firstName !== null) $flags |= (1 << 1);
        if ($this->lastName !== null) $flags |= (1 << 2);
        if ($this->username !== null) $flags |= (1 << 3);
        if ($this->phone !== null) $flags |= (1 << 4);
        if ($this->photo !== null) $flags |= (1 << 5);
        if ($this->status !== null) $flags |= (1 << 6);
        if ($this->botInfoVersion !== null) $flags |= (1 << 14);
        if ($this->restrictionReason !== null) $flags |= (1 << 18);
        if ($this->botInlinePlaceholder !== null) $flags |= (1 << 19);
        if ($this->langCode !== null) $flags |= (1 << 22);
        if ($this->emojiStatus !== null) $flags |= (1 << 30);
        $buffer .= $serializer->int32($flags);
        $flags2 = 0;
        if ($this->botCanEdit) $flags2 |= (1 << 1);
        if ($this->closeFriend) $flags2 |= (1 << 2);
        if ($this->storiesHidden) $flags2 |= (1 << 3);
        if ($this->storiesUnavailable) $flags2 |= (1 << 4);
        if ($this->contactRequirePremium) $flags2 |= (1 << 10);
        if ($this->botBusiness) $flags2 |= (1 << 11);
        if ($this->botHasMainApp) $flags2 |= (1 << 13);
        if ($this->usernames !== null) $flags2 |= (1 << 0);
        if ($this->storiesMaxId !== null) $flags2 |= (1 << 5);
        if ($this->color !== null) $flags2 |= (1 << 8);
        if ($this->profileColor !== null) $flags2 |= (1 << 9);
        if ($this->botActiveUsers !== null) $flags2 |= (1 << 12);
        $buffer .= $serializer->int32($flags2);

        $buffer .= $serializer->int64($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->accessHash);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->firstName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->lastName);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->username);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->phone);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->status->serialize($serializer);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $serializer->int32($this->botInfoVersion);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $serializer->vectorOfObjects($this->restrictionReason);
        }
        if ($flags & (1 << 19)) {
            $buffer .= $serializer->bytes($this->botInlinePlaceholder);
        }
        if ($flags & (1 << 22)) {
            $buffer .= $serializer->bytes($this->langCode);
        }
        if ($flags & (1 << 30)) {
            $buffer .= $this->emojiStatus->serialize($serializer);
        }
        if ($flags2 & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->usernames);
        }
        if ($flags2 & (1 << 5)) {
            $buffer .= $serializer->int32($this->storiesMaxId);
        }
        if ($flags2 & (1 << 8)) {
            $buffer .= $this->color->serialize($serializer);
        }
        if ($flags2 & (1 << 9)) {
            $buffer .= $this->profileColor->serialize($serializer);
        }
        if ($flags2 & (1 << 12)) {
            $buffer .= $serializer->int32($this->botActiveUsers);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);
        $flags2 = $deserializer->int32($stream);

        $self = ($flags & (1 << 10)) ? true : null;
        $contact = ($flags & (1 << 11)) ? true : null;
        $mutualContact = ($flags & (1 << 12)) ? true : null;
        $deleted = ($flags & (1 << 13)) ? true : null;
        $bot = ($flags & (1 << 14)) ? true : null;
        $botChatHistory = ($flags & (1 << 15)) ? true : null;
        $botNochats = ($flags & (1 << 16)) ? true : null;
        $verified = ($flags & (1 << 17)) ? true : null;
        $restricted = ($flags & (1 << 18)) ? true : null;
        $min = ($flags & (1 << 20)) ? true : null;
        $botInlineGeo = ($flags & (1 << 21)) ? true : null;
        $support = ($flags & (1 << 23)) ? true : null;
        $scam = ($flags & (1 << 24)) ? true : null;
        $applyMinPhoto = ($flags & (1 << 25)) ? true : null;
        $fake = ($flags & (1 << 26)) ? true : null;
        $botAttachMenu = ($flags & (1 << 27)) ? true : null;
        $premium = ($flags & (1 << 28)) ? true : null;
        $attachMenuEnabled = ($flags & (1 << 29)) ? true : null;
        $botCanEdit = ($flags2 & (1 << 1)) ? true : null;
        $closeFriend = ($flags2 & (1 << 2)) ? true : null;
        $storiesHidden = ($flags2 & (1 << 3)) ? true : null;
        $storiesUnavailable = ($flags2 & (1 << 4)) ? true : null;
        $contactRequirePremium = ($flags2 & (1 << 10)) ? true : null;
        $botBusiness = ($flags2 & (1 << 11)) ? true : null;
        $botHasMainApp = ($flags2 & (1 << 13)) ? true : null;
        $id = $deserializer->int64($stream);
        $accessHash = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $firstName = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $lastName = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $username = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $phone = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
        $photo = ($flags & (1 << 5)) ? AbstractUserProfilePhoto::deserialize($deserializer, $stream) : null;
        $status = ($flags & (1 << 6)) ? AbstractUserStatus::deserialize($deserializer, $stream) : null;
        $botInfoVersion = ($flags & (1 << 14)) ? $deserializer->int32($stream) : null;
        $restrictionReason = ($flags & (1 << 18)) ? $deserializer->vectorOfObjects($stream, [AbstractRestrictionReason::class, 'deserialize']) : null;
        $botInlinePlaceholder = ($flags & (1 << 19)) ? $deserializer->bytes($stream) : null;
        $langCode = ($flags & (1 << 22)) ? $deserializer->bytes($stream) : null;
        $emojiStatus = ($flags & (1 << 30)) ? AbstractEmojiStatus::deserialize($deserializer, $stream) : null;
        $usernames = ($flags2 & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AbstractUsername::class, 'deserialize']) : null;
        $storiesMaxId = ($flags2 & (1 << 5)) ? $deserializer->int32($stream) : null;
        $color = ($flags2 & (1 << 8)) ? AbstractPeerColor::deserialize($deserializer, $stream) : null;
        $profileColor = ($flags2 & (1 << 9)) ? AbstractPeerColor::deserialize($deserializer, $stream) : null;
        $botActiveUsers = ($flags2 & (1 << 12)) ? $deserializer->int32($stream) : null;
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
            $botActiveUsers
        );
    }
}