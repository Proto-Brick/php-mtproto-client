<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/userFull
 */
final class UserFull extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa02bc13e;
    
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
     * @param true|null $displayGiftsButton
     * @param string|null $about
     * @param AbstractPhoto|null $personalPhoto
     * @param AbstractPhoto|null $profilePhoto
     * @param AbstractPhoto|null $fallbackPhoto
     * @param BotInfo|null $botInfo
     * @param int|null $pinnedMsgId
     * @param int|null $folderId
     * @param int|null $ttlPeriod
     * @param AbstractChatTheme|null $theme
     * @param string|null $privateForwardName
     * @param ChatAdminRights|null $botGroupAdminRights
     * @param ChatAdminRights|null $botBroadcastAdminRights
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
     * @param BotVerification|null $botVerification
     * @param int|null $sendPaidMessagesStars
     * @param DisallowedGiftsSettings|null $disallowedGifts
     * @param StarsRating|null $starsRating
     * @param StarsRating|null $starsMyPendingRating
     * @param int|null $starsMyPendingRatingDate
     * @param ProfileTab|null $mainTab
     * @param AbstractDocument|null $savedMusic
     * @param TextWithEntities|null $note
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
        public readonly ?true $displayGiftsButton = null,
        public readonly ?string $about = null,
        public readonly ?AbstractPhoto $personalPhoto = null,
        public readonly ?AbstractPhoto $profilePhoto = null,
        public readonly ?AbstractPhoto $fallbackPhoto = null,
        public readonly ?BotInfo $botInfo = null,
        public readonly ?int $pinnedMsgId = null,
        public readonly ?int $folderId = null,
        public readonly ?int $ttlPeriod = null,
        public readonly ?AbstractChatTheme $theme = null,
        public readonly ?string $privateForwardName = null,
        public readonly ?ChatAdminRights $botGroupAdminRights = null,
        public readonly ?ChatAdminRights $botBroadcastAdminRights = null,
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
        public readonly ?StarRefProgram $starrefProgram = null,
        public readonly ?BotVerification $botVerification = null,
        public readonly ?int $sendPaidMessagesStars = null,
        public readonly ?DisallowedGiftsSettings $disallowedGifts = null,
        public readonly ?StarsRating $starsRating = null,
        public readonly ?StarsRating $starsMyPendingRating = null,
        public readonly ?int $starsMyPendingRatingDate = null,
        public readonly ?ProfileTab $mainTab = null,
        public readonly ?AbstractDocument $savedMusic = null,
        public readonly ?TextWithEntities $note = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $flags2 = 0;
        if ($this->blocked) {
            $flags |= (1 << 0);
        }
        if ($this->phoneCallsAvailable) {
            $flags |= (1 << 4);
        }
        if ($this->phoneCallsPrivate) {
            $flags |= (1 << 5);
        }
        if ($this->canPinMessage) {
            $flags |= (1 << 7);
        }
        if ($this->hasScheduled) {
            $flags |= (1 << 12);
        }
        if ($this->videoCallsAvailable) {
            $flags |= (1 << 13);
        }
        if ($this->voiceMessagesForbidden) {
            $flags |= (1 << 20);
        }
        if ($this->translationsDisabled) {
            $flags |= (1 << 23);
        }
        if ($this->storiesPinnedAvailable) {
            $flags |= (1 << 26);
        }
        if ($this->blockedMyStoriesFrom) {
            $flags |= (1 << 27);
        }
        if ($this->wallpaperOverridden) {
            $flags |= (1 << 28);
        }
        if ($this->contactRequirePremium) {
            $flags |= (1 << 29);
        }
        if ($this->readDatesPrivate) {
            $flags |= (1 << 30);
        }
        if ($this->sponsoredEnabled) {
            $flags2 |= (1 << 7);
        }
        if ($this->canViewRevenue) {
            $flags2 |= (1 << 9);
        }
        if ($this->botCanManageEmojiStatus) {
            $flags2 |= (1 << 10);
        }
        if ($this->displayGiftsButton) {
            $flags2 |= (1 << 16);
        }
        if ($this->about !== null) {
            $flags |= (1 << 1);
        }
        if ($this->personalPhoto !== null) {
            $flags |= (1 << 21);
        }
        if ($this->profilePhoto !== null) {
            $flags |= (1 << 2);
        }
        if ($this->fallbackPhoto !== null) {
            $flags |= (1 << 22);
        }
        if ($this->botInfo !== null) {
            $flags |= (1 << 3);
        }
        if ($this->pinnedMsgId !== null) {
            $flags |= (1 << 6);
        }
        if ($this->folderId !== null) {
            $flags |= (1 << 11);
        }
        if ($this->ttlPeriod !== null) {
            $flags |= (1 << 14);
        }
        if ($this->theme !== null) {
            $flags |= (1 << 15);
        }
        if ($this->privateForwardName !== null) {
            $flags |= (1 << 16);
        }
        if ($this->botGroupAdminRights !== null) {
            $flags |= (1 << 17);
        }
        if ($this->botBroadcastAdminRights !== null) {
            $flags |= (1 << 18);
        }
        if ($this->wallpaper !== null) {
            $flags |= (1 << 24);
        }
        if ($this->stories !== null) {
            $flags |= (1 << 25);
        }
        if ($this->businessWorkHours !== null) {
            $flags2 |= (1 << 0);
        }
        if ($this->businessLocation !== null) {
            $flags2 |= (1 << 1);
        }
        if ($this->businessGreetingMessage !== null) {
            $flags2 |= (1 << 2);
        }
        if ($this->businessAwayMessage !== null) {
            $flags2 |= (1 << 3);
        }
        if ($this->businessIntro !== null) {
            $flags2 |= (1 << 4);
        }
        if ($this->birthday !== null) {
            $flags2 |= (1 << 5);
        }
        if ($this->personalChannelId !== null) {
            $flags2 |= (1 << 6);
        }
        if ($this->personalChannelMessage !== null) {
            $flags2 |= (1 << 6);
        }
        if ($this->stargiftsCount !== null) {
            $flags2 |= (1 << 8);
        }
        if ($this->starrefProgram !== null) {
            $flags2 |= (1 << 11);
        }
        if ($this->botVerification !== null) {
            $flags2 |= (1 << 12);
        }
        if ($this->sendPaidMessagesStars !== null) {
            $flags2 |= (1 << 14);
        }
        if ($this->disallowedGifts !== null) {
            $flags2 |= (1 << 15);
        }
        if ($this->starsRating !== null) {
            $flags2 |= (1 << 17);
        }
        if ($this->starsMyPendingRating !== null) {
            $flags2 |= (1 << 18);
        }
        if ($this->starsMyPendingRatingDate !== null) {
            $flags2 |= (1 << 18);
        }
        if ($this->mainTab !== null) {
            $flags2 |= (1 << 20);
        }
        if ($this->savedMusic !== null) {
            $flags2 |= (1 << 21);
        }
        if ($this->note !== null) {
            $flags2 |= (1 << 22);
        }
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
            $buffer .= $this->theme->serialize();
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
        if ($flags2 & (1 << 12)) {
            $buffer .= $this->botVerification->serialize();
        }
        if ($flags2 & (1 << 14)) {
            $buffer .= Serializer::int64($this->sendPaidMessagesStars);
        }
        if ($flags2 & (1 << 15)) {
            $buffer .= $this->disallowedGifts->serialize();
        }
        if ($flags2 & (1 << 17)) {
            $buffer .= $this->starsRating->serialize();
        }
        if ($flags2 & (1 << 18)) {
            $buffer .= $this->starsMyPendingRating->serialize();
        }
        if ($flags2 & (1 << 18)) {
            $buffer .= Serializer::int32($this->starsMyPendingRatingDate);
        }
        if ($flags2 & (1 << 20)) {
            $buffer .= $this->mainTab->serialize();
        }
        if ($flags2 & (1 << 21)) {
            $buffer .= $this->savedMusic->serialize();
        }
        if ($flags2 & (1 << 22)) {
            $buffer .= $this->note->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $blocked = (($flags & (1 << 0)) !== 0) ? true : null;
        $phoneCallsAvailable = (($flags & (1 << 4)) !== 0) ? true : null;
        $phoneCallsPrivate = (($flags & (1 << 5)) !== 0) ? true : null;
        $canPinMessage = (($flags & (1 << 7)) !== 0) ? true : null;
        $hasScheduled = (($flags & (1 << 12)) !== 0) ? true : null;
        $videoCallsAvailable = (($flags & (1 << 13)) !== 0) ? true : null;
        $voiceMessagesForbidden = (($flags & (1 << 20)) !== 0) ? true : null;
        $translationsDisabled = (($flags & (1 << 23)) !== 0) ? true : null;
        $storiesPinnedAvailable = (($flags & (1 << 26)) !== 0) ? true : null;
        $blockedMyStoriesFrom = (($flags & (1 << 27)) !== 0) ? true : null;
        $wallpaperOverridden = (($flags & (1 << 28)) !== 0) ? true : null;
        $contactRequirePremium = (($flags & (1 << 29)) !== 0) ? true : null;
        $readDatesPrivate = (($flags & (1 << 30)) !== 0) ? true : null;
        $flags2 = Deserializer::int32($__payload, $__offset);
        $sponsoredEnabled = (($flags2 & (1 << 7)) !== 0) ? true : null;
        $canViewRevenue = (($flags2 & (1 << 9)) !== 0) ? true : null;
        $botCanManageEmojiStatus = (($flags2 & (1 << 10)) !== 0) ? true : null;
        $displayGiftsButton = (($flags2 & (1 << 16)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $about = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $settings = PeerSettings::deserialize($__payload, $__offset);
        $personalPhoto = (($flags & (1 << 21)) !== 0) ? AbstractPhoto::deserialize($__payload, $__offset) : null;
        $profilePhoto = (($flags & (1 << 2)) !== 0) ? AbstractPhoto::deserialize($__payload, $__offset) : null;
        $fallbackPhoto = (($flags & (1 << 22)) !== 0) ? AbstractPhoto::deserialize($__payload, $__offset) : null;
        $notifySettings = PeerNotifySettings::deserialize($__payload, $__offset);
        $botInfo = (($flags & (1 << 3)) !== 0) ? BotInfo::deserialize($__payload, $__offset) : null;
        $pinnedMsgId = (($flags & (1 << 6)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $commonChatsCount = Deserializer::int32($__payload, $__offset);
        $folderId = (($flags & (1 << 11)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $ttlPeriod = (($flags & (1 << 14)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $theme = (($flags & (1 << 15)) !== 0) ? AbstractChatTheme::deserialize($__payload, $__offset) : null;
        $privateForwardName = (($flags & (1 << 16)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $botGroupAdminRights = (($flags & (1 << 17)) !== 0) ? ChatAdminRights::deserialize($__payload, $__offset) : null;
        $botBroadcastAdminRights = (($flags & (1 << 18)) !== 0) ? ChatAdminRights::deserialize($__payload, $__offset) : null;
        $wallpaper = (($flags & (1 << 24)) !== 0) ? AbstractWallPaper::deserialize($__payload, $__offset) : null;
        $stories = (($flags & (1 << 25)) !== 0) ? PeerStories::deserialize($__payload, $__offset) : null;
        $businessWorkHours = (($flags2 & (1 << 0)) !== 0) ? BusinessWorkHours::deserialize($__payload, $__offset) : null;
        $businessLocation = (($flags2 & (1 << 1)) !== 0) ? BusinessLocation::deserialize($__payload, $__offset) : null;
        $businessGreetingMessage = (($flags2 & (1 << 2)) !== 0) ? BusinessGreetingMessage::deserialize($__payload, $__offset) : null;
        $businessAwayMessage = (($flags2 & (1 << 3)) !== 0) ? BusinessAwayMessage::deserialize($__payload, $__offset) : null;
        $businessIntro = (($flags2 & (1 << 4)) !== 0) ? BusinessIntro::deserialize($__payload, $__offset) : null;
        $birthday = (($flags2 & (1 << 5)) !== 0) ? Birthday::deserialize($__payload, $__offset) : null;
        $personalChannelId = (($flags2 & (1 << 6)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $personalChannelMessage = (($flags2 & (1 << 6)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $stargiftsCount = (($flags2 & (1 << 8)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $starrefProgram = (($flags2 & (1 << 11)) !== 0) ? StarRefProgram::deserialize($__payload, $__offset) : null;
        $botVerification = (($flags2 & (1 << 12)) !== 0) ? BotVerification::deserialize($__payload, $__offset) : null;
        $sendPaidMessagesStars = (($flags2 & (1 << 14)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $disallowedGifts = (($flags2 & (1 << 15)) !== 0) ? DisallowedGiftsSettings::deserialize($__payload, $__offset) : null;
        $starsRating = (($flags2 & (1 << 17)) !== 0) ? StarsRating::deserialize($__payload, $__offset) : null;
        $starsMyPendingRating = (($flags2 & (1 << 18)) !== 0) ? StarsRating::deserialize($__payload, $__offset) : null;
        $starsMyPendingRatingDate = (($flags2 & (1 << 18)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $mainTab = (($flags2 & (1 << 20)) !== 0) ? ProfileTab::deserialize($__payload, $__offset) : null;
        $savedMusic = (($flags2 & (1 << 21)) !== 0) ? AbstractDocument::deserialize($__payload, $__offset) : null;
        $note = (($flags2 & (1 << 22)) !== 0) ? TextWithEntities::deserialize($__payload, $__offset) : null;

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
            $displayGiftsButton,
            $about,
            $personalPhoto,
            $profilePhoto,
            $fallbackPhoto,
            $botInfo,
            $pinnedMsgId,
            $folderId,
            $ttlPeriod,
            $theme,
            $privateForwardName,
            $botGroupAdminRights,
            $botBroadcastAdminRights,
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
            $starrefProgram,
            $botVerification,
            $sendPaidMessagesStars,
            $disallowedGifts,
            $starsRating,
            $starsMyPendingRating,
            $starsMyPendingRatingDate,
            $mainTab,
            $savedMusic,
            $note
        );
    }
}