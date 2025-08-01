<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/userFull
 */
final class UserFull extends AbstractUserFull
{
    public const CONSTRUCTOR_ID = 2543657846;
    
    public string $_ = 'userFull';
    
    /**
     * @param int $id
     * @param AbstractPeerSettings $settings
     * @param AbstractPeerNotifySettings $notifySettings
     * @param int $commonChatsCount
     * @param bool|null $blocked
     * @param bool|null $phoneCallsAvailable
     * @param bool|null $phoneCallsPrivate
     * @param bool|null $canPinMessage
     * @param bool|null $hasScheduled
     * @param bool|null $videoCallsAvailable
     * @param bool|null $voiceMessagesForbidden
     * @param bool|null $translationsDisabled
     * @param bool|null $storiesPinnedAvailable
     * @param bool|null $blockedMyStoriesFrom
     * @param bool|null $wallpaperOverridden
     * @param bool|null $contactRequirePremium
     * @param bool|null $readDatesPrivate
     * @param bool|null $sponsoredEnabled
     * @param bool|null $canViewRevenue
     * @param bool|null $botCanManageEmojiStatus
     * @param string|null $about
     * @param AbstractPhoto|null $personalPhoto
     * @param AbstractPhoto|null $profilePhoto
     * @param AbstractPhoto|null $fallbackPhoto
     * @param AbstractBotInfo|null $botInfo
     * @param int|null $pinnedMsgId
     * @param int|null $folderId
     * @param int|null $ttlPeriod
     * @param string|null $themeEmoticon
     * @param string|null $privateForwardName
     * @param AbstractChatAdminRights|null $botGroupAdminRights
     * @param AbstractChatAdminRights|null $botBroadcastAdminRights
     * @param list<AbstractPremiumGiftOption>|null $premiumGifts
     * @param AbstractWallPaper|null $wallpaper
     * @param AbstractPeerStories|null $stories
     * @param AbstractBusinessWorkHours|null $businessWorkHours
     * @param AbstractBusinessLocation|null $businessLocation
     * @param AbstractBusinessGreetingMessage|null $businessGreetingMessage
     * @param AbstractBusinessAwayMessage|null $businessAwayMessage
     * @param AbstractBusinessIntro|null $businessIntro
     * @param AbstractBirthday|null $birthday
     * @param int|null $personalChannelId
     * @param int|null $personalChannelMessage
     * @param int|null $stargiftsCount
     * @param AbstractStarRefProgram|null $starrefProgram
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractPeerSettings $settings,
        public readonly AbstractPeerNotifySettings $notifySettings,
        public readonly int $commonChatsCount,
        public readonly ?bool $blocked = null,
        public readonly ?bool $phoneCallsAvailable = null,
        public readonly ?bool $phoneCallsPrivate = null,
        public readonly ?bool $canPinMessage = null,
        public readonly ?bool $hasScheduled = null,
        public readonly ?bool $videoCallsAvailable = null,
        public readonly ?bool $voiceMessagesForbidden = null,
        public readonly ?bool $translationsDisabled = null,
        public readonly ?bool $storiesPinnedAvailable = null,
        public readonly ?bool $blockedMyStoriesFrom = null,
        public readonly ?bool $wallpaperOverridden = null,
        public readonly ?bool $contactRequirePremium = null,
        public readonly ?bool $readDatesPrivate = null,
        public readonly ?bool $sponsoredEnabled = null,
        public readonly ?bool $canViewRevenue = null,
        public readonly ?bool $botCanManageEmojiStatus = null,
        public readonly ?string $about = null,
        public readonly ?AbstractPhoto $personalPhoto = null,
        public readonly ?AbstractPhoto $profilePhoto = null,
        public readonly ?AbstractPhoto $fallbackPhoto = null,
        public readonly ?AbstractBotInfo $botInfo = null,
        public readonly ?int $pinnedMsgId = null,
        public readonly ?int $folderId = null,
        public readonly ?int $ttlPeriod = null,
        public readonly ?string $themeEmoticon = null,
        public readonly ?string $privateForwardName = null,
        public readonly ?AbstractChatAdminRights $botGroupAdminRights = null,
        public readonly ?AbstractChatAdminRights $botBroadcastAdminRights = null,
        public readonly ?array $premiumGifts = null,
        public readonly ?AbstractWallPaper $wallpaper = null,
        public readonly ?AbstractPeerStories $stories = null,
        public readonly ?AbstractBusinessWorkHours $businessWorkHours = null,
        public readonly ?AbstractBusinessLocation $businessLocation = null,
        public readonly ?AbstractBusinessGreetingMessage $businessGreetingMessage = null,
        public readonly ?AbstractBusinessAwayMessage $businessAwayMessage = null,
        public readonly ?AbstractBusinessIntro $businessIntro = null,
        public readonly ?AbstractBirthday $birthday = null,
        public readonly ?int $personalChannelId = null,
        public readonly ?int $personalChannelMessage = null,
        public readonly ?int $stargiftsCount = null,
        public readonly ?AbstractStarRefProgram $starrefProgram = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->blocked) $flags |= (1 << 0);
        if ($this->phoneCallsAvailable) $flags |= (1 << 4);
        if ($this->phoneCallsPrivate) $flags |= (1 << 5);
        if ($this->canPinMessage) $flags |= (1 << 7);
        if ($this->hasScheduled) $flags |= (1 << 12);
        if ($this->videoCallsAvailable) $flags |= (1 << 13);
        if ($this->voiceMessagesForbidden) $flags |= (1 << 20);
        if ($this->translationsDisabled) $flags |= (1 << 23);
        if ($this->storiesPinnedAvailable) $flags |= (1 << 26);
        if ($this->blockedMyStoriesFrom) $flags |= (1 << 27);
        if ($this->wallpaperOverridden) $flags |= (1 << 28);
        if ($this->contactRequirePremium) $flags |= (1 << 29);
        if ($this->readDatesPrivate) $flags |= (1 << 30);
        if ($this->about !== null) $flags |= (1 << 1);
        if ($this->personalPhoto !== null) $flags |= (1 << 21);
        if ($this->profilePhoto !== null) $flags |= (1 << 2);
        if ($this->fallbackPhoto !== null) $flags |= (1 << 22);
        if ($this->botInfo !== null) $flags |= (1 << 3);
        if ($this->pinnedMsgId !== null) $flags |= (1 << 6);
        if ($this->folderId !== null) $flags |= (1 << 11);
        if ($this->ttlPeriod !== null) $flags |= (1 << 14);
        if ($this->themeEmoticon !== null) $flags |= (1 << 15);
        if ($this->privateForwardName !== null) $flags |= (1 << 16);
        if ($this->botGroupAdminRights !== null) $flags |= (1 << 17);
        if ($this->botBroadcastAdminRights !== null) $flags |= (1 << 18);
        if ($this->premiumGifts !== null) $flags |= (1 << 19);
        if ($this->wallpaper !== null) $flags |= (1 << 24);
        if ($this->stories !== null) $flags |= (1 << 25);
        $buffer .= $serializer->int32($flags);
        $flags2 = 0;
        if ($this->sponsoredEnabled) $flags2 |= (1 << 7);
        if ($this->canViewRevenue) $flags2 |= (1 << 9);
        if ($this->botCanManageEmojiStatus) $flags2 |= (1 << 10);
        if ($this->businessWorkHours !== null) $flags2 |= (1 << 0);
        if ($this->businessLocation !== null) $flags2 |= (1 << 1);
        if ($this->businessGreetingMessage !== null) $flags2 |= (1 << 2);
        if ($this->businessAwayMessage !== null) $flags2 |= (1 << 3);
        if ($this->businessIntro !== null) $flags2 |= (1 << 4);
        if ($this->birthday !== null) $flags2 |= (1 << 5);
        if ($this->personalChannelId !== null) $flags2 |= (1 << 6);
        if ($this->personalChannelMessage !== null) $flags2 |= (1 << 6);
        if ($this->stargiftsCount !== null) $flags2 |= (1 << 8);
        if ($this->starrefProgram !== null) $flags2 |= (1 << 11);
        $buffer .= $serializer->int32($flags2);

        $buffer .= $serializer->int64($this->id);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->about);
        }
        $buffer .= $this->settings->serialize($serializer);
        if ($flags & (1 << 21)) {
            $buffer .= $this->personalPhoto->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->profilePhoto->serialize($serializer);
        }
        if ($flags & (1 << 22)) {
            $buffer .= $this->fallbackPhoto->serialize($serializer);
        }
        $buffer .= $this->notifySettings->serialize($serializer);
        if ($flags & (1 << 3)) {
            $buffer .= $this->botInfo->serialize($serializer);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->int32($this->pinnedMsgId);
        }
        $buffer .= $serializer->int32($this->commonChatsCount);
        if ($flags & (1 << 11)) {
            $buffer .= $serializer->int32($this->folderId);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $serializer->int32($this->ttlPeriod);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $serializer->bytes($this->themeEmoticon);
        }
        if ($flags & (1 << 16)) {
            $buffer .= $serializer->bytes($this->privateForwardName);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->botGroupAdminRights->serialize($serializer);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->botBroadcastAdminRights->serialize($serializer);
        }
        if ($flags & (1 << 19)) {
            $buffer .= $serializer->vectorOfObjects($this->premiumGifts);
        }
        if ($flags & (1 << 24)) {
            $buffer .= $this->wallpaper->serialize($serializer);
        }
        if ($flags & (1 << 25)) {
            $buffer .= $this->stories->serialize($serializer);
        }
        if ($flags2 & (1 << 0)) {
            $buffer .= $this->businessWorkHours->serialize($serializer);
        }
        if ($flags2 & (1 << 1)) {
            $buffer .= $this->businessLocation->serialize($serializer);
        }
        if ($flags2 & (1 << 2)) {
            $buffer .= $this->businessGreetingMessage->serialize($serializer);
        }
        if ($flags2 & (1 << 3)) {
            $buffer .= $this->businessAwayMessage->serialize($serializer);
        }
        if ($flags2 & (1 << 4)) {
            $buffer .= $this->businessIntro->serialize($serializer);
        }
        if ($flags2 & (1 << 5)) {
            $buffer .= $this->birthday->serialize($serializer);
        }
        if ($flags2 & (1 << 6)) {
            $buffer .= $serializer->int64($this->personalChannelId);
        }
        if ($flags2 & (1 << 6)) {
            $buffer .= $serializer->int32($this->personalChannelMessage);
        }
        if ($flags2 & (1 << 8)) {
            $buffer .= $serializer->int32($this->stargiftsCount);
        }
        if ($flags2 & (1 << 11)) {
            $buffer .= $this->starrefProgram->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);
        $flags2 = $deserializer->int32($stream);

        $blocked = ($flags & (1 << 0)) ? true : null;
        $phoneCallsAvailable = ($flags & (1 << 4)) ? true : null;
        $phoneCallsPrivate = ($flags & (1 << 5)) ? true : null;
        $canPinMessage = ($flags & (1 << 7)) ? true : null;
        $hasScheduled = ($flags & (1 << 12)) ? true : null;
        $videoCallsAvailable = ($flags & (1 << 13)) ? true : null;
        $voiceMessagesForbidden = ($flags & (1 << 20)) ? true : null;
        $translationsDisabled = ($flags & (1 << 23)) ? true : null;
        $storiesPinnedAvailable = ($flags & (1 << 26)) ? true : null;
        $blockedMyStoriesFrom = ($flags & (1 << 27)) ? true : null;
        $wallpaperOverridden = ($flags & (1 << 28)) ? true : null;
        $contactRequirePremium = ($flags & (1 << 29)) ? true : null;
        $readDatesPrivate = ($flags & (1 << 30)) ? true : null;
        $sponsoredEnabled = ($flags2 & (1 << 7)) ? true : null;
        $canViewRevenue = ($flags2 & (1 << 9)) ? true : null;
        $botCanManageEmojiStatus = ($flags2 & (1 << 10)) ? true : null;
        $id = $deserializer->int64($stream);
        $about = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $settings = AbstractPeerSettings::deserialize($deserializer, $stream);
        $personalPhoto = ($flags & (1 << 21)) ? AbstractPhoto::deserialize($deserializer, $stream) : null;
        $profilePhoto = ($flags & (1 << 2)) ? AbstractPhoto::deserialize($deserializer, $stream) : null;
        $fallbackPhoto = ($flags & (1 << 22)) ? AbstractPhoto::deserialize($deserializer, $stream) : null;
        $notifySettings = AbstractPeerNotifySettings::deserialize($deserializer, $stream);
        $botInfo = ($flags & (1 << 3)) ? AbstractBotInfo::deserialize($deserializer, $stream) : null;
        $pinnedMsgId = ($flags & (1 << 6)) ? $deserializer->int32($stream) : null;
        $commonChatsCount = $deserializer->int32($stream);
        $folderId = ($flags & (1 << 11)) ? $deserializer->int32($stream) : null;
        $ttlPeriod = ($flags & (1 << 14)) ? $deserializer->int32($stream) : null;
        $themeEmoticon = ($flags & (1 << 15)) ? $deserializer->bytes($stream) : null;
        $privateForwardName = ($flags & (1 << 16)) ? $deserializer->bytes($stream) : null;
        $botGroupAdminRights = ($flags & (1 << 17)) ? AbstractChatAdminRights::deserialize($deserializer, $stream) : null;
        $botBroadcastAdminRights = ($flags & (1 << 18)) ? AbstractChatAdminRights::deserialize($deserializer, $stream) : null;
        $premiumGifts = ($flags & (1 << 19)) ? $deserializer->vectorOfObjects($stream, [AbstractPremiumGiftOption::class, 'deserialize']) : null;
        $wallpaper = ($flags & (1 << 24)) ? AbstractWallPaper::deserialize($deserializer, $stream) : null;
        $stories = ($flags & (1 << 25)) ? AbstractPeerStories::deserialize($deserializer, $stream) : null;
        $businessWorkHours = ($flags2 & (1 << 0)) ? AbstractBusinessWorkHours::deserialize($deserializer, $stream) : null;
        $businessLocation = ($flags2 & (1 << 1)) ? AbstractBusinessLocation::deserialize($deserializer, $stream) : null;
        $businessGreetingMessage = ($flags2 & (1 << 2)) ? AbstractBusinessGreetingMessage::deserialize($deserializer, $stream) : null;
        $businessAwayMessage = ($flags2 & (1 << 3)) ? AbstractBusinessAwayMessage::deserialize($deserializer, $stream) : null;
        $businessIntro = ($flags2 & (1 << 4)) ? AbstractBusinessIntro::deserialize($deserializer, $stream) : null;
        $birthday = ($flags2 & (1 << 5)) ? AbstractBirthday::deserialize($deserializer, $stream) : null;
        $personalChannelId = ($flags2 & (1 << 6)) ? $deserializer->int64($stream) : null;
        $personalChannelMessage = ($flags2 & (1 << 6)) ? $deserializer->int32($stream) : null;
        $stargiftsCount = ($flags2 & (1 << 8)) ? $deserializer->int32($stream) : null;
        $starrefProgram = ($flags2 & (1 << 11)) ? AbstractStarRefProgram::deserialize($deserializer, $stream) : null;
            return new self(
            $id,
            $settings,
            $notifySettings,
            $commonChatsCount,
            $blocked,
            $phoneCallsAvailable,
            $phoneCallsPrivate,
            $canPinMessage,
            $hasScheduled,
            $videoCallsAvailable,
            $voiceMessagesForbidden,
            $translationsDisabled,
            $storiesPinnedAvailable,
            $blockedMyStoriesFrom,
            $wallpaperOverridden,
            $contactRequirePremium,
            $readDatesPrivate,
            $sponsoredEnabled,
            $canViewRevenue,
            $botCanManageEmojiStatus,
            $about,
            $personalPhoto,
            $profilePhoto,
            $fallbackPhoto,
            $botInfo,
            $pinnedMsgId,
            $folderId,
            $ttlPeriod,
            $themeEmoticon,
            $privateForwardName,
            $botGroupAdminRights,
            $botBroadcastAdminRights,
            $premiumGifts,
            $wallpaper,
            $stories,
            $businessWorkHours,
            $businessLocation,
            $businessGreetingMessage,
            $businessAwayMessage,
            $businessIntro,
            $birthday,
            $personalChannelId,
            $personalChannelMessage,
            $stargiftsCount,
            $starrefProgram
        );
    }
}