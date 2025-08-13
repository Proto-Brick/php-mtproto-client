<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\CheckSearchPostsFloodRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\CheckUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ConvertToGigagroupRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\CreateChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\CreateForumTopicRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeactivateAllUsernamesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteParticipantHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteTopicHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditAdminRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditBannedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditCreatorRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditForumTopicRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditLocationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditPhotoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditTitleRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ExportMessageLinkRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetAdminLogRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetAdminedPublicChannelsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetChannelRecommendationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetChannelsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetForumTopicsByIDRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetForumTopicsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetFullChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetGroupsForDiscussionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetInactiveChannelsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetLeftChannelsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetMessageAuthorRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetParticipantRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetParticipantsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetSendAsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\InviteToChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\JoinChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\LeaveChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReadHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReadMessageContentsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReorderPinnedForumTopicsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReorderUsernamesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReportAntiSpamFalsePositiveRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReportSpamRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\RestrictSponsoredMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SearchPostsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SetBoostsToUnblockRestrictionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SetDiscussionGroupRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SetEmojiStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SetStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleAntiSpamRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleAutotranslationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleForumRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleJoinRequestRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleJoinToSendRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleParticipantsHiddenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\TogglePreHistoryHiddenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleSignaturesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleSlowModeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ToggleViewForumAsMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\UpdateColorRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\UpdateEmojiStatusRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\UpdatePaidMessagesPriceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\UpdatePinnedForumTopicRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\UpdateUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChannelParticipantsFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChatPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelAdminLogEventsFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelParticipantsAdmins;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelParticipantsBanned;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelParticipantsBots;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelParticipantsContacts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelParticipantsKicked;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelParticipantsMentions;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelParticipantsRecent;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelParticipantsSearch;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatAdminRights;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatBannedRights;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatusCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatusEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ExportedMessageLink;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannelEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatPhotoEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatUploadedPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEmojiStatusCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGeoPointEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageCallbackQuery;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessagePinned;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetAnimatedEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetAnimatedEmojiAnimations;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetDice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiChannelDefaultStatuses;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiDefaultStatuses;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiDefaultTopicIcons;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmojiGenericAnimations;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetID;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetPremiumGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetShortName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetTonGifts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SearchPostsFlood;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Base\User;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\AbstractChannelParticipants;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\AdminLogResults;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\ChannelParticipant;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\ChannelParticipants;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\ChannelParticipantsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\SendAsPeers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedHistory;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChannelMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatFull;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\Chats;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatsSlice;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ForumTopics;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\InactiveChats;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\InvitedUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\Messages;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessagesNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessagesSlice;


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
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
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
     * @param bool|null $forPaidReactions
     * @return SendAsPeers|null
     * @see https://core.telegram.org/method/channels.getSendAs
     * @api
     */
    public function getSendAs(AbstractInputPeer $peer, ?bool $forPaidReactions = null): ?SendAsPeers
    {
        return $this->client->callSync(new GetSendAsRequest($peer, $forPaidReactions));
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
     * @param bool $tabs
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleForum
     * @api
     */
    public function toggleForum(AbstractInputChannel $channel, bool $enabled, bool $tabs): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleForumRequest($channel, $enabled, $tabs));
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
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusCollectible|InputEmojiStatusCollectible $emojiStatus
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
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
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
     * @param int $offsetRate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @param string|null $hashtag
     * @param string|null $query
     * @param int|null $allowPaidStars
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/channels.searchPosts
     * @api
     */
    public function searchPosts(int $offsetRate, AbstractInputPeer $offsetPeer, int $offsetId, int $limit, ?string $hashtag = null, ?string $query = null, ?int $allowPaidStars = null): ?AbstractMessages
    {
        return $this->client->callSync(new SearchPostsRequest($offsetRate, $offsetPeer, $offsetId, $limit, $hashtag, $query, $allowPaidStars));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $sendPaidMessagesStars
     * @param bool|null $broadcastMessagesAllowed
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.updatePaidMessagesPrice
     * @api
     */
    public function updatePaidMessagesPrice(AbstractInputChannel $channel, int $sendPaidMessagesStars, ?bool $broadcastMessagesAllowed = null): ?AbstractUpdates
    {
        return $this->client->callSync(new UpdatePaidMessagesPriceRequest($channel, $sendPaidMessagesStars, $broadcastMessagesAllowed));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleAutotranslation
     * @api
     */
    public function toggleAutotranslation(AbstractInputChannel $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleAutotranslationRequest($channel, $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $id
     * @return UserEmpty|User|null
     * @see https://core.telegram.org/method/channels.getMessageAuthor
     * @api
     */
    public function getMessageAuthor(AbstractInputChannel $channel, int $id): ?AbstractUser
    {
        return $this->client->callSync(new GetMessageAuthorRequest($channel, $id));
    }

    /**
     * @param string|null $query
     * @return SearchPostsFlood|null
     * @see https://core.telegram.org/method/channels.checkSearchPostsFlood
     * @api
     */
    public function checkSearchPostsFlood(?string $query = null): ?SearchPostsFlood
    {
        return $this->client->callSync(new CheckSearchPostsFloodRequest($query));
    }
}