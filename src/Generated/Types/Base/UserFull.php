<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/userFull
 */
final class UserFull extends TlObject
{
    public const CONSTRUCTOR_ID = 0x979d2376;
    
    public string $predicate = 'userFull';
    
    /**
     * @param int $id
     * @param PeerSettings $settings
     * @param PeerNotifySettings $notifySettings
     * @param int $commonChatsCount
     * @param true|null $blocked
     * @param true|null $phoneCallsAvailable
     * @param true|null $phoneCallsPrivate
     * @param true|null $canPinMessage
     * @param true|null $hasScheduled
     * @param true|null $videoCallsAvailable
     * @param true|null $voiceMessagesForbidden
     * @param true|null $translationsDisabled
     * @param true|null $storiesPinnedAvailable
     * @param true|null $blockedMyStoriesFrom
     * @param true|null $wallpaperOverridden
     * @param true|null $contactRequirePremium
     * @param true|null $readDatesPrivate
     * @param true|null $sponsoredEnabled
     * @param true|null $canViewRevenue
     * @param true|null $botCanManageEmojiStatus
     * @param string|null $about
     * @param AbstractPhoto|null $personalPhoto
     * @param AbstractPhoto|null $profilePhoto
     * @param AbstractPhoto|null $fallbackPhoto
     * @param BotInfo|null $botInfo
     * @param int|null $pinnedMsgId
     * @param int|null $folderId
     * @param int|null $ttlPeriod
     * @param string|null $themeEmoticon
     * @param string|null $privateForwardName
     * @param ChatAdminRights|null $botGroupAdminRights
     * @param ChatAdminRights|null $botBroadcastAdminRights
     * @param list<PremiumGiftOption>|null $premiumGifts
     * @param AbstractWallPaper|null $wallpaper
     * @param PeerStories|null $stories
     * @param BusinessWorkHours|null $businessWorkHours
     * @param BusinessLocation|null $businessLocation
     * @param BusinessGreetingMessage|null $businessGreetingMessage
     * @param BusinessAwayMessage|null $businessAwayMessage
     * @param BusinessIntro|null $businessIntro
     * @param Birthday|null $birthday
     * @param int|null $personalChannelId
     * @param int|null $personalChannelMessage
     * @param int|null $stargiftsCount
     * @param StarRefProgram|null $starrefProgram
     */
    public function __construct(
        public readonly int $id,
        public readonly PeerSettings $settings,
        public readonly PeerNotifySettings $notifySettings,
        public readonly int $commonChatsCount,
        public readonly ?true $blocked = null,
        public readonly ?true $phoneCallsAvailable = null,
        public readonly ?true $phoneCallsPrivate = null,
        public readonly ?true $canPinMessage = null,
        public readonly ?true $hasScheduled = null,
        public readonly ?true $videoCallsAvailable = null,
        public readonly ?true $voiceMessagesForbidden = null,
        public readonly ?true $translationsDisabled = null,
        public readonly ?true $storiesPinnedAvailable = null,
        public readonly ?true $blockedMyStoriesFrom = null,
        public readonly ?true $wallpaperOverridden = null,
        public readonly ?true $contactRequirePremium = null,
        public readonly ?true $readDatesPrivate = null,
        public readonly ?true $sponsoredEnabled = null,
        public readonly ?true $canViewRevenue = null,
        public readonly ?true $botCanManageEmojiStatus = null,
        public readonly ?string $about = null,
        public readonly ?AbstractPhoto $personalPhoto = null,
        public readonly ?AbstractPhoto $profilePhoto = null,
        public readonly ?AbstractPhoto $fallbackPhoto = null,
        public readonly ?BotInfo $botInfo = null,
        public readonly ?int $pinnedMsgId = null,
        public readonly ?int $folderId = null,
        public readonly ?int $ttlPeriod = null,
        public readonly ?string $themeEmoticon = null,
        public readonly ?string $privateForwardName = null,
        public readonly ?ChatAdminRights $botGroupAdminRights = null,
        public readonly ?ChatAdminRights $botBroadcastAdminRights = null,
        public readonly ?array $premiumGifts = null,
        public readonly ?AbstractWallPaper $wallpaper = null,
        public readonly ?PeerStories $stories = null,
        public readonly ?BusinessWorkHours $businessWorkHours = null,
        public readonly ?BusinessLocation $businessLocation = null,
        public readonly ?BusinessGreetingMessage $businessGreetingMessage = null,
        public readonly ?BusinessAwayMessage $businessAwayMessage = null,
        public readonly ?BusinessIntro $businessIntro = null,
        public readonly ?Birthday $birthday = null,
        public readonly ?int $personalChannelId = null,
        public readonly ?int $personalChannelMessage = null,
        public readonly ?int $stargiftsCount = null,
        public readonly ?StarRefProgram $starrefProgram = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $flags2 = 0;
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
        if ($this->sponsoredEnabled) $flags2 |= (1 << 7);
        if ($this->canViewRevenue) $flags2 |= (1 << 9);
        if ($this->botCanManageEmojiStatus) $flags2 |= (1 << 10);
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
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($flags2);
        $buffer .= Serializer::int64($this->id);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->about);
        }
        $buffer .= $this->settings->serialize();
        if ($flags & (1 << 21)) {
            $buffer .= $this->personalPhoto->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->profilePhoto->serialize();
        }
        if ($flags & (1 << 22)) {
            $buffer .= $this->fallbackPhoto->serialize();
        }
        $buffer .= $this->notifySettings->serialize();
        if ($flags & (1 << 3)) {
            $buffer .= $this->botInfo->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->pinnedMsgId);
        }
        $buffer .= Serializer::int32($this->commonChatsCount);
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        if ($flags & (1 << 14)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }
        if ($flags & (1 << 15)) {
            $buffer .= Serializer::bytes($this->themeEmoticon);
        }
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::bytes($this->privateForwardName);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->botGroupAdminRights->serialize();
        }
        if ($flags & (1 << 18)) {
            $buffer .= $this->botBroadcastAdminRights->serialize();
        }
        if ($flags & (1 << 19)) {
            $buffer .= Serializer::vectorOfObjects($this->premiumGifts);
        }
        if ($flags & (1 << 24)) {
            $buffer .= $this->wallpaper->serialize();
        }
        if ($flags & (1 << 25)) {
            $buffer .= $this->stories->serialize();
        }
        if ($flags2 & (1 << 0)) {
            $buffer .= $this->businessWorkHours->serialize();
        }
        if ($flags2 & (1 << 1)) {
            $buffer .= $this->businessLocation->serialize();
        }
        if ($flags2 & (1 << 2)) {
            $buffer .= $this->businessGreetingMessage->serialize();
        }
        if ($flags2 & (1 << 3)) {
            $buffer .= $this->businessAwayMessage->serialize();
        }
        if ($flags2 & (1 << 4)) {
            $buffer .= $this->businessIntro->serialize();
        }
        if ($flags2 & (1 << 5)) {
            $buffer .= $this->birthday->serialize();
        }
        if ($flags2 & (1 << 6)) {
            $buffer .= Serializer::int64($this->personalChannelId);
        }
        if ($flags2 & (1 << 6)) {
            $buffer .= Serializer::int32($this->personalChannelMessage);
        }
        if ($flags2 & (1 << 8)) {
            $buffer .= Serializer::int32($this->stargiftsCount);
        }
        if ($flags2 & (1 << 11)) {
            $buffer .= $this->starrefProgram->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
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
        $flags2 = Deserializer::int32($stream);
        $sponsoredEnabled = ($flags2 & (1 << 7)) ? true : null;
        $canViewRevenue = ($flags2 & (1 << 9)) ? true : null;
        $botCanManageEmojiStatus = ($flags2 & (1 << 10)) ? true : null;
        $id = Deserializer::int64($stream);
        $about = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $settings = PeerSettings::deserialize($stream);
        $personalPhoto = ($flags & (1 << 21)) ? AbstractPhoto::deserialize($stream) : null;
        $profilePhoto = ($flags & (1 << 2)) ? AbstractPhoto::deserialize($stream) : null;
        $fallbackPhoto = ($flags & (1 << 22)) ? AbstractPhoto::deserialize($stream) : null;
        $notifySettings = PeerNotifySettings::deserialize($stream);
        $botInfo = ($flags & (1 << 3)) ? BotInfo::deserialize($stream) : null;
        $pinnedMsgId = ($flags & (1 << 6)) ? Deserializer::int32($stream) : null;
        $commonChatsCount = Deserializer::int32($stream);
        $folderId = ($flags & (1 << 11)) ? Deserializer::int32($stream) : null;
        $ttlPeriod = ($flags & (1 << 14)) ? Deserializer::int32($stream) : null;
        $themeEmoticon = ($flags & (1 << 15)) ? Deserializer::bytes($stream) : null;
        $privateForwardName = ($flags & (1 << 16)) ? Deserializer::bytes($stream) : null;
        $botGroupAdminRights = ($flags & (1 << 17)) ? ChatAdminRights::deserialize($stream) : null;
        $botBroadcastAdminRights = ($flags & (1 << 18)) ? ChatAdminRights::deserialize($stream) : null;
        $premiumGifts = ($flags & (1 << 19)) ? Deserializer::vectorOfObjects($stream, [PremiumGiftOption::class, 'deserialize']) : null;
        $wallpaper = ($flags & (1 << 24)) ? AbstractWallPaper::deserialize($stream) : null;
        $stories = ($flags & (1 << 25)) ? PeerStories::deserialize($stream) : null;
        $businessWorkHours = ($flags2 & (1 << 0)) ? BusinessWorkHours::deserialize($stream) : null;
        $businessLocation = ($flags2 & (1 << 1)) ? BusinessLocation::deserialize($stream) : null;
        $businessGreetingMessage = ($flags2 & (1 << 2)) ? BusinessGreetingMessage::deserialize($stream) : null;
        $businessAwayMessage = ($flags2 & (1 << 3)) ? BusinessAwayMessage::deserialize($stream) : null;
        $businessIntro = ($flags2 & (1 << 4)) ? BusinessIntro::deserialize($stream) : null;
        $birthday = ($flags2 & (1 << 5)) ? Birthday::deserialize($stream) : null;
        $personalChannelId = ($flags2 & (1 << 6)) ? Deserializer::int64($stream) : null;
        $personalChannelMessage = ($flags2 & (1 << 6)) ? Deserializer::int32($stream) : null;
        $stargiftsCount = ($flags2 & (1 << 8)) ? Deserializer::int32($stream) : null;
        $starrefProgram = ($flags2 & (1 << 11)) ? StarRefProgram::deserialize($stream) : null;

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