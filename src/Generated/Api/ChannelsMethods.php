<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\CheckUsernameRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ConvertToGigagroupRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\CreateChannelRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\CreateForumTopicRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\DeactivateAllUsernamesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\DeleteChannelRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\DeleteHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\DeleteMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\DeleteParticipantHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\DeleteTopicHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\EditAdminRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\EditBannedRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\EditCreatorRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\EditForumTopicRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\EditLocationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\EditPhotoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\EditTitleRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ExportMessageLinkRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetAdminLogRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetAdminedPublicChannelsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetChannelRecommendationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetChannelsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetForumTopicsByIDRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetForumTopicsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetFullChannelRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetGroupsForDiscussionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetInactiveChannelsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetLeftChannelsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetParticipantRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetParticipantsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\GetSendAsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\InviteToChannelRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\JoinChannelRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\LeaveChannelRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ReadHistoryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ReadMessageContentsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ReorderPinnedForumTopicsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ReorderUsernamesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ReportAntiSpamFalsePositiveRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ReportSpamRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\RestrictSponsoredMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\SearchPostsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\SetBoostsToUnblockRestrictionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\SetDiscussionGroupRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\SetEmojiStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\SetStickersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleAntiSpamRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleForumRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleJoinRequestRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleJoinToSendRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleParticipantsHiddenRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\TogglePreHistoryHiddenRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleSignaturesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleSlowModeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleUsernameRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\ToggleViewForumAsMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\UpdateColorRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\UpdateEmojiStatusRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\UpdatePinnedForumTopicRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Channels\UpdateUsernameRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChannelParticipantsFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChatPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputStickerSet;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelAdminLogEventsFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelParticipantsAdmins;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelParticipantsBanned;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelParticipantsBots;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelParticipantsContacts;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelParticipantsKicked;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelParticipantsMentions;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelParticipantsRecent;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelParticipantsSearch;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatAdminRights;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatBannedRights;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatusEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatusUntil;
use DigitalStars\MtprotoClient\Generated\Types\Base\ExportedMessageLink;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannelEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatPhotoEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatUploadedPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGeoPointEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageCallbackQuery;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageID;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessagePinned;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageReplyTo;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetAnimatedEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetAnimatedEmojiAnimations;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetDice;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiChannelDefaultStatuses;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiDefaultStatuses;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiDefaultTopicIcons;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmojiGenericAnimations;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetID;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetPremiumGifts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetShortName;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Channels\AbstractChannelParticipants;
use DigitalStars\MtprotoClient\Generated\Types\Channels\AdminLogResults;
use DigitalStars\MtprotoClient\Generated\Types\Channels\ChannelParticipant;
use DigitalStars\MtprotoClient\Generated\Types\Channels\ChannelParticipants;
use DigitalStars\MtprotoClient\Generated\Types\Channels\ChannelParticipantsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Channels\SendAsPeers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedHistory;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChannelMessages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatFull;
use DigitalStars\MtprotoClient\Generated\Types\Messages\Chats;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatsSlice;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ForumTopics;
use DigitalStars\MtprotoClient\Generated\Types\Messages\InactiveChats;
use DigitalStars\MtprotoClient\Generated\Types\Messages\InvitedUsers;
use DigitalStars\MtprotoClient\Generated\Types\Messages\Messages;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessagesNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessagesSlice;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "channels" group.
 */
final readonly class ChannelsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $maxId
     * @return bool
     * @see https://core.telegram.org/method/channels.readHistory
     * @api
     */
    public function readHistory(AbstractInputChannel $channel, int $maxId): bool
    {
        return (bool) $this->client->callSync(new ReadHistoryRequest($channel, $maxId));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param list<int> $id
     * @return AffectedMessages|null
     * @see https://core.telegram.org/method/channels.deleteMessages
     * @api
     */
    public function deleteMessages(AbstractInputChannel $channel, array $id): ?AffectedMessages
    {
        return $this->client->callSync(new DeleteMessagesRequest($channel, $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $participant
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/channels.reportSpam
     * @api
     */
    public function reportSpam(AbstractInputChannel $channel, AbstractInputPeer $participant, array $id): bool
    {
        return (bool) $this->client->callSync(new ReportSpamRequest($channel, $participant, $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param list<InputMessageID|InputMessageReplyTo|InputMessagePinned|InputMessageCallbackQuery> $id
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/channels.getMessages
     * @api
     */
    public function getMessages(AbstractInputChannel $channel, array $id): ?AbstractMessages
    {
        return $this->client->callSync(new GetMessagesRequest($channel, $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param ChannelParticipantsRecent|ChannelParticipantsAdmins|ChannelParticipantsKicked|ChannelParticipantsBots|ChannelParticipantsBanned|ChannelParticipantsSearch|ChannelParticipantsContacts|ChannelParticipantsMentions $filter
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @return ChannelParticipants|ChannelParticipantsNotModified|null
     * @see https://core.telegram.org/method/channels.getParticipants
     * @api
     */
    public function getParticipants(AbstractInputChannel $channel, AbstractChannelParticipantsFilter $filter, int $offset, int $limit, int $hash): ?AbstractChannelParticipants
    {
        return $this->client->callSync(new GetParticipantsRequest($channel, $filter, $offset, $limit, $hash));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $participant
     * @return ChannelParticipant|null
     * @see https://core.telegram.org/method/channels.getParticipant
     * @api
     */
    public function getParticipant(AbstractInputChannel $channel, AbstractInputPeer $participant): ?ChannelParticipant
    {
        return $this->client->callSync(new GetParticipantRequest($channel, $participant));
    }

    /**
     * @param list<InputChannelEmpty|InputChannel|InputChannelFromMessage> $id
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getChannels
     * @api
     */
    public function getChannels(array $id): ?AbstractChats
    {
        return $this->client->callSync(new GetChannelsRequest($id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @return ChatFull|null
     * @see https://core.telegram.org/method/channels.getFullChannel
     * @api
     */
    public function getFullChannel(AbstractInputChannel $channel): ?ChatFull
    {
        return $this->client->callSync(new GetFullChannelRequest($channel));
    }

    /**
     * @param string $title
     * @param string $about
     * @param bool|null $broadcast
     * @param bool|null $megagroup
     * @param bool|null $forImport
     * @param bool|null $forum
     * @param InputGeoPointEmpty|InputGeoPoint|null $geoPoint
     * @param string|null $address
     * @param int|null $ttlPeriod
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.createChannel
     * @api
     */
    public function createChannel(string $title, string $about, ?bool $broadcast = null, ?bool $megagroup = null, ?bool $forImport = null, ?bool $forum = null, ?AbstractInputGeoPoint $geoPoint = null, ?string $address = null, ?int $ttlPeriod = null): ?AbstractUpdates
    {
        return $this->client->callSync(new CreateChannelRequest($title, $about, $broadcast, $megagroup, $forImport, $forum, $geoPoint, $address, $ttlPeriod));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param ChatAdminRights $adminRights
     * @param string $rank
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editAdmin
     * @api
     */
    public function editAdmin(AbstractInputChannel $channel, AbstractInputUser $userId, ChatAdminRights $adminRights, string $rank): ?AbstractUpdates
    {
        return $this->client->callSync(new EditAdminRequest($channel, $userId, $adminRights, $rank));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param string $title
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editTitle
     * @api
     */
    public function editTitle(AbstractInputChannel $channel, string $title): ?AbstractUpdates
    {
        return $this->client->callSync(new EditTitleRequest($channel, $title));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputChatPhotoEmpty|InputChatUploadedPhoto|InputChatPhoto $photo
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editPhoto
     * @api
     */
    public function editPhoto(AbstractInputChannel $channel, AbstractInputChatPhoto $photo): ?AbstractUpdates
    {
        return $this->client->callSync(new EditPhotoRequest($channel, $photo));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param string $username
     * @return bool
     * @see https://core.telegram.org/method/channels.checkUsername
     * @api
     */
    public function checkUsername(AbstractInputChannel $channel, string $username): bool
    {
        return (bool) $this->client->callSync(new CheckUsernameRequest($channel, $username));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param string $username
     * @return bool
     * @see https://core.telegram.org/method/channels.updateUsername
     * @api
     */
    public function updateUsername(AbstractInputChannel $channel, string $username): bool
    {
        return (bool) $this->client->callSync(new UpdateUsernameRequest($channel, $username));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.joinChannel
     * @api
     */
    public function joinChannel(AbstractInputChannel $channel): ?AbstractUpdates
    {
        return $this->client->callSync(new JoinChannelRequest($channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.leaveChannel
     * @api
     */
    public function leaveChannel(AbstractInputChannel $channel): ?AbstractUpdates
    {
        return $this->client->callSync(new LeaveChannelRequest($channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $users
     * @return InvitedUsers|null
     * @see https://core.telegram.org/method/channels.inviteToChannel
     * @api
     */
    public function inviteToChannel(AbstractInputChannel $channel, array $users): ?InvitedUsers
    {
        return $this->client->callSync(new InviteToChannelRequest($channel, $users));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.deleteChannel
     * @api
     */
    public function deleteChannel(AbstractInputChannel $channel): ?AbstractUpdates
    {
        return $this->client->callSync(new DeleteChannelRequest($channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $id
     * @param bool|null $grouped
     * @param bool|null $thread
     * @return ExportedMessageLink|null
     * @see https://core.telegram.org/method/channels.exportMessageLink
     * @api
     */
    public function exportMessageLink(AbstractInputChannel $channel, int $id, ?bool $grouped = null, ?bool $thread = null): ?ExportedMessageLink
    {
        return $this->client->callSync(new ExportMessageLinkRequest($channel, $id, $grouped, $thread));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool|null $signaturesEnabled
     * @param bool|null $profilesEnabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleSignatures
     * @api
     */
    public function toggleSignatures(AbstractInputChannel $channel, ?bool $signaturesEnabled = null, ?bool $profilesEnabled = null): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleSignaturesRequest($channel, $signaturesEnabled, $profilesEnabled));
    }

    /**
     * @param bool|null $byLocation
     * @param bool|null $checkLimit
     * @param bool|null $forPersonal
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getAdminedPublicChannels
     * @api
     */
    public function getAdminedPublicChannels(?bool $byLocation = null, ?bool $checkLimit = null, ?bool $forPersonal = null): ?AbstractChats
    {
        return $this->client->callSync(new GetAdminedPublicChannelsRequest($byLocation, $checkLimit, $forPersonal));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $participant
     * @param ChatBannedRights $bannedRights
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editBanned
     * @api
     */
    public function editBanned(AbstractInputChannel $channel, AbstractInputPeer $participant, ChatBannedRights $bannedRights): ?AbstractUpdates
    {
        return $this->client->callSync(new EditBannedRequest($channel, $participant, $bannedRights));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param string $q
     * @param int $maxId
     * @param int $minId
     * @param int $limit
     * @param ChannelAdminLogEventsFilter|null $eventsFilter
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage>|null $admins
     * @return AdminLogResults|null
     * @see https://core.telegram.org/method/channels.getAdminLog
     * @api
     */
    public function getAdminLog(AbstractInputChannel $channel, string $q, int $maxId, int $minId, int $limit, ?ChannelAdminLogEventsFilter $eventsFilter = null, ?array $admins = null): ?AdminLogResults
    {
        return $this->client->callSync(new GetAdminLogRequest($channel, $q, $maxId, $minId, $limit, $eventsFilter, $admins));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses $stickerset
     * @return bool
     * @see https://core.telegram.org/method/channels.setStickers
     * @api
     */
    public function setStickers(AbstractInputChannel $channel, AbstractInputStickerSet $stickerset): bool
    {
        return (bool) $this->client->callSync(new SetStickersRequest($channel, $stickerset));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/channels.readMessageContents
     * @api
     */
    public function readMessageContents(AbstractInputChannel $channel, array $id): bool
    {
        return (bool) $this->client->callSync(new ReadMessageContentsRequest($channel, $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $maxId
     * @param bool|null $forEveryone
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.deleteHistory
     * @api
     */
    public function deleteHistory(AbstractInputChannel $channel, int $maxId, ?bool $forEveryone = null): ?AbstractUpdates
    {
        return $this->client->callSync(new DeleteHistoryRequest($channel, $maxId, $forEveryone));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.togglePreHistoryHidden
     * @api
     */
    public function togglePreHistoryHidden(AbstractInputChannel $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new TogglePreHistoryHiddenRequest($channel, $enabled));
    }

    /**
     * @param int $offset
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getLeftChannels
     * @api
     */
    public function getLeftChannels(int $offset): ?AbstractChats
    {
        return $this->client->callSync(new GetLeftChannelsRequest($offset));
    }

    /**
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getGroupsForDiscussion
     * @api
     */
    public function getGroupsForDiscussion(): ?AbstractChats
    {
        return $this->client->callSync(new GetGroupsForDiscussionRequest());
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $broadcast
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $group
     * @return bool
     * @see https://core.telegram.org/method/channels.setDiscussionGroup
     * @api
     */
    public function setDiscussionGroup(AbstractInputChannel $broadcast, AbstractInputChannel $group): bool
    {
        return (bool) $this->client->callSync(new SetDiscussionGroupRequest($broadcast, $group));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editCreator
     * @api
     */
    public function editCreator(AbstractInputChannel $channel, AbstractInputUser $userId, AbstractInputCheckPasswordSRP $password): ?AbstractUpdates
    {
        return $this->client->callSync(new EditCreatorRequest($channel, $userId, $password));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputGeoPointEmpty|InputGeoPoint $geoPoint
     * @param string $address
     * @return bool
     * @see https://core.telegram.org/method/channels.editLocation
     * @api
     */
    public function editLocation(AbstractInputChannel $channel, AbstractInputGeoPoint $geoPoint, string $address): bool
    {
        return (bool) $this->client->callSync(new EditLocationRequest($channel, $geoPoint, $address));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $seconds
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleSlowMode
     * @api
     */
    public function toggleSlowMode(AbstractInputChannel $channel, int $seconds): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleSlowModeRequest($channel, $seconds));
    }

    /**
     * @return InactiveChats|null
     * @see https://core.telegram.org/method/channels.getInactiveChannels
     * @api
     */
    public function getInactiveChannels(): ?InactiveChats
    {
        return $this->client->callSync(new GetInactiveChannelsRequest());
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.convertToGigagroup
     * @api
     */
    public function convertToGigagroup(AbstractInputChannel $channel): ?AbstractUpdates
    {
        return $this->client->callSync(new ConvertToGigagroupRequest($channel));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return SendAsPeers|null
     * @see https://core.telegram.org/method/channels.getSendAs
     * @api
     */
    public function getSendAs(AbstractInputPeer $peer): ?SendAsPeers
    {
        return $this->client->callSync(new GetSendAsRequest($peer));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $participant
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/channels.deleteParticipantHistory
     * @api
     */
    public function deleteParticipantHistory(AbstractInputChannel $channel, AbstractInputPeer $participant): ?AffectedHistory
    {
        return $this->client->callSync(new DeleteParticipantHistoryRequest($channel, $participant));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleJoinToSend
     * @api
     */
    public function toggleJoinToSend(AbstractInputChannel $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleJoinToSendRequest($channel, $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleJoinRequest
     * @api
     */
    public function toggleJoinRequest(AbstractInputChannel $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleJoinRequestRequest($channel, $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param list<string> $order
     * @return bool
     * @see https://core.telegram.org/method/channels.reorderUsernames
     * @api
     */
    public function reorderUsernames(AbstractInputChannel $channel, array $order): bool
    {
        return (bool) $this->client->callSync(new ReorderUsernamesRequest($channel, $order));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param string $username
     * @param bool $active
     * @return bool
     * @see https://core.telegram.org/method/channels.toggleUsername
     * @api
     */
    public function toggleUsername(AbstractInputChannel $channel, string $username, bool $active): bool
    {
        return (bool) $this->client->callSync(new ToggleUsernameRequest($channel, $username, $active));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @return bool
     * @see https://core.telegram.org/method/channels.deactivateAllUsernames
     * @api
     */
    public function deactivateAllUsernames(AbstractInputChannel $channel): bool
    {
        return (bool) $this->client->callSync(new DeactivateAllUsernamesRequest($channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleForum
     * @api
     */
    public function toggleForum(AbstractInputChannel $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleForumRequest($channel, $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param string $title
     * @param int $randomId
     * @param int|null $iconColor
     * @param int|null $iconEmojiId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $sendAs
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.createForumTopic
     * @api
     */
    public function createForumTopic(AbstractInputChannel $channel, string $title, int $randomId, ?int $iconColor = null, ?int $iconEmojiId = null, ?AbstractInputPeer $sendAs = null): ?AbstractUpdates
    {
        return $this->client->callSync(new CreateForumTopicRequest($channel, $title, $randomId, $iconColor, $iconEmojiId, $sendAs));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $offsetDate
     * @param int $offsetId
     * @param int $offsetTopic
     * @param int $limit
     * @param string|null $q
     * @return ForumTopics|null
     * @see https://core.telegram.org/method/channels.getForumTopics
     * @api
     */
    public function getForumTopics(AbstractInputChannel $channel, int $offsetDate, int $offsetId, int $offsetTopic, int $limit, ?string $q = null): ?ForumTopics
    {
        return $this->client->callSync(new GetForumTopicsRequest($channel, $offsetDate, $offsetId, $offsetTopic, $limit, $q));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param list<int> $topics
     * @return ForumTopics|null
     * @see https://core.telegram.org/method/channels.getForumTopicsByID
     * @api
     */
    public function getForumTopicsByID(AbstractInputChannel $channel, array $topics): ?ForumTopics
    {
        return $this->client->callSync(new GetForumTopicsByIDRequest($channel, $topics));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $topicId
     * @param string|null $title
     * @param int|null $iconEmojiId
     * @param bool|null $closed
     * @param bool|null $hidden
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editForumTopic
     * @api
     */
    public function editForumTopic(AbstractInputChannel $channel, int $topicId, ?string $title = null, ?int $iconEmojiId = null, ?bool $closed = null, ?bool $hidden = null): ?AbstractUpdates
    {
        return $this->client->callSync(new EditForumTopicRequest($channel, $topicId, $title, $iconEmojiId, $closed, $hidden));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $topicId
     * @param bool $pinned
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.updatePinnedForumTopic
     * @api
     */
    public function updatePinnedForumTopic(AbstractInputChannel $channel, int $topicId, bool $pinned): ?AbstractUpdates
    {
        return $this->client->callSync(new UpdatePinnedForumTopicRequest($channel, $topicId, $pinned));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $topMsgId
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/channels.deleteTopicHistory
     * @api
     */
    public function deleteTopicHistory(AbstractInputChannel $channel, int $topMsgId): ?AffectedHistory
    {
        return $this->client->callSync(new DeleteTopicHistoryRequest($channel, $topMsgId));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param list<int> $order
     * @param bool|null $force
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.reorderPinnedForumTopics
     * @api
     */
    public function reorderPinnedForumTopics(AbstractInputChannel $channel, array $order, ?bool $force = null): ?AbstractUpdates
    {
        return $this->client->callSync(new ReorderPinnedForumTopicsRequest($channel, $order, $force));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleAntiSpam
     * @api
     */
    public function toggleAntiSpam(AbstractInputChannel $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleAntiSpamRequest($channel, $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $msgId
     * @return bool
     * @see https://core.telegram.org/method/channels.reportAntiSpamFalsePositive
     * @api
     */
    public function reportAntiSpamFalsePositive(AbstractInputChannel $channel, int $msgId): bool
    {
        return (bool) $this->client->callSync(new ReportAntiSpamFalsePositiveRequest($channel, $msgId));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleParticipantsHidden
     * @api
     */
    public function toggleParticipantsHidden(AbstractInputChannel $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleParticipantsHiddenRequest($channel, $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool|null $forProfile
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.updateColor
     * @api
     */
    public function updateColor(AbstractInputChannel $channel, ?bool $forProfile = null, ?int $color = null, ?int $backgroundEmojiId = null): ?AbstractUpdates
    {
        return $this->client->callSync(new UpdateColorRequest($channel, $forProfile, $color, $backgroundEmojiId));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleViewForumAsMessages
     * @api
     */
    public function toggleViewForumAsMessages(AbstractInputChannel $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleViewForumAsMessagesRequest($channel, $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|null $channel
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getChannelRecommendations
     * @api
     */
    public function getChannelRecommendations(?AbstractInputChannel $channel = null): ?AbstractChats
    {
        return $this->client->callSync(new GetChannelRecommendationsRequest($channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusUntil $emojiStatus
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.updateEmojiStatus
     * @api
     */
    public function updateEmojiStatus(AbstractInputChannel $channel, AbstractEmojiStatus $emojiStatus): ?AbstractUpdates
    {
        return $this->client->callSync(new UpdateEmojiStatusRequest($channel, $emojiStatus));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $boosts
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.setBoostsToUnblockRestrictions
     * @api
     */
    public function setBoostsToUnblockRestrictions(AbstractInputChannel $channel, int $boosts): ?AbstractUpdates
    {
        return $this->client->callSync(new SetBoostsToUnblockRestrictionsRequest($channel, $boosts));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses $stickerset
     * @return bool
     * @see https://core.telegram.org/method/channels.setEmojiStickers
     * @api
     */
    public function setEmojiStickers(AbstractInputChannel $channel, AbstractInputStickerSet $stickerset): bool
    {
        return (bool) $this->client->callSync(new SetEmojiStickersRequest($channel, $stickerset));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $restricted
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.restrictSponsoredMessages
     * @api
     */
    public function restrictSponsoredMessages(AbstractInputChannel $channel, bool $restricted): ?AbstractUpdates
    {
        return $this->client->callSync(new RestrictSponsoredMessagesRequest($channel, $restricted));
    }

    /**
     * @param string $hashtag
     * @param int $offsetRate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/channels.searchPosts
     * @api
     */
    public function searchPosts(string $hashtag, int $offsetRate, AbstractInputPeer $offsetPeer, int $offsetId, int $limit): ?AbstractMessages
    {
        return $this->client->callSync(new SearchPostsRequest($hashtag, $offsetRate, $offsetPeer, $offsetId, $limit));
    }
}