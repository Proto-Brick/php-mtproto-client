<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelFull
 */
final class ChannelFull extends AbstractChatFull
{
    public const CONSTRUCTOR_ID = 0xe07429de;
    
    public string $predicate = 'channelFull';
    
    /**
     * @param int $id
     * @param string $about
     * @param int $readInboxMaxId
     * @param int $readOutboxMaxId
     * @param int $unreadCount
     * @param AbstractPhoto $chatPhoto
     * @param PeerNotifySettings $notifySettings
     * @param list<BotInfo> $botInfo
     * @param int $pts
     * @param true|null $canViewParticipants
     * @param true|null $canSetUsername
     * @param true|null $canSetStickers
     * @param true|null $hiddenPrehistory
     * @param true|null $canSetLocation
     * @param true|null $hasScheduled
     * @param true|null $canViewStats
     * @param true|null $blocked
     * @param true|null $canDeleteChannel
     * @param true|null $antispam
     * @param true|null $participantsHidden
     * @param true|null $translationsDisabled
     * @param true|null $storiesPinnedAvailable
     * @param true|null $viewForumAsMessages
     * @param true|null $restrictedSponsored
     * @param true|null $canViewRevenue
     * @param true|null $paidMediaAllowed
     * @param true|null $canViewStarsRevenue
     * @param true|null $paidReactionsAvailable
     * @param true|null $stargiftsAvailable
     * @param true|null $paidMessagesAvailable
     * @param int|null $participantsCount
     * @param int|null $adminsCount
     * @param int|null $kickedCount
     * @param int|null $bannedCount
     * @param int|null $onlineCount
     * @param AbstractExportedChatInvite|null $exportedInvite
     * @param int|null $migratedFromChatId
     * @param int|null $migratedFromMaxId
     * @param int|null $pinnedMsgId
     * @param StickerSet|null $stickerset
     * @param int|null $availableMinId
     * @param int|null $folderId
     * @param int|null $linkedChatId
     * @param AbstractChannelLocation|null $location
     * @param int|null $slowmodeSeconds
     * @param int|null $slowmodeNextSendDate
     * @param int|null $statsDc
     * @param AbstractInputGroupCall|null $call
     * @param int|null $ttlPeriod
     * @param list<string>|null $pendingSuggestions
     * @param AbstractPeer|null $groupcallDefaultJoinAs
     * @param string|null $themeEmoticon
     * @param int|null $requestsPending
     * @param list<int>|null $recentRequesters
     * @param AbstractPeer|null $defaultSendAs
     * @param AbstractChatReactions|null $availableReactions
     * @param int|null $reactionsLimit
     * @param PeerStories|null $stories
     * @param AbstractWallPaper|null $wallpaper
     * @param int|null $boostsApplied
     * @param int|null $boostsUnrestrict
     * @param StickerSet|null $emojiset
     * @param BotVerification|null $botVerification
     * @param int|null $stargiftsCount
     * @param int|null $sendPaidMessagesStars
     */
    public function __construct(
        public readonly int $id,
        public readonly string $about,
        public readonly int $readInboxMaxId,
        public readonly int $readOutboxMaxId,
        public readonly int $unreadCount,
        public readonly AbstractPhoto $chatPhoto,
        public readonly PeerNotifySettings $notifySettings,
        public readonly array $botInfo,
        public readonly int $pts,
        public readonly ?true $canViewParticipants = null,
        public readonly ?true $canSetUsername = null,
        public readonly ?true $canSetStickers = null,
        public readonly ?true $hiddenPrehistory = null,
        public readonly ?true $canSetLocation = null,
        public readonly ?true $hasScheduled = null,
        public readonly ?true $canViewStats = null,
        public readonly ?true $blocked = null,
        public readonly ?true $canDeleteChannel = null,
        public readonly ?true $antispam = null,
        public readonly ?true $participantsHidden = null,
        public readonly ?true $translationsDisabled = null,
        public readonly ?true $storiesPinnedAvailable = null,
        public readonly ?true $viewForumAsMessages = null,
        public readonly ?true $restrictedSponsored = null,
        public readonly ?true $canViewRevenue = null,
        public readonly ?true $paidMediaAllowed = null,
        public readonly ?true $canViewStarsRevenue = null,
        public readonly ?true $paidReactionsAvailable = null,
        public readonly ?true $stargiftsAvailable = null,
        public readonly ?true $paidMessagesAvailable = null,
        public readonly ?int $participantsCount = null,
        public readonly ?int $adminsCount = null,
        public readonly ?int $kickedCount = null,
        public readonly ?int $bannedCount = null,
        public readonly ?int $onlineCount = null,
        public readonly ?AbstractExportedChatInvite $exportedInvite = null,
        public readonly ?int $migratedFromChatId = null,
        public readonly ?int $migratedFromMaxId = null,
        public readonly ?int $pinnedMsgId = null,
        public readonly ?StickerSet $stickerset = null,
        public readonly ?int $availableMinId = null,
        public readonly ?int $folderId = null,
        public readonly ?int $linkedChatId = null,
        public readonly ?AbstractChannelLocation $location = null,
        public readonly ?int $slowmodeSeconds = null,
        public readonly ?int $slowmodeNextSendDate = null,
        public readonly ?int $statsDc = null,
        public readonly ?AbstractInputGroupCall $call = null,
        public readonly ?int $ttlPeriod = null,
        public readonly ?array $pendingSuggestions = null,
        public readonly ?AbstractPeer $groupcallDefaultJoinAs = null,
        public readonly ?string $themeEmoticon = null,
        public readonly ?int $requestsPending = null,
        public readonly ?array $recentRequesters = null,
        public readonly ?AbstractPeer $defaultSendAs = null,
        public readonly ?AbstractChatReactions $availableReactions = null,
        public readonly ?int $reactionsLimit = null,
        public readonly ?PeerStories $stories = null,
        public readonly ?AbstractWallPaper $wallpaper = null,
        public readonly ?int $boostsApplied = null,
        public readonly ?int $boostsUnrestrict = null,
        public readonly ?StickerSet $emojiset = null,
        public readonly ?BotVerification $botVerification = null,
        public readonly ?int $stargiftsCount = null,
        public readonly ?int $sendPaidMessagesStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $flags2 = 0;
        if ($this->canViewParticipants) $flags |= (1 << 3);
        if ($this->canSetUsername) $flags |= (1 << 6);
        if ($this->canSetStickers) $flags |= (1 << 7);
        if ($this->hiddenPrehistory) $flags |= (1 << 10);
        if ($this->canSetLocation) $flags |= (1 << 16);
        if ($this->hasScheduled) $flags |= (1 << 19);
        if ($this->canViewStats) $flags |= (1 << 20);
        if ($this->blocked) $flags |= (1 << 22);
        if ($this->canDeleteChannel) $flags2 |= (1 << 0);
        if ($this->antispam) $flags2 |= (1 << 1);
        if ($this->participantsHidden) $flags2 |= (1 << 2);
        if ($this->translationsDisabled) $flags2 |= (1 << 3);
        if ($this->storiesPinnedAvailable) $flags2 |= (1 << 5);
        if ($this->viewForumAsMessages) $flags2 |= (1 << 6);
        if ($this->restrictedSponsored) $flags2 |= (1 << 11);
        if ($this->canViewRevenue) $flags2 |= (1 << 12);
        if ($this->paidMediaAllowed) $flags2 |= (1 << 14);
        if ($this->canViewStarsRevenue) $flags2 |= (1 << 15);
        if ($this->paidReactionsAvailable) $flags2 |= (1 << 16);
        if ($this->stargiftsAvailable) $flags2 |= (1 << 19);
        if ($this->paidMessagesAvailable) $flags2 |= (1 << 20);
        if ($this->participantsCount !== null) $flags |= (1 << 0);
        if ($this->adminsCount !== null) $flags |= (1 << 1);
        if ($this->kickedCount !== null) $flags |= (1 << 2);
        if ($this->bannedCount !== null) $flags |= (1 << 2);
        if ($this->onlineCount !== null) $flags |= (1 << 13);
        if ($this->exportedInvite !== null) $flags |= (1 << 23);
        if ($this->migratedFromChatId !== null) $flags |= (1 << 4);
        if ($this->migratedFromMaxId !== null) $flags |= (1 << 4);
        if ($this->pinnedMsgId !== null) $flags |= (1 << 5);
        if ($this->stickerset !== null) $flags |= (1 << 8);
        if ($this->availableMinId !== null) $flags |= (1 << 9);
        if ($this->folderId !== null) $flags |= (1 << 11);
        if ($this->linkedChatId !== null) $flags |= (1 << 14);
        if ($this->location !== null) $flags |= (1 << 15);
        if ($this->slowmodeSeconds !== null) $flags |= (1 << 17);
        if ($this->slowmodeNextSendDate !== null) $flags |= (1 << 18);
        if ($this->statsDc !== null) $flags |= (1 << 12);
        if ($this->call !== null) $flags |= (1 << 21);
        if ($this->ttlPeriod !== null) $flags |= (1 << 24);
        if ($this->pendingSuggestions !== null) $flags |= (1 << 25);
        if ($this->groupcallDefaultJoinAs !== null) $flags |= (1 << 26);
        if ($this->themeEmoticon !== null) $flags |= (1 << 27);
        if ($this->requestsPending !== null) $flags |= (1 << 28);
        if ($this->recentRequesters !== null) $flags |= (1 << 28);
        if ($this->defaultSendAs !== null) $flags |= (1 << 29);
        if ($this->availableReactions !== null) $flags |= (1 << 30);
        if ($this->reactionsLimit !== null) $flags2 |= (1 << 13);
        if ($this->stories !== null) $flags2 |= (1 << 4);
        if ($this->wallpaper !== null) $flags2 |= (1 << 7);
        if ($this->boostsApplied !== null) $flags2 |= (1 << 8);
        if ($this->boostsUnrestrict !== null) $flags2 |= (1 << 9);
        if ($this->emojiset !== null) $flags2 |= (1 << 10);
        if ($this->botVerification !== null) $flags2 |= (1 << 17);
        if ($this->stargiftsCount !== null) $flags2 |= (1 << 18);
        if ($this->sendPaidMessagesStars !== null) $flags2 |= (1 << 21);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($flags2);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->about);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->participantsCount);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->adminsCount);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->kickedCount);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->bannedCount);
        }
        if ($flags & (1 << 13)) {
            $buffer .= Serializer::int32($this->onlineCount);
        }
        $buffer .= Serializer::int32($this->readInboxMaxId);
        $buffer .= Serializer::int32($this->readOutboxMaxId);
        $buffer .= Serializer::int32($this->unreadCount);
        $buffer .= $this->chatPhoto->serialize();
        $buffer .= $this->notifySettings->serialize();
        if ($flags & (1 << 23)) {
            $buffer .= $this->exportedInvite->serialize();
        }
        $buffer .= Serializer::vectorOfObjects($this->botInfo);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->migratedFromChatId);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->migratedFromMaxId);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->pinnedMsgId);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->stickerset->serialize();
        }
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::int32($this->availableMinId);
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        if ($flags & (1 << 14)) {
            $buffer .= Serializer::int64($this->linkedChatId);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->location->serialize();
        }
        if ($flags & (1 << 17)) {
            $buffer .= Serializer::int32($this->slowmodeSeconds);
        }
        if ($flags & (1 << 18)) {
            $buffer .= Serializer::int32($this->slowmodeNextSendDate);
        }
        if ($flags & (1 << 12)) {
            $buffer .= Serializer::int32($this->statsDc);
        }
        $buffer .= Serializer::int32($this->pts);
        if ($flags & (1 << 21)) {
            $buffer .= $this->call->serialize();
        }
        if ($flags & (1 << 24)) {
            $buffer .= Serializer::int32($this->ttlPeriod);
        }
        if ($flags & (1 << 25)) {
            $buffer .= Serializer::vectorOfStrings($this->pendingSuggestions);
        }
        if ($flags & (1 << 26)) {
            $buffer .= $this->groupcallDefaultJoinAs->serialize();
        }
        if ($flags & (1 << 27)) {
            $buffer .= Serializer::bytes($this->themeEmoticon);
        }
        if ($flags & (1 << 28)) {
            $buffer .= Serializer::int32($this->requestsPending);
        }
        if ($flags & (1 << 28)) {
            $buffer .= Serializer::vectorOfLongs($this->recentRequesters);
        }
        if ($flags & (1 << 29)) {
            $buffer .= $this->defaultSendAs->serialize();
        }
        if ($flags & (1 << 30)) {
            $buffer .= $this->availableReactions->serialize();
        }
        if ($flags2 & (1 << 13)) {
            $buffer .= Serializer::int32($this->reactionsLimit);
        }
        if ($flags2 & (1 << 4)) {
            $buffer .= $this->stories->serialize();
        }
        if ($flags2 & (1 << 7)) {
            $buffer .= $this->wallpaper->serialize();
        }
        if ($flags2 & (1 << 8)) {
            $buffer .= Serializer::int32($this->boostsApplied);
        }
        if ($flags2 & (1 << 9)) {
            $buffer .= Serializer::int32($this->boostsUnrestrict);
        }
        if ($flags2 & (1 << 10)) {
            $buffer .= $this->emojiset->serialize();
        }
        if ($flags2 & (1 << 17)) {
            $buffer .= $this->botVerification->serialize();
        }
        if ($flags2 & (1 << 18)) {
            $buffer .= Serializer::int32($this->stargiftsCount);
        }
        if ($flags2 & (1 << 21)) {
            $buffer .= Serializer::int64($this->sendPaidMessagesStars);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $canViewParticipants = ($flags & (1 << 3)) ? true : null;
        $canSetUsername = ($flags & (1 << 6)) ? true : null;
        $canSetStickers = ($flags & (1 << 7)) ? true : null;
        $hiddenPrehistory = ($flags & (1 << 10)) ? true : null;
        $canSetLocation = ($flags & (1 << 16)) ? true : null;
        $hasScheduled = ($flags & (1 << 19)) ? true : null;
        $canViewStats = ($flags & (1 << 20)) ? true : null;
        $blocked = ($flags & (1 << 22)) ? true : null;
        $flags2 = Deserializer::int32($stream);
        $canDeleteChannel = ($flags2 & (1 << 0)) ? true : null;
        $antispam = ($flags2 & (1 << 1)) ? true : null;
        $participantsHidden = ($flags2 & (1 << 2)) ? true : null;
        $translationsDisabled = ($flags2 & (1 << 3)) ? true : null;
        $storiesPinnedAvailable = ($flags2 & (1 << 5)) ? true : null;
        $viewForumAsMessages = ($flags2 & (1 << 6)) ? true : null;
        $restrictedSponsored = ($flags2 & (1 << 11)) ? true : null;
        $canViewRevenue = ($flags2 & (1 << 12)) ? true : null;
        $paidMediaAllowed = ($flags2 & (1 << 14)) ? true : null;
        $canViewStarsRevenue = ($flags2 & (1 << 15)) ? true : null;
        $paidReactionsAvailable = ($flags2 & (1 << 16)) ? true : null;
        $stargiftsAvailable = ($flags2 & (1 << 19)) ? true : null;
        $paidMessagesAvailable = ($flags2 & (1 << 20)) ? true : null;
        $id = Deserializer::int64($stream);
        $about = Deserializer::bytes($stream);
        $participantsCount = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $adminsCount = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $kickedCount = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $bannedCount = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $onlineCount = ($flags & (1 << 13)) ? Deserializer::int32($stream) : null;
        $readInboxMaxId = Deserializer::int32($stream);
        $readOutboxMaxId = Deserializer::int32($stream);
        $unreadCount = Deserializer::int32($stream);
        $chatPhoto = AbstractPhoto::deserialize($stream);
        $notifySettings = PeerNotifySettings::deserialize($stream);
        $exportedInvite = ($flags & (1 << 23)) ? AbstractExportedChatInvite::deserialize($stream) : null;
        $botInfo = Deserializer::vectorOfObjects($stream, [BotInfo::class, 'deserialize']);
        $migratedFromChatId = ($flags & (1 << 4)) ? Deserializer::int64($stream) : null;
        $migratedFromMaxId = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $pinnedMsgId = ($flags & (1 << 5)) ? Deserializer::int32($stream) : null;
        $stickerset = ($flags & (1 << 8)) ? StickerSet::deserialize($stream) : null;
        $availableMinId = ($flags & (1 << 9)) ? Deserializer::int32($stream) : null;
        $folderId = ($flags & (1 << 11)) ? Deserializer::int32($stream) : null;
        $linkedChatId = ($flags & (1 << 14)) ? Deserializer::int64($stream) : null;
        $location = ($flags & (1 << 15)) ? AbstractChannelLocation::deserialize($stream) : null;
        $slowmodeSeconds = ($flags & (1 << 17)) ? Deserializer::int32($stream) : null;
        $slowmodeNextSendDate = ($flags & (1 << 18)) ? Deserializer::int32($stream) : null;
        $statsDc = ($flags & (1 << 12)) ? Deserializer::int32($stream) : null;
        $pts = Deserializer::int32($stream);
        $call = ($flags & (1 << 21)) ? AbstractInputGroupCall::deserialize($stream) : null;
        $ttlPeriod = ($flags & (1 << 24)) ? Deserializer::int32($stream) : null;
        $pendingSuggestions = ($flags & (1 << 25)) ? Deserializer::vectorOfStrings($stream) : null;
        $groupcallDefaultJoinAs = ($flags & (1 << 26)) ? AbstractPeer::deserialize($stream) : null;
        $themeEmoticon = ($flags & (1 << 27)) ? Deserializer::bytes($stream) : null;
        $requestsPending = ($flags & (1 << 28)) ? Deserializer::int32($stream) : null;
        $recentRequesters = ($flags & (1 << 28)) ? Deserializer::vectorOfLongs($stream) : null;
        $defaultSendAs = ($flags & (1 << 29)) ? AbstractPeer::deserialize($stream) : null;
        $availableReactions = ($flags & (1 << 30)) ? AbstractChatReactions::deserialize($stream) : null;
        $reactionsLimit = ($flags2 & (1 << 13)) ? Deserializer::int32($stream) : null;
        $stories = ($flags2 & (1 << 4)) ? PeerStories::deserialize($stream) : null;
        $wallpaper = ($flags2 & (1 << 7)) ? AbstractWallPaper::deserialize($stream) : null;
        $boostsApplied = ($flags2 & (1 << 8)) ? Deserializer::int32($stream) : null;
        $boostsUnrestrict = ($flags2 & (1 << 9)) ? Deserializer::int32($stream) : null;
        $emojiset = ($flags2 & (1 << 10)) ? StickerSet::deserialize($stream) : null;
        $botVerification = ($flags2 & (1 << 17)) ? BotVerification::deserialize($stream) : null;
        $stargiftsCount = ($flags2 & (1 << 18)) ? Deserializer::int32($stream) : null;
        $sendPaidMessagesStars = ($flags2 & (1 << 21)) ? Deserializer::int64($stream) : null;

        return new self(
            $id,
            $about,
            $readInboxMaxId,
            $readOutboxMaxId,
            $unreadCount,
            $chatPhoto,
            $notifySettings,
            $botInfo,
            $pts,
            $canViewParticipants,
            $canSetUsername,
            $canSetStickers,
            $hiddenPrehistory,
            $canSetLocation,
            $hasScheduled,
            $canViewStats,
            $blocked,
            $canDeleteChannel,
            $antispam,
            $participantsHidden,
            $translationsDisabled,
            $storiesPinnedAvailable,
            $viewForumAsMessages,
            $restrictedSponsored,
            $canViewRevenue,
            $paidMediaAllowed,
            $canViewStarsRevenue,
            $paidReactionsAvailable,
            $stargiftsAvailable,
            $paidMessagesAvailable,
            $participantsCount,
            $adminsCount,
            $kickedCount,
            $bannedCount,
            $onlineCount,
            $exportedInvite,
            $migratedFromChatId,
            $migratedFromMaxId,
            $pinnedMsgId,
            $stickerset,
            $availableMinId,
            $folderId,
            $linkedChatId,
            $location,
            $slowmodeSeconds,
            $slowmodeNextSendDate,
            $statsDc,
            $call,
            $ttlPeriod,
            $pendingSuggestions,
            $groupcallDefaultJoinAs,
            $themeEmoticon,
            $requestsPending,
            $recentRequesters,
            $defaultSendAs,
            $availableReactions,
            $reactionsLimit,
            $stories,
            $wallpaper,
            $boostsApplied,
            $boostsUnrestrict,
            $emojiset,
            $botVerification,
            $stargiftsCount,
            $sendPaidMessagesStars
        );
    }
}