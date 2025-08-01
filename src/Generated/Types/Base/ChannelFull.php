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
    public const CONSTRUCTOR_ID = 3148559501;
    
    public string $_ = 'channelFull';
    
    /**
     * @param int $id
     * @param string $about
     * @param int $readInboxMaxId
     * @param int $readOutboxMaxId
     * @param int $unreadCount
     * @param AbstractPhoto $chatPhoto
     * @param AbstractPeerNotifySettings $notifySettings
     * @param list<AbstractBotInfo> $botInfo
     * @param int $pts
     * @param bool|null $canViewParticipants
     * @param bool|null $canSetUsername
     * @param bool|null $canSetStickers
     * @param bool|null $hiddenPrehistory
     * @param bool|null $canSetLocation
     * @param bool|null $hasScheduled
     * @param bool|null $canViewStats
     * @param bool|null $blocked
     * @param bool|null $canDeleteChannel
     * @param bool|null $antispam
     * @param bool|null $participantsHidden
     * @param bool|null $translationsDisabled
     * @param bool|null $storiesPinnedAvailable
     * @param bool|null $viewForumAsMessages
     * @param bool|null $restrictedSponsored
     * @param bool|null $canViewRevenue
     * @param bool|null $paidMediaAllowed
     * @param bool|null $canViewStarsRevenue
     * @param bool|null $paidReactionsAvailable
     * @param int|null $participantsCount
     * @param int|null $adminsCount
     * @param int|null $kickedCount
     * @param int|null $bannedCount
     * @param int|null $onlineCount
     * @param AbstractExportedChatInvite|null $exportedInvite
     * @param int|null $migratedFromChatId
     * @param int|null $migratedFromMaxId
     * @param int|null $pinnedMsgId
     * @param AbstractStickerSet|null $stickerset
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
     * @param AbstractPeerStories|null $stories
     * @param AbstractWallPaper|null $wallpaper
     * @param int|null $boostsApplied
     * @param int|null $boostsUnrestrict
     * @param AbstractStickerSet|null $emojiset
     */
    public function __construct(
        public readonly int $id,
        public readonly string $about,
        public readonly int $readInboxMaxId,
        public readonly int $readOutboxMaxId,
        public readonly int $unreadCount,
        public readonly AbstractPhoto $chatPhoto,
        public readonly AbstractPeerNotifySettings $notifySettings,
        public readonly array $botInfo,
        public readonly int $pts,
        public readonly ?bool $canViewParticipants = null,
        public readonly ?bool $canSetUsername = null,
        public readonly ?bool $canSetStickers = null,
        public readonly ?bool $hiddenPrehistory = null,
        public readonly ?bool $canSetLocation = null,
        public readonly ?bool $hasScheduled = null,
        public readonly ?bool $canViewStats = null,
        public readonly ?bool $blocked = null,
        public readonly ?bool $canDeleteChannel = null,
        public readonly ?bool $antispam = null,
        public readonly ?bool $participantsHidden = null,
        public readonly ?bool $translationsDisabled = null,
        public readonly ?bool $storiesPinnedAvailable = null,
        public readonly ?bool $viewForumAsMessages = null,
        public readonly ?bool $restrictedSponsored = null,
        public readonly ?bool $canViewRevenue = null,
        public readonly ?bool $paidMediaAllowed = null,
        public readonly ?bool $canViewStarsRevenue = null,
        public readonly ?bool $paidReactionsAvailable = null,
        public readonly ?int $participantsCount = null,
        public readonly ?int $adminsCount = null,
        public readonly ?int $kickedCount = null,
        public readonly ?int $bannedCount = null,
        public readonly ?int $onlineCount = null,
        public readonly ?AbstractExportedChatInvite $exportedInvite = null,
        public readonly ?int $migratedFromChatId = null,
        public readonly ?int $migratedFromMaxId = null,
        public readonly ?int $pinnedMsgId = null,
        public readonly ?AbstractStickerSet $stickerset = null,
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
        public readonly ?AbstractPeerStories $stories = null,
        public readonly ?AbstractWallPaper $wallpaper = null,
        public readonly ?int $boostsApplied = null,
        public readonly ?int $boostsUnrestrict = null,
        public readonly ?AbstractStickerSet $emojiset = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canViewParticipants) $flags |= (1 << 3);
        if ($this->canSetUsername) $flags |= (1 << 6);
        if ($this->canSetStickers) $flags |= (1 << 7);
        if ($this->hiddenPrehistory) $flags |= (1 << 10);
        if ($this->canSetLocation) $flags |= (1 << 16);
        if ($this->hasScheduled) $flags |= (1 << 19);
        if ($this->canViewStats) $flags |= (1 << 20);
        if ($this->blocked) $flags |= (1 << 22);
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
        $buffer .= $serializer->int32($flags);
        $flags2 = 0;
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
        if ($this->reactionsLimit !== null) $flags2 |= (1 << 13);
        if ($this->stories !== null) $flags2 |= (1 << 4);
        if ($this->wallpaper !== null) $flags2 |= (1 << 7);
        if ($this->boostsApplied !== null) $flags2 |= (1 << 8);
        if ($this->boostsUnrestrict !== null) $flags2 |= (1 << 9);
        if ($this->emojiset !== null) $flags2 |= (1 << 10);
        $buffer .= $serializer->int32($flags2);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->bytes($this->about);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->participantsCount);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->adminsCount);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->kickedCount);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->bannedCount);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $serializer->int32($this->onlineCount);
        }
        $buffer .= $serializer->int32($this->readInboxMaxId);
        $buffer .= $serializer->int32($this->readOutboxMaxId);
        $buffer .= $serializer->int32($this->unreadCount);
        $buffer .= $this->chatPhoto->serialize($serializer);
        $buffer .= $this->notifySettings->serialize($serializer);
        if ($flags & (1 << 23)) {
            $buffer .= $this->exportedInvite->serialize($serializer);
        }
        $buffer .= $serializer->vectorOfObjects($this->botInfo);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int64($this->migratedFromChatId);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->migratedFromMaxId);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->int32($this->pinnedMsgId);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->stickerset->serialize($serializer);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $serializer->int32($this->availableMinId);
        }
        if ($flags & (1 << 11)) {
            $buffer .= $serializer->int32($this->folderId);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $serializer->int64($this->linkedChatId);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->location->serialize($serializer);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $serializer->int32($this->slowmodeSeconds);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $serializer->int32($this->slowmodeNextSendDate);
        }
        if ($flags & (1 << 12)) {
            $buffer .= $serializer->int32($this->statsDc);
        }
        $buffer .= $serializer->int32($this->pts);
        if ($flags & (1 << 21)) {
            $buffer .= $this->call->serialize($serializer);
        }
        if ($flags & (1 << 24)) {
            $buffer .= $serializer->int32($this->ttlPeriod);
        }
        if ($flags & (1 << 25)) {
            $buffer .= $serializer->vectorOfStrings($this->pendingSuggestions);
        }
        if ($flags & (1 << 26)) {
            $buffer .= $this->groupcallDefaultJoinAs->serialize($serializer);
        }
        if ($flags & (1 << 27)) {
            $buffer .= $serializer->bytes($this->themeEmoticon);
        }
        if ($flags & (1 << 28)) {
            $buffer .= $serializer->int32($this->requestsPending);
        }
        if ($flags & (1 << 28)) {
            $buffer .= $serializer->vectorOfLongs($this->recentRequesters);
        }
        if ($flags & (1 << 29)) {
            $buffer .= $this->defaultSendAs->serialize($serializer);
        }
        if ($flags & (1 << 30)) {
            $buffer .= $this->availableReactions->serialize($serializer);
        }
        if ($flags2 & (1 << 13)) {
            $buffer .= $serializer->int32($this->reactionsLimit);
        }
        if ($flags2 & (1 << 4)) {
            $buffer .= $this->stories->serialize($serializer);
        }
        if ($flags2 & (1 << 7)) {
            $buffer .= $this->wallpaper->serialize($serializer);
        }
        if ($flags2 & (1 << 8)) {
            $buffer .= $serializer->int32($this->boostsApplied);
        }
        if ($flags2 & (1 << 9)) {
            $buffer .= $serializer->int32($this->boostsUnrestrict);
        }
        if ($flags2 & (1 << 10)) {
            $buffer .= $this->emojiset->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);
        $flags2 = $deserializer->int32($stream);

        $canViewParticipants = ($flags & (1 << 3)) ? true : null;
        $canSetUsername = ($flags & (1 << 6)) ? true : null;
        $canSetStickers = ($flags & (1 << 7)) ? true : null;
        $hiddenPrehistory = ($flags & (1 << 10)) ? true : null;
        $canSetLocation = ($flags & (1 << 16)) ? true : null;
        $hasScheduled = ($flags & (1 << 19)) ? true : null;
        $canViewStats = ($flags & (1 << 20)) ? true : null;
        $blocked = ($flags & (1 << 22)) ? true : null;
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
        $id = $deserializer->int64($stream);
        $about = $deserializer->bytes($stream);
        $participantsCount = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $adminsCount = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $kickedCount = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $bannedCount = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $onlineCount = ($flags & (1 << 13)) ? $deserializer->int32($stream) : null;
        $readInboxMaxId = $deserializer->int32($stream);
        $readOutboxMaxId = $deserializer->int32($stream);
        $unreadCount = $deserializer->int32($stream);
        $chatPhoto = AbstractPhoto::deserialize($deserializer, $stream);
        $notifySettings = AbstractPeerNotifySettings::deserialize($deserializer, $stream);
        $exportedInvite = ($flags & (1 << 23)) ? AbstractExportedChatInvite::deserialize($deserializer, $stream) : null;
        $botInfo = $deserializer->vectorOfObjects($stream, [AbstractBotInfo::class, 'deserialize']);
        $migratedFromChatId = ($flags & (1 << 4)) ? $deserializer->int64($stream) : null;
        $migratedFromMaxId = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $pinnedMsgId = ($flags & (1 << 5)) ? $deserializer->int32($stream) : null;
        $stickerset = ($flags & (1 << 8)) ? AbstractStickerSet::deserialize($deserializer, $stream) : null;
        $availableMinId = ($flags & (1 << 9)) ? $deserializer->int32($stream) : null;
        $folderId = ($flags & (1 << 11)) ? $deserializer->int32($stream) : null;
        $linkedChatId = ($flags & (1 << 14)) ? $deserializer->int64($stream) : null;
        $location = ($flags & (1 << 15)) ? AbstractChannelLocation::deserialize($deserializer, $stream) : null;
        $slowmodeSeconds = ($flags & (1 << 17)) ? $deserializer->int32($stream) : null;
        $slowmodeNextSendDate = ($flags & (1 << 18)) ? $deserializer->int32($stream) : null;
        $statsDc = ($flags & (1 << 12)) ? $deserializer->int32($stream) : null;
        $pts = $deserializer->int32($stream);
        $call = ($flags & (1 << 21)) ? AbstractInputGroupCall::deserialize($deserializer, $stream) : null;
        $ttlPeriod = ($flags & (1 << 24)) ? $deserializer->int32($stream) : null;
        $pendingSuggestions = ($flags & (1 << 25)) ? $deserializer->vectorOfStrings($stream) : null;
        $groupcallDefaultJoinAs = ($flags & (1 << 26)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $themeEmoticon = ($flags & (1 << 27)) ? $deserializer->bytes($stream) : null;
        $requestsPending = ($flags & (1 << 28)) ? $deserializer->int32($stream) : null;
        $recentRequesters = ($flags & (1 << 28)) ? $deserializer->vectorOfLongs($stream) : null;
        $defaultSendAs = ($flags & (1 << 29)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $availableReactions = ($flags & (1 << 30)) ? AbstractChatReactions::deserialize($deserializer, $stream) : null;
        $reactionsLimit = ($flags2 & (1 << 13)) ? $deserializer->int32($stream) : null;
        $stories = ($flags2 & (1 << 4)) ? AbstractPeerStories::deserialize($deserializer, $stream) : null;
        $wallpaper = ($flags2 & (1 << 7)) ? AbstractWallPaper::deserialize($deserializer, $stream) : null;
        $boostsApplied = ($flags2 & (1 << 8)) ? $deserializer->int32($stream) : null;
        $boostsUnrestrict = ($flags2 & (1 << 9)) ? $deserializer->int32($stream) : null;
        $emojiset = ($flags2 & (1 << 10)) ? AbstractStickerSet::deserialize($deserializer, $stream) : null;
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
            $emojiset
        );
    }
}