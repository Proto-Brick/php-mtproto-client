<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\ActivateStealthModeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\CanSendStoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\CreateAlbumRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\DeleteAlbumRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\DeleteStoriesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\EditStoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\ExportStoryLinkRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetAlbumStoriesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetAlbumsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetAllReadPeerStoriesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetAllStoriesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetChatsToSendRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetPeerMaxIDsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetPeerStoriesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetPinnedStoriesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetStoriesArchiveRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetStoriesByIDRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetStoriesViewsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetStoryReactionsListRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\GetStoryViewsListRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\IncrementStoryViewsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\ReadStoriesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\ReorderAlbumsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\ReportRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\SearchPostsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\SendReactionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\SendStoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\ToggleAllStoriesHiddenRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\TogglePeerStoriesHiddenRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\TogglePinnedRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\TogglePinnedToTopRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stories\UpdateAlbumRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPrivacyRule;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMediaArea;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReportResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\ExportedStoryLink;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaAreaChannelPost;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaAreaVenue;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaContact;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaDice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaDocumentExternal;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaGame;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaGeoLive;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaInvoice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaPaidMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaPhotoExternal;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaPoll;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaStory;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaTodo;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaUploadedDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaUploadedPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaVenue;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMediaWebPage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageEntityMentionName;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowAll;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowBots;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowChatParticipants;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowCloseFriends;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowContacts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowPremium;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowUsers;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowAll;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowBots;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowChatParticipants;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowContacts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowUsers;
use DigitalStars\MtprotoClient\Generated\Types\Base\MediaAreaChannelPost;
use DigitalStars\MtprotoClient\Generated\Types\Base\MediaAreaGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\MediaAreaStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Base\MediaAreaSuggestedReaction;
use DigitalStars\MtprotoClient\Generated\Types\Base\MediaAreaUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\MediaAreaVenue;
use DigitalStars\MtprotoClient\Generated\Types\Base\MediaAreaWeather;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBankCard;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBlockquote;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBold;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBotCommand;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCashtag;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCustomEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityEmail;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityHashtag;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityItalic;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityMention;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityMentionName;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityPhone;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityPre;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntitySpoiler;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityStrike;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityTextUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUnderline;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUnknown;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionCustomEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionPaid;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReportResultAddComment;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReportResultChooseOption;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReportResultReported;
use DigitalStars\MtprotoClient\Generated\Types\Base\StoryAlbum;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\Generated\Types\Messages\Chats;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatsSlice;
use DigitalStars\MtprotoClient\Generated\Types\Stories\AbstractAlbums;
use DigitalStars\MtprotoClient\Generated\Types\Stories\AbstractAllStories;
use DigitalStars\MtprotoClient\Generated\Types\Stories\Albums;
use DigitalStars\MtprotoClient\Generated\Types\Stories\AlbumsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Stories\AllStories;
use DigitalStars\MtprotoClient\Generated\Types\Stories\AllStoriesNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Stories\CanSendStoryCount;
use DigitalStars\MtprotoClient\Generated\Types\Stories\FoundStories;
use DigitalStars\MtprotoClient\Generated\Types\Stories\PeerStories;
use DigitalStars\MtprotoClient\Generated\Types\Stories\Stories;
use DigitalStars\MtprotoClient\Generated\Types\Stories\StoryReactionsList;
use DigitalStars\MtprotoClient\Generated\Types\Stories\StoryViews;
use DigitalStars\MtprotoClient\Generated\Types\Stories\StoryViewsList;


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