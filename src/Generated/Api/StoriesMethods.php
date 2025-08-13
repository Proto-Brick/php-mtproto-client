<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\ActivateStealthModeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\CanSendStoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\CreateAlbumRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\DeleteAlbumRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\DeleteStoriesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\EditStoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\ExportStoryLinkRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetAlbumStoriesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetAlbumsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetAllReadPeerStoriesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetAllStoriesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetChatsToSendRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetPeerMaxIDsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetPeerStoriesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetPinnedStoriesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetStoriesArchiveRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetStoriesByIDRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetStoriesViewsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetStoryReactionsListRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\GetStoryViewsListRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\IncrementStoryViewsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\ReadStoriesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\ReorderAlbumsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\ReportRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\SearchPostsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\SendReactionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\SendStoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\ToggleAllStoriesHiddenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\TogglePeerStoriesHiddenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\TogglePinnedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\TogglePinnedToTopRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stories\UpdateAlbumRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPrivacyRule;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMediaArea;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReaction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReportResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ExportedStoryLink;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaAreaChannelPost;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaAreaVenue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaContact;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaDice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaDocumentExternal;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaGame;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaGeoLive;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaInvoice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaPaidMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaPhotoExternal;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaPoll;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaStory;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaTodo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaUploadedDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaUploadedPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaVenue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMediaWebPage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageEntityMentionName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowAll;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowBots;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowChatParticipants;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowCloseFriends;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowContacts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowPremium;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowAll;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowBots;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowChatParticipants;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowContacts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MediaAreaChannelPost;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MediaAreaGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MediaAreaStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MediaAreaSuggestedReaction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MediaAreaUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MediaAreaVenue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MediaAreaWeather;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBankCard;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBlockquote;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBold;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBotCommand;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCashtag;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCustomEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityEmail;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityHashtag;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityItalic;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityMention;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityMentionName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityPhone;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityPre;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntitySpoiler;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityStrike;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityTextUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUnderline;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUnknown;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionCustomEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionPaid;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportResultAddComment;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportResultChooseOption;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportResultReported;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StoryAlbum;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\Chats;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatsSlice;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\AbstractAlbums;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\AbstractAllStories;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\Albums;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\AlbumsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\AllStories;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\AllStoriesNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\CanSendStoryCount;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\FoundStories;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\PeerStories;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\Stories;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\StoryReactionsList;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\StoryViews;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\StoryViewsList;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "stories" group.
 */
final readonly class StoriesMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return CanSendStoryCount|null
     * @see https://core.telegram.org/method/stories.canSendStory
     * @api
     */
    public function canSendStory(AbstractInputPeer $peer): ?CanSendStoryCount
    {
        return $this->client->callSync(new CanSendStoryRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo $media
     * @param list<InputPrivacyValueAllowContacts|InputPrivacyValueAllowAll|InputPrivacyValueAllowUsers|InputPrivacyValueDisallowContacts|InputPrivacyValueDisallowAll|InputPrivacyValueDisallowUsers|InputPrivacyValueAllowChatParticipants|InputPrivacyValueDisallowChatParticipants|InputPrivacyValueAllowCloseFriends|InputPrivacyValueAllowPremium|InputPrivacyValueAllowBots|InputPrivacyValueDisallowBots> $privacyRules
     * @param int $randomId
     * @param bool|null $pinned
     * @param bool|null $noforwards
     * @param bool|null $fwdModified
     * @param list<MediaAreaVenue|InputMediaAreaVenue|MediaAreaGeoPoint|MediaAreaSuggestedReaction|MediaAreaChannelPost|InputMediaAreaChannelPost|MediaAreaUrl|MediaAreaWeather|MediaAreaStarGift>|null $mediaAreas
     * @param string|null $caption
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param int|null $period
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $fwdFromId
     * @param int|null $fwdFromStory
     * @param list<int>|null $albums
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/stories.sendStory
     * @api
     */
    public function sendStory(AbstractInputPeer $peer, AbstractInputMedia $media, array $privacyRules, int $randomId, ?bool $pinned = null, ?bool $noforwards = null, ?bool $fwdModified = null, ?array $mediaAreas = null, ?string $caption = null, ?array $entities = null, ?int $period = null, ?AbstractInputPeer $fwdFromId = null, ?int $fwdFromStory = null, ?array $albums = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendStoryRequest($peer, $media, $privacyRules, $randomId, $pinned, $noforwards, $fwdModified, $mediaAreas, $caption, $entities, $period, $fwdFromId, $fwdFromStory, $albums));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param InputMediaEmpty|InputMediaUploadedPhoto|InputMediaPhoto|InputMediaGeoPoint|InputMediaContact|InputMediaUploadedDocument|InputMediaDocument|InputMediaVenue|InputMediaPhotoExternal|InputMediaDocumentExternal|InputMediaGame|InputMediaInvoice|InputMediaGeoLive|InputMediaPoll|InputMediaDice|InputMediaStory|InputMediaWebPage|InputMediaPaidMedia|InputMediaTodo|null $media
     * @param list<MediaAreaVenue|InputMediaAreaVenue|MediaAreaGeoPoint|MediaAreaSuggestedReaction|MediaAreaChannelPost|InputMediaAreaChannelPost|MediaAreaUrl|MediaAreaWeather|MediaAreaStarGift>|null $mediaAreas
     * @param string|null $caption
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote>|null $entities
     * @param list<InputPrivacyValueAllowContacts|InputPrivacyValueAllowAll|InputPrivacyValueAllowUsers|InputPrivacyValueDisallowContacts|InputPrivacyValueDisallowAll|InputPrivacyValueDisallowUsers|InputPrivacyValueAllowChatParticipants|InputPrivacyValueDisallowChatParticipants|InputPrivacyValueAllowCloseFriends|InputPrivacyValueAllowPremium|InputPrivacyValueAllowBots|InputPrivacyValueDisallowBots>|null $privacyRules
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/stories.editStory
     * @api
     */
    public function editStory(AbstractInputPeer $peer, int $id, ?AbstractInputMedia $media = null, ?array $mediaAreas = null, ?string $caption = null, ?array $entities = null, ?array $privacyRules = null): ?AbstractUpdates
    {
        return $this->client->callSync(new EditStoryRequest($peer, $id, $media, $mediaAreas, $caption, $entities, $privacyRules));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return list<int>
     * @see https://core.telegram.org/method/stories.deleteStories
     * @api
     */
    public function deleteStories(AbstractInputPeer $peer, array $id): array
    {
        return $this->client->callSync(new DeleteStoriesRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @param bool $pinned
     * @return list<int>
     * @see https://core.telegram.org/method/stories.togglePinned
     * @api
     */
    public function togglePinned(AbstractInputPeer $peer, array $id, bool $pinned): array
    {
        return $this->client->callSync(new TogglePinnedRequest($peer, $id, $pinned));
    }

    /**
     * @param bool|null $next
     * @param bool|null $hidden
     * @param string|null $state
     * @return AllStoriesNotModified|AllStories|null
     * @see https://core.telegram.org/method/stories.getAllStories
     * @api
     */
    public function getAllStories(?bool $next = null, ?bool $hidden = null, ?string $state = null): ?AbstractAllStories
    {
        return $this->client->callSync(new GetAllStoriesRequest($next, $hidden, $state));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $offsetId
     * @param int $limit
     * @return Stories|null
     * @see https://core.telegram.org/method/stories.getPinnedStories
     * @api
     */
    public function getPinnedStories(AbstractInputPeer $peer, int $offsetId, int $limit): ?Stories
    {
        return $this->client->callSync(new GetPinnedStoriesRequest($peer, $offsetId, $limit));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $offsetId
     * @param int $limit
     * @return Stories|null
     * @see https://core.telegram.org/method/stories.getStoriesArchive
     * @api
     */
    public function getStoriesArchive(AbstractInputPeer $peer, int $offsetId, int $limit): ?Stories
    {
        return $this->client->callSync(new GetStoriesArchiveRequest($peer, $offsetId, $limit));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return Stories|null
     * @see https://core.telegram.org/method/stories.getStoriesByID
     * @api
     */
    public function getStoriesByID(AbstractInputPeer $peer, array $id): ?Stories
    {
        return $this->client->callSync(new GetStoriesByIDRequest($peer, $id));
    }

    /**
     * @param bool $hidden
     * @return bool
     * @see https://core.telegram.org/method/stories.toggleAllStoriesHidden
     * @api
     */
    public function toggleAllStoriesHidden(bool $hidden): bool
    {
        return (bool) $this->client->callSync(new ToggleAllStoriesHiddenRequest($hidden));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $maxId
     * @return list<int>
     * @see https://core.telegram.org/method/stories.readStories
     * @api
     */
    public function readStories(AbstractInputPeer $peer, int $maxId): array
    {
        return $this->client->callSync(new ReadStoriesRequest($peer, $maxId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/stories.incrementStoryViews
     * @api
     */
    public function incrementStoryViews(AbstractInputPeer $peer, array $id): bool
    {
        return (bool) $this->client->callSync(new IncrementStoryViewsRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param string $offset
     * @param int $limit
     * @param bool|null $justContacts
     * @param bool|null $reactionsFirst
     * @param bool|null $forwardsFirst
     * @param string|null $q
     * @return StoryViewsList|null
     * @see https://core.telegram.org/method/stories.getStoryViewsList
     * @api
     */
    public function getStoryViewsList(AbstractInputPeer $peer, int $id, string $offset, int $limit, ?bool $justContacts = null, ?bool $reactionsFirst = null, ?bool $forwardsFirst = null, ?string $q = null): ?StoryViewsList
    {
        return $this->client->callSync(new GetStoryViewsListRequest($peer, $id, $offset, $limit, $justContacts, $reactionsFirst, $forwardsFirst, $q));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return StoryViews|null
     * @see https://core.telegram.org/method/stories.getStoriesViews
     * @api
     */
    public function getStoriesViews(AbstractInputPeer $peer, array $id): ?StoryViews
    {
        return $this->client->callSync(new GetStoriesViewsRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @return ExportedStoryLink|null
     * @see https://core.telegram.org/method/stories.exportStoryLink
     * @api
     */
    public function exportStoryLink(AbstractInputPeer $peer, int $id): ?ExportedStoryLink
    {
        return $this->client->callSync(new ExportStoryLinkRequest($peer, $id));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @param string $option
     * @param string $message
     * @return ReportResultChooseOption|ReportResultAddComment|ReportResultReported|null
     * @see https://core.telegram.org/method/stories.report
     * @api
     */
    public function report(AbstractInputPeer $peer, array $id, string $option, string $message): ?AbstractReportResult
    {
        return $this->client->callSync(new ReportRequest($peer, $id, $option, $message));
    }

    /**
     * @param bool|null $past
     * @param bool|null $future
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/stories.activateStealthMode
     * @api
     */
    public function activateStealthMode(?bool $past = null, ?bool $future = null): ?AbstractUpdates
    {
        return $this->client->callSync(new ActivateStealthModeRequest($past, $future));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $storyId
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid $reaction
     * @param bool|null $addToRecent
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/stories.sendReaction
     * @api
     */
    public function sendReaction(AbstractInputPeer $peer, int $storyId, AbstractReaction $reaction, ?bool $addToRecent = null): ?AbstractUpdates
    {
        return $this->client->callSync(new SendReactionRequest($peer, $storyId, $reaction, $addToRecent));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return PeerStories|null
     * @see https://core.telegram.org/method/stories.getPeerStories
     * @api
     */
    public function getPeerStories(AbstractInputPeer $peer): ?PeerStories
    {
        return $this->client->callSync(new GetPeerStoriesRequest($peer));
    }

    /**
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/stories.getAllReadPeerStories
     * @api
     */
    public function getAllReadPeerStories(): ?AbstractUpdates
    {
        return $this->client->callSync(new GetAllReadPeerStoriesRequest());
    }

    /**
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $id
     * @return list<int>
     * @see https://core.telegram.org/method/stories.getPeerMaxIDs
     * @api
     */
    public function getPeerMaxIDs(array $id): array
    {
        return $this->client->callSync(new GetPeerMaxIDsRequest($id));
    }

    /**
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/stories.getChatsToSend
     * @api
     */
    public function getChatsToSend(): ?AbstractChats
    {
        return $this->client->callSync(new GetChatsToSendRequest());
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool $hidden
     * @return bool
     * @see https://core.telegram.org/method/stories.togglePeerStoriesHidden
     * @api
     */
    public function togglePeerStoriesHidden(AbstractInputPeer $peer, bool $hidden): bool
    {
        return (bool) $this->client->callSync(new TogglePeerStoriesHiddenRequest($peer, $hidden));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param int $limit
     * @param bool|null $forwardsFirst
     * @param ReactionEmpty|ReactionEmoji|ReactionCustomEmoji|ReactionPaid|null $reaction
     * @param string|null $offset
     * @return StoryReactionsList|null
     * @see https://core.telegram.org/method/stories.getStoryReactionsList
     * @api
     */
    public function getStoryReactionsList(AbstractInputPeer $peer, int $id, int $limit, ?bool $forwardsFirst = null, ?AbstractReaction $reaction = null, ?string $offset = null): ?StoryReactionsList
    {
        return $this->client->callSync(new GetStoryReactionsListRequest($peer, $id, $limit, $forwardsFirst, $reaction, $offset));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/stories.togglePinnedToTop
     * @api
     */
    public function togglePinnedToTop(AbstractInputPeer $peer, array $id): bool
    {
        return (bool) $this->client->callSync(new TogglePinnedToTopRequest($peer, $id));
    }

    /**
     * @param string $offset
     * @param int $limit
     * @param string|null $hashtag
     * @param MediaAreaVenue|InputMediaAreaVenue|MediaAreaGeoPoint|MediaAreaSuggestedReaction|MediaAreaChannelPost|InputMediaAreaChannelPost|MediaAreaUrl|MediaAreaWeather|MediaAreaStarGift|null $area
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $peer
     * @return FoundStories|null
     * @see https://core.telegram.org/method/stories.searchPosts
     * @api
     */
    public function searchPosts(string $offset, int $limit, ?string $hashtag = null, ?AbstractMediaArea $area = null, ?AbstractInputPeer $peer = null): ?FoundStories
    {
        return $this->client->callSync(new SearchPostsRequest($offset, $limit, $hashtag, $area, $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $title
     * @param list<int> $stories
     * @return StoryAlbum|null
     * @see https://core.telegram.org/method/stories.createAlbum
     * @api
     */
    public function createAlbum(AbstractInputPeer $peer, string $title, array $stories): ?StoryAlbum
    {
        return $this->client->callSync(new CreateAlbumRequest($peer, $title, $stories));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $albumId
     * @param string|null $title
     * @param list<int>|null $deleteStories
     * @param list<int>|null $addStories
     * @param list<int>|null $order
     * @return StoryAlbum|null
     * @see https://core.telegram.org/method/stories.updateAlbum
     * @api
     */
    public function updateAlbum(AbstractInputPeer $peer, int $albumId, ?string $title = null, ?array $deleteStories = null, ?array $addStories = null, ?array $order = null): ?StoryAlbum
    {
        return $this->client->callSync(new UpdateAlbumRequest($peer, $albumId, $title, $deleteStories, $addStories, $order));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int> $order
     * @return bool
     * @see https://core.telegram.org/method/stories.reorderAlbums
     * @api
     */
    public function reorderAlbums(AbstractInputPeer $peer, array $order): bool
    {
        return (bool) $this->client->callSync(new ReorderAlbumsRequest($peer, $order));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $albumId
     * @return bool
     * @see https://core.telegram.org/method/stories.deleteAlbum
     * @api
     */
    public function deleteAlbum(AbstractInputPeer $peer, int $albumId): bool
    {
        return (bool) $this->client->callSync(new DeleteAlbumRequest($peer, $albumId));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $hash
     * @return AlbumsNotModified|Albums|null
     * @see https://core.telegram.org/method/stories.getAlbums
     * @api
     */
    public function getAlbums(AbstractInputPeer $peer, int $hash): ?AbstractAlbums
    {
        return $this->client->callSync(new GetAlbumsRequest($peer, $hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $albumId
     * @param int $offset
     * @param int $limit
     * @return Stories|null
     * @see https://core.telegram.org/method/stories.getAlbumStories
     * @api
     */
    public function getAlbumStories(AbstractInputPeer $peer, int $albumId, int $offset, int $limit): ?Stories
    {
        return $this->client->callSync(new GetAlbumStoriesRequest($peer, $albumId, $offset, $limit));
    }
}