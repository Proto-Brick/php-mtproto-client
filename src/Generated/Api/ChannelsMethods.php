<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\CheckSearchPostsFloodRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\CheckUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ConvertToGigagroupRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\CreateChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeactivateAllUsernamesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\DeleteParticipantHistoryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditAdminRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditBannedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditCreatorRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditLocationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditPhotoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\EditTitleRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ExportMessageLinkRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetAdminLogRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetAdminedPublicChannelsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetChannelRecommendationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\GetChannelsRequest;
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
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReorderUsernamesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReportAntiSpamFalsePositiveRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\ReportSpamRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\RestrictSponsoredMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SearchPostsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SetBoostsToUnblockRestrictionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SetDiscussionGroupRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SetEmojiStickersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Channels\SetMainProfileTabRequest;
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
use ProtoBrick\MTProtoClient\Generated\Types\Base\ProfileTab;
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
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $maxId
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.readHistory
     * @api
     */
    public function readHistoryAsync(AbstractInputChannel|string|int $channel, int $maxId): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ReadHistoryRequest(channel: $channel, maxId: $maxId));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $maxId
     * @return bool
     * @see https://core.telegram.org/method/channels.readHistory
     * @api
     */
    public function readHistory(AbstractInputChannel|string|int $channel, int $maxId): bool
    {
        return (bool) $this->readHistoryAsync(channel: $channel, maxId: $maxId)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<int> $id
     * @return Future<AffectedMessages|null>
     * @see https://core.telegram.org/method/channels.deleteMessages
     * @api
     */
    public function deleteMessagesAsync(AbstractInputChannel|string|int $channel, array $id): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new DeleteMessagesRequest(channel: $channel, id: $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<int> $id
     * @return AffectedMessages|null
     * @see https://core.telegram.org/method/channels.deleteMessages
     * @api
     */
    public function deleteMessages(AbstractInputChannel|string|int $channel, array $id): ?AffectedMessages
    {
        return $this->deleteMessagesAsync(channel: $channel, id: $id)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @param list<int> $id
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.reportSpam
     * @api
     */
    public function reportSpamAsync(AbstractInputChannel|string|int $channel, AbstractInputPeer|string|int $participant, array $id): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        if (is_string($participant) || is_int($participant)) {
            $participant = $this->client->peerManager->resolve($participant);
        }
        return $this->client->call(new ReportSpamRequest(channel: $channel, participant: $participant, id: $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/channels.reportSpam
     * @api
     */
    public function reportSpam(AbstractInputChannel|string|int $channel, AbstractInputPeer|string|int $participant, array $id): bool
    {
        return (bool) $this->reportSpamAsync(channel: $channel, participant: $participant, id: $id)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<InputMessageID|InputMessageReplyTo|InputMessagePinned|InputMessageCallbackQuery> $id
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/channels.getMessages
     * @api
     */
    public function getMessagesAsync(AbstractInputChannel|string|int $channel, array $id): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new GetMessagesRequest(channel: $channel, id: $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<InputMessageID|InputMessageReplyTo|InputMessagePinned|InputMessageCallbackQuery> $id
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/channels.getMessages
     * @api
     */
    public function getMessages(AbstractInputChannel|string|int $channel, array $id): ?AbstractMessages
    {
        return $this->getMessagesAsync(channel: $channel, id: $id)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param ChannelParticipantsRecent|ChannelParticipantsAdmins|ChannelParticipantsKicked|ChannelParticipantsBots|ChannelParticipantsBanned|ChannelParticipantsSearch|ChannelParticipantsContacts|ChannelParticipantsMentions $filter
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @return Future<ChannelParticipants|ChannelParticipantsNotModified|null>
     * @see https://core.telegram.org/method/channels.getParticipants
     * @api
     */
    public function getParticipantsAsync(AbstractInputChannel|string|int $channel, AbstractChannelParticipantsFilter $filter, int $offset, int $limit, int $hash): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new GetParticipantsRequest(channel: $channel, filter: $filter, offset: $offset, limit: $limit, hash: $hash));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param ChannelParticipantsRecent|ChannelParticipantsAdmins|ChannelParticipantsKicked|ChannelParticipantsBots|ChannelParticipantsBanned|ChannelParticipantsSearch|ChannelParticipantsContacts|ChannelParticipantsMentions $filter
     * @param int $offset
     * @param int $limit
     * @param int $hash
     * @return ChannelParticipants|ChannelParticipantsNotModified|null
     * @see https://core.telegram.org/method/channels.getParticipants
     * @api
     */
    public function getParticipants(AbstractInputChannel|string|int $channel, AbstractChannelParticipantsFilter $filter, int $offset, int $limit, int $hash): ?AbstractChannelParticipants
    {
        return $this->getParticipantsAsync(channel: $channel, filter: $filter, offset: $offset, limit: $limit, hash: $hash)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @return Future<ChannelParticipant|null>
     * @see https://core.telegram.org/method/channels.getParticipant
     * @api
     */
    public function getParticipantAsync(AbstractInputChannel|string|int $channel, AbstractInputPeer|string|int $participant): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        if (is_string($participant) || is_int($participant)) {
            $participant = $this->client->peerManager->resolve($participant);
        }
        return $this->client->call(new GetParticipantRequest(channel: $channel, participant: $participant));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @return ChannelParticipant|null
     * @see https://core.telegram.org/method/channels.getParticipant
     * @api
     */
    public function getParticipant(AbstractInputChannel|string|int $channel, AbstractInputPeer|string|int $participant): ?ChannelParticipant
    {
        return $this->getParticipantAsync(channel: $channel, participant: $participant)->await();
    }

    /**
     * @param list<InputChannelEmpty|InputChannel|InputChannelFromMessage> $id
     * @return Future<Chats|ChatsSlice|null>
     * @see https://core.telegram.org/method/channels.getChannels
     * @api
     */
    public function getChannelsAsync(array $id): Future
    {
        return $this->client->call(new GetChannelsRequest(id: $id));
    }

    /**
     * @param list<InputChannelEmpty|InputChannel|InputChannelFromMessage> $id
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getChannels
     * @api
     */
    public function getChannels(array $id): ?AbstractChats
    {
        return $this->getChannelsAsync(id: $id)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return Future<ChatFull|null>
     * @see https://core.telegram.org/method/channels.getFullChannel
     * @api
     */
    public function getFullChannelAsync(AbstractInputChannel|string|int $channel): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new GetFullChannelRequest(channel: $channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return ChatFull|null
     * @see https://core.telegram.org/method/channels.getFullChannel
     * @api
     */
    public function getFullChannel(AbstractInputChannel|string|int $channel): ?ChatFull
    {
        return $this->getFullChannelAsync(channel: $channel)->await();
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
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.createChannel
     * @api
     */
    public function createChannelAsync(string $title, string $about, ?bool $broadcast = null, ?bool $megagroup = null, ?bool $forImport = null, ?bool $forum = null, ?AbstractInputGeoPoint $geoPoint = null, ?string $address = null, ?int $ttlPeriod = null): Future
    {
        return $this->client->call(new CreateChannelRequest(title: $title, about: $about, broadcast: $broadcast, megagroup: $megagroup, forImport: $forImport, forum: $forum, geoPoint: $geoPoint, address: $address, ttlPeriod: $ttlPeriod));
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
        return $this->createChannelAsync(title: $title, about: $about, broadcast: $broadcast, megagroup: $megagroup, forImport: $forImport, forum: $forum, geoPoint: $geoPoint, address: $address, ttlPeriod: $ttlPeriod)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param ChatAdminRights $adminRights
     * @param string $rank
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.editAdmin
     * @api
     */
    public function editAdminAsync(AbstractInputChannel|string|int $channel, AbstractInputUser|string|int $userId, ChatAdminRights $adminRights, string $rank): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new EditAdminRequest(channel: $channel, userId: $userId, adminRights: $adminRights, rank: $rank));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param ChatAdminRights $adminRights
     * @param string $rank
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editAdmin
     * @api
     */
    public function editAdmin(AbstractInputChannel|string|int $channel, AbstractInputUser|string|int $userId, ChatAdminRights $adminRights, string $rank): ?AbstractUpdates
    {
        return $this->editAdminAsync(channel: $channel, userId: $userId, adminRights: $adminRights, rank: $rank)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $title
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.editTitle
     * @api
     */
    public function editTitleAsync(AbstractInputChannel|string|int $channel, string $title): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new EditTitleRequest(channel: $channel, title: $title));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $title
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editTitle
     * @api
     */
    public function editTitle(AbstractInputChannel|string|int $channel, string $title): ?AbstractUpdates
    {
        return $this->editTitleAsync(channel: $channel, title: $title)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputChatPhotoEmpty|InputChatUploadedPhoto|InputChatPhoto $photo
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.editPhoto
     * @api
     */
    public function editPhotoAsync(AbstractInputChannel|string|int $channel, AbstractInputChatPhoto $photo): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new EditPhotoRequest(channel: $channel, photo: $photo));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputChatPhotoEmpty|InputChatUploadedPhoto|InputChatPhoto $photo
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editPhoto
     * @api
     */
    public function editPhoto(AbstractInputChannel|string|int $channel, AbstractInputChatPhoto $photo): ?AbstractUpdates
    {
        return $this->editPhotoAsync(channel: $channel, photo: $photo)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $username
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.checkUsername
     * @api
     */
    public function checkUsernameAsync(AbstractInputChannel|string|int $channel, string $username): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new CheckUsernameRequest(channel: $channel, username: $username));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $username
     * @return bool
     * @see https://core.telegram.org/method/channels.checkUsername
     * @api
     */
    public function checkUsername(AbstractInputChannel|string|int $channel, string $username): bool
    {
        return (bool) $this->checkUsernameAsync(channel: $channel, username: $username)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $username
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.updateUsername
     * @api
     */
    public function updateUsernameAsync(AbstractInputChannel|string|int $channel, string $username): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new UpdateUsernameRequest(channel: $channel, username: $username));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $username
     * @return bool
     * @see https://core.telegram.org/method/channels.updateUsername
     * @api
     */
    public function updateUsername(AbstractInputChannel|string|int $channel, string $username): bool
    {
        return (bool) $this->updateUsernameAsync(channel: $channel, username: $username)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.joinChannel
     * @api
     */
    public function joinChannelAsync(AbstractInputChannel|string|int $channel): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new JoinChannelRequest(channel: $channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.joinChannel
     * @api
     */
    public function joinChannel(AbstractInputChannel|string|int $channel): ?AbstractUpdates
    {
        return $this->joinChannelAsync(channel: $channel)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.leaveChannel
     * @api
     */
    public function leaveChannelAsync(AbstractInputChannel|string|int $channel): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new LeaveChannelRequest(channel: $channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.leaveChannel
     * @api
     */
    public function leaveChannel(AbstractInputChannel|string|int $channel): ?AbstractUpdates
    {
        return $this->leaveChannelAsync(channel: $channel)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $users
     * @return Future<InvitedUsers|null>
     * @see https://core.telegram.org/method/channels.inviteToChannel
     * @api
     */
    public function inviteToChannelAsync(AbstractInputChannel|string|int $channel, array $users): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new InviteToChannelRequest(channel: $channel, users: $users));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $users
     * @return InvitedUsers|null
     * @see https://core.telegram.org/method/channels.inviteToChannel
     * @api
     */
    public function inviteToChannel(AbstractInputChannel|string|int $channel, array $users): ?InvitedUsers
    {
        return $this->inviteToChannelAsync(channel: $channel, users: $users)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.deleteChannel
     * @api
     */
    public function deleteChannelAsync(AbstractInputChannel|string|int $channel): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new DeleteChannelRequest(channel: $channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.deleteChannel
     * @api
     */
    public function deleteChannel(AbstractInputChannel|string|int $channel): ?AbstractUpdates
    {
        return $this->deleteChannelAsync(channel: $channel)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $id
     * @param bool|null $grouped
     * @param bool|null $thread
     * @return Future<ExportedMessageLink|null>
     * @see https://core.telegram.org/method/channels.exportMessageLink
     * @api
     */
    public function exportMessageLinkAsync(AbstractInputChannel|string|int $channel, int $id, ?bool $grouped = null, ?bool $thread = null): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ExportMessageLinkRequest(channel: $channel, id: $id, grouped: $grouped, thread: $thread));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $id
     * @param bool|null $grouped
     * @param bool|null $thread
     * @return ExportedMessageLink|null
     * @see https://core.telegram.org/method/channels.exportMessageLink
     * @api
     */
    public function exportMessageLink(AbstractInputChannel|string|int $channel, int $id, ?bool $grouped = null, ?bool $thread = null): ?ExportedMessageLink
    {
        return $this->exportMessageLinkAsync(channel: $channel, id: $id, grouped: $grouped, thread: $thread)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool|null $signaturesEnabled
     * @param bool|null $profilesEnabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleSignatures
     * @api
     */
    public function toggleSignaturesAsync(AbstractInputChannel|string|int $channel, ?bool $signaturesEnabled = null, ?bool $profilesEnabled = null): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleSignaturesRequest(channel: $channel, signaturesEnabled: $signaturesEnabled, profilesEnabled: $profilesEnabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool|null $signaturesEnabled
     * @param bool|null $profilesEnabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleSignatures
     * @api
     */
    public function toggleSignatures(AbstractInputChannel|string|int $channel, ?bool $signaturesEnabled = null, ?bool $profilesEnabled = null): ?AbstractUpdates
    {
        return $this->toggleSignaturesAsync(channel: $channel, signaturesEnabled: $signaturesEnabled, profilesEnabled: $profilesEnabled)->await();
    }

    /**
     * @param bool|null $byLocation
     * @param bool|null $checkLimit
     * @param bool|null $forPersonal
     * @return Future<Chats|ChatsSlice|null>
     * @see https://core.telegram.org/method/channels.getAdminedPublicChannels
     * @api
     */
    public function getAdminedPublicChannelsAsync(?bool $byLocation = null, ?bool $checkLimit = null, ?bool $forPersonal = null): Future
    {
        return $this->client->call(new GetAdminedPublicChannelsRequest(byLocation: $byLocation, checkLimit: $checkLimit, forPersonal: $forPersonal));
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
        return $this->getAdminedPublicChannelsAsync(byLocation: $byLocation, checkLimit: $checkLimit, forPersonal: $forPersonal)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @param ChatBannedRights $bannedRights
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.editBanned
     * @api
     */
    public function editBannedAsync(AbstractInputChannel|string|int $channel, AbstractInputPeer|string|int $participant, ChatBannedRights $bannedRights): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        if (is_string($participant) || is_int($participant)) {
            $participant = $this->client->peerManager->resolve($participant);
        }
        return $this->client->call(new EditBannedRequest(channel: $channel, participant: $participant, bannedRights: $bannedRights));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @param ChatBannedRights $bannedRights
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editBanned
     * @api
     */
    public function editBanned(AbstractInputChannel|string|int $channel, AbstractInputPeer|string|int $participant, ChatBannedRights $bannedRights): ?AbstractUpdates
    {
        return $this->editBannedAsync(channel: $channel, participant: $participant, bannedRights: $bannedRights)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $q
     * @param int $maxId
     * @param int $minId
     * @param int $limit
     * @param ChannelAdminLogEventsFilter|null $eventsFilter
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage>|null $admins
     * @return Future<AdminLogResults|null>
     * @see https://core.telegram.org/method/channels.getAdminLog
     * @api
     */
    public function getAdminLogAsync(AbstractInputChannel|string|int $channel, string $q, int $maxId, int $minId, int $limit, ?ChannelAdminLogEventsFilter $eventsFilter = null, ?array $admins = null): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new GetAdminLogRequest(channel: $channel, q: $q, maxId: $maxId, minId: $minId, limit: $limit, eventsFilter: $eventsFilter, admins: $admins));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
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
    public function getAdminLog(AbstractInputChannel|string|int $channel, string $q, int $maxId, int $minId, int $limit, ?ChannelAdminLogEventsFilter $eventsFilter = null, ?array $admins = null): ?AdminLogResults
    {
        return $this->getAdminLogAsync(channel: $channel, q: $q, maxId: $maxId, minId: $minId, limit: $limit, eventsFilter: $eventsFilter, admins: $admins)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.setStickers
     * @api
     */
    public function setStickersAsync(AbstractInputChannel|string|int $channel, AbstractInputStickerSet $stickerset): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new SetStickersRequest(channel: $channel, stickerset: $stickerset));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return bool
     * @see https://core.telegram.org/method/channels.setStickers
     * @api
     */
    public function setStickers(AbstractInputChannel|string|int $channel, AbstractInputStickerSet $stickerset): bool
    {
        return (bool) $this->setStickersAsync(channel: $channel, stickerset: $stickerset)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<int> $id
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.readMessageContents
     * @api
     */
    public function readMessageContentsAsync(AbstractInputChannel|string|int $channel, array $id): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ReadMessageContentsRequest(channel: $channel, id: $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<int> $id
     * @return bool
     * @see https://core.telegram.org/method/channels.readMessageContents
     * @api
     */
    public function readMessageContents(AbstractInputChannel|string|int $channel, array $id): bool
    {
        return (bool) $this->readMessageContentsAsync(channel: $channel, id: $id)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $maxId
     * @param bool|null $forEveryone
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.deleteHistory
     * @api
     */
    public function deleteHistoryAsync(AbstractInputChannel|string|int $channel, int $maxId, ?bool $forEveryone = null): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new DeleteHistoryRequest(channel: $channel, maxId: $maxId, forEveryone: $forEveryone));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $maxId
     * @param bool|null $forEveryone
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.deleteHistory
     * @api
     */
    public function deleteHistory(AbstractInputChannel|string|int $channel, int $maxId, ?bool $forEveryone = null): ?AbstractUpdates
    {
        return $this->deleteHistoryAsync(channel: $channel, maxId: $maxId, forEveryone: $forEveryone)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.togglePreHistoryHidden
     * @api
     */
    public function togglePreHistoryHiddenAsync(AbstractInputChannel|string|int $channel, bool $enabled): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new TogglePreHistoryHiddenRequest(channel: $channel, enabled: $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.togglePreHistoryHidden
     * @api
     */
    public function togglePreHistoryHidden(AbstractInputChannel|string|int $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->togglePreHistoryHiddenAsync(channel: $channel, enabled: $enabled)->await();
    }

    /**
     * @param int $offset
     * @return Future<Chats|ChatsSlice|null>
     * @see https://core.telegram.org/method/channels.getLeftChannels
     * @api
     */
    public function getLeftChannelsAsync(int $offset): Future
    {
        return $this->client->call(new GetLeftChannelsRequest(offset: $offset));
    }

    /**
     * @param int $offset
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getLeftChannels
     * @api
     */
    public function getLeftChannels(int $offset): ?AbstractChats
    {
        return $this->getLeftChannelsAsync(offset: $offset)->await();
    }

    /**
     * @return Future<Chats|ChatsSlice|null>
     * @see https://core.telegram.org/method/channels.getGroupsForDiscussion
     * @api
     */
    public function getGroupsForDiscussionAsync(): Future
    {
        return $this->client->call(new GetGroupsForDiscussionRequest());
    }

    /**
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getGroupsForDiscussion
     * @api
     */
    public function getGroupsForDiscussion(): ?AbstractChats
    {
        return $this->getGroupsForDiscussionAsync()->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $broadcast
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $group
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.setDiscussionGroup
     * @api
     */
    public function setDiscussionGroupAsync(AbstractInputChannel|string|int $broadcast, AbstractInputChannel|string|int $group): Future
    {
        if (is_string($broadcast) || is_int($broadcast)) {
            $__tmpPeer = $this->client->peerManager->resolve($broadcast);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $broadcast = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $broadcast = $__tmpPeer;
            }
        }
        if (is_string($group) || is_int($group)) {
            $__tmpPeer = $this->client->peerManager->resolve($group);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $group = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $group = $__tmpPeer;
            }
        }
        return $this->client->call(new SetDiscussionGroupRequest(broadcast: $broadcast, group: $group));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $broadcast
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $group
     * @return bool
     * @see https://core.telegram.org/method/channels.setDiscussionGroup
     * @api
     */
    public function setDiscussionGroup(AbstractInputChannel|string|int $broadcast, AbstractInputChannel|string|int $group): bool
    {
        return (bool) $this->setDiscussionGroupAsync(broadcast: $broadcast, group: $group)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.editCreator
     * @api
     */
    public function editCreatorAsync(AbstractInputChannel|string|int $channel, AbstractInputUser|string|int $userId, AbstractInputCheckPasswordSRP $password): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new EditCreatorRequest(channel: $channel, userId: $userId, password: $password));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.editCreator
     * @api
     */
    public function editCreator(AbstractInputChannel|string|int $channel, AbstractInputUser|string|int $userId, AbstractInputCheckPasswordSRP $password): ?AbstractUpdates
    {
        return $this->editCreatorAsync(channel: $channel, userId: $userId, password: $password)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputGeoPointEmpty|InputGeoPoint $geoPoint
     * @param string $address
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.editLocation
     * @api
     */
    public function editLocationAsync(AbstractInputChannel|string|int $channel, AbstractInputGeoPoint $geoPoint, string $address): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new EditLocationRequest(channel: $channel, geoPoint: $geoPoint, address: $address));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputGeoPointEmpty|InputGeoPoint $geoPoint
     * @param string $address
     * @return bool
     * @see https://core.telegram.org/method/channels.editLocation
     * @api
     */
    public function editLocation(AbstractInputChannel|string|int $channel, AbstractInputGeoPoint $geoPoint, string $address): bool
    {
        return (bool) $this->editLocationAsync(channel: $channel, geoPoint: $geoPoint, address: $address)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $seconds
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleSlowMode
     * @api
     */
    public function toggleSlowModeAsync(AbstractInputChannel|string|int $channel, int $seconds): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleSlowModeRequest(channel: $channel, seconds: $seconds));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $seconds
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleSlowMode
     * @api
     */
    public function toggleSlowMode(AbstractInputChannel|string|int $channel, int $seconds): ?AbstractUpdates
    {
        return $this->toggleSlowModeAsync(channel: $channel, seconds: $seconds)->await();
    }

    /**
     * @return Future<InactiveChats|null>
     * @see https://core.telegram.org/method/channels.getInactiveChannels
     * @api
     */
    public function getInactiveChannelsAsync(): Future
    {
        return $this->client->call(new GetInactiveChannelsRequest());
    }

    /**
     * @return InactiveChats|null
     * @see https://core.telegram.org/method/channels.getInactiveChannels
     * @api
     */
    public function getInactiveChannels(): ?InactiveChats
    {
        return $this->getInactiveChannelsAsync()->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.convertToGigagroup
     * @api
     */
    public function convertToGigagroupAsync(AbstractInputChannel|string|int $channel): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ConvertToGigagroupRequest(channel: $channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.convertToGigagroup
     * @api
     */
    public function convertToGigagroup(AbstractInputChannel|string|int $channel): ?AbstractUpdates
    {
        return $this->convertToGigagroupAsync(channel: $channel)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $forPaidReactions
     * @param bool|null $forLiveStories
     * @return Future<SendAsPeers|null>
     * @see https://core.telegram.org/method/channels.getSendAs
     * @api
     */
    public function getSendAsAsync(AbstractInputPeer|string|int $peer, ?bool $forPaidReactions = null, ?bool $forLiveStories = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetSendAsRequest(peer: $peer, forPaidReactions: $forPaidReactions, forLiveStories: $forLiveStories));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $forPaidReactions
     * @param bool|null $forLiveStories
     * @return SendAsPeers|null
     * @see https://core.telegram.org/method/channels.getSendAs
     * @api
     */
    public function getSendAs(AbstractInputPeer|string|int $peer, ?bool $forPaidReactions = null, ?bool $forLiveStories = null): ?SendAsPeers
    {
        return $this->getSendAsAsync(peer: $peer, forPaidReactions: $forPaidReactions, forLiveStories: $forLiveStories)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @return Future<AffectedHistory|null>
     * @see https://core.telegram.org/method/channels.deleteParticipantHistory
     * @api
     */
    public function deleteParticipantHistoryAsync(AbstractInputChannel|string|int $channel, AbstractInputPeer|string|int $participant): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        if (is_string($participant) || is_int($participant)) {
            $participant = $this->client->peerManager->resolve($participant);
        }
        return $this->client->call(new DeleteParticipantHistoryRequest(channel: $channel, participant: $participant));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @return AffectedHistory|null
     * @see https://core.telegram.org/method/channels.deleteParticipantHistory
     * @api
     */
    public function deleteParticipantHistory(AbstractInputChannel|string|int $channel, AbstractInputPeer|string|int $participant): ?AffectedHistory
    {
        return $this->deleteParticipantHistoryAsync(channel: $channel, participant: $participant)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleJoinToSend
     * @api
     */
    public function toggleJoinToSendAsync(AbstractInputChannel|string|int $channel, bool $enabled): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleJoinToSendRequest(channel: $channel, enabled: $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleJoinToSend
     * @api
     */
    public function toggleJoinToSend(AbstractInputChannel|string|int $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->toggleJoinToSendAsync(channel: $channel, enabled: $enabled)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleJoinRequest
     * @api
     */
    public function toggleJoinRequestAsync(AbstractInputChannel|string|int $channel, bool $enabled): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleJoinRequestRequest(channel: $channel, enabled: $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleJoinRequest
     * @api
     */
    public function toggleJoinRequest(AbstractInputChannel|string|int $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->toggleJoinRequestAsync(channel: $channel, enabled: $enabled)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<string> $order
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.reorderUsernames
     * @api
     */
    public function reorderUsernamesAsync(AbstractInputChannel|string|int $channel, array $order): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ReorderUsernamesRequest(channel: $channel, order: $order));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param list<string> $order
     * @return bool
     * @see https://core.telegram.org/method/channels.reorderUsernames
     * @api
     */
    public function reorderUsernames(AbstractInputChannel|string|int $channel, array $order): bool
    {
        return (bool) $this->reorderUsernamesAsync(channel: $channel, order: $order)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $username
     * @param bool $active
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.toggleUsername
     * @api
     */
    public function toggleUsernameAsync(AbstractInputChannel|string|int $channel, string $username, bool $active): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleUsernameRequest(channel: $channel, username: $username, active: $active));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param string $username
     * @param bool $active
     * @return bool
     * @see https://core.telegram.org/method/channels.toggleUsername
     * @api
     */
    public function toggleUsername(AbstractInputChannel|string|int $channel, string $username, bool $active): bool
    {
        return (bool) $this->toggleUsernameAsync(channel: $channel, username: $username, active: $active)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.deactivateAllUsernames
     * @api
     */
    public function deactivateAllUsernamesAsync(AbstractInputChannel|string|int $channel): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new DeactivateAllUsernamesRequest(channel: $channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return bool
     * @see https://core.telegram.org/method/channels.deactivateAllUsernames
     * @api
     */
    public function deactivateAllUsernames(AbstractInputChannel|string|int $channel): bool
    {
        return (bool) $this->deactivateAllUsernamesAsync(channel: $channel)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @param bool $tabs
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleForum
     * @api
     */
    public function toggleForumAsync(AbstractInputChannel|string|int $channel, bool $enabled, bool $tabs): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleForumRequest(channel: $channel, enabled: $enabled, tabs: $tabs));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @param bool $tabs
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleForum
     * @api
     */
    public function toggleForum(AbstractInputChannel|string|int $channel, bool $enabled, bool $tabs): ?AbstractUpdates
    {
        return $this->toggleForumAsync(channel: $channel, enabled: $enabled, tabs: $tabs)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleAntiSpam
     * @api
     */
    public function toggleAntiSpamAsync(AbstractInputChannel|string|int $channel, bool $enabled): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleAntiSpamRequest(channel: $channel, enabled: $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleAntiSpam
     * @api
     */
    public function toggleAntiSpam(AbstractInputChannel|string|int $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->toggleAntiSpamAsync(channel: $channel, enabled: $enabled)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $msgId
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.reportAntiSpamFalsePositive
     * @api
     */
    public function reportAntiSpamFalsePositiveAsync(AbstractInputChannel|string|int $channel, int $msgId): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ReportAntiSpamFalsePositiveRequest(channel: $channel, msgId: $msgId));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $msgId
     * @return bool
     * @see https://core.telegram.org/method/channels.reportAntiSpamFalsePositive
     * @api
     */
    public function reportAntiSpamFalsePositive(AbstractInputChannel|string|int $channel, int $msgId): bool
    {
        return (bool) $this->reportAntiSpamFalsePositiveAsync(channel: $channel, msgId: $msgId)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleParticipantsHidden
     * @api
     */
    public function toggleParticipantsHiddenAsync(AbstractInputChannel|string|int $channel, bool $enabled): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleParticipantsHiddenRequest(channel: $channel, enabled: $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleParticipantsHidden
     * @api
     */
    public function toggleParticipantsHidden(AbstractInputChannel|string|int $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->toggleParticipantsHiddenAsync(channel: $channel, enabled: $enabled)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool|null $forProfile
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.updateColor
     * @api
     */
    public function updateColorAsync(AbstractInputChannel|string|int $channel, ?bool $forProfile = null, ?int $color = null, ?int $backgroundEmojiId = null): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new UpdateColorRequest(channel: $channel, forProfile: $forProfile, color: $color, backgroundEmojiId: $backgroundEmojiId));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool|null $forProfile
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.updateColor
     * @api
     */
    public function updateColor(AbstractInputChannel|string|int $channel, ?bool $forProfile = null, ?int $color = null, ?int $backgroundEmojiId = null): ?AbstractUpdates
    {
        return $this->updateColorAsync(channel: $channel, forProfile: $forProfile, color: $color, backgroundEmojiId: $backgroundEmojiId)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleViewForumAsMessages
     * @api
     */
    public function toggleViewForumAsMessagesAsync(AbstractInputChannel|string|int $channel, bool $enabled): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleViewForumAsMessagesRequest(channel: $channel, enabled: $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleViewForumAsMessages
     * @api
     */
    public function toggleViewForumAsMessages(AbstractInputChannel|string|int $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->toggleViewForumAsMessagesAsync(channel: $channel, enabled: $enabled)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int|null $channel
     * @return Future<Chats|ChatsSlice|null>
     * @see https://core.telegram.org/method/channels.getChannelRecommendations
     * @api
     */
    public function getChannelRecommendationsAsync(AbstractInputChannel|string|int|null $channel = null): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new GetChannelRecommendationsRequest(channel: $channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int|null $channel
     * @return Chats|ChatsSlice|null
     * @see https://core.telegram.org/method/channels.getChannelRecommendations
     * @api
     */
    public function getChannelRecommendations(AbstractInputChannel|string|int|null $channel = null): ?AbstractChats
    {
        return $this->getChannelRecommendationsAsync(channel: $channel)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusCollectible|InputEmojiStatusCollectible $emojiStatus
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.updateEmojiStatus
     * @api
     */
    public function updateEmojiStatusAsync(AbstractInputChannel|string|int $channel, AbstractEmojiStatus $emojiStatus): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new UpdateEmojiStatusRequest(channel: $channel, emojiStatus: $emojiStatus));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusCollectible|InputEmojiStatusCollectible $emojiStatus
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.updateEmojiStatus
     * @api
     */
    public function updateEmojiStatus(AbstractInputChannel|string|int $channel, AbstractEmojiStatus $emojiStatus): ?AbstractUpdates
    {
        return $this->updateEmojiStatusAsync(channel: $channel, emojiStatus: $emojiStatus)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $boosts
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.setBoostsToUnblockRestrictions
     * @api
     */
    public function setBoostsToUnblockRestrictionsAsync(AbstractInputChannel|string|int $channel, int $boosts): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new SetBoostsToUnblockRestrictionsRequest(channel: $channel, boosts: $boosts));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $boosts
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.setBoostsToUnblockRestrictions
     * @api
     */
    public function setBoostsToUnblockRestrictions(AbstractInputChannel|string|int $channel, int $boosts): ?AbstractUpdates
    {
        return $this->setBoostsToUnblockRestrictionsAsync(channel: $channel, boosts: $boosts)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.setEmojiStickers
     * @api
     */
    public function setEmojiStickersAsync(AbstractInputChannel|string|int $channel, AbstractInputStickerSet $stickerset): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new SetEmojiStickersRequest(channel: $channel, stickerset: $stickerset));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param InputStickerSetEmpty|InputStickerSetID|InputStickerSetShortName|InputStickerSetAnimatedEmoji|InputStickerSetDice|InputStickerSetAnimatedEmojiAnimations|InputStickerSetPremiumGifts|InputStickerSetEmojiGenericAnimations|InputStickerSetEmojiDefaultStatuses|InputStickerSetEmojiDefaultTopicIcons|InputStickerSetEmojiChannelDefaultStatuses|InputStickerSetTonGifts $stickerset
     * @return bool
     * @see https://core.telegram.org/method/channels.setEmojiStickers
     * @api
     */
    public function setEmojiStickers(AbstractInputChannel|string|int $channel, AbstractInputStickerSet $stickerset): bool
    {
        return (bool) $this->setEmojiStickersAsync(channel: $channel, stickerset: $stickerset)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $restricted
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.restrictSponsoredMessages
     * @api
     */
    public function restrictSponsoredMessagesAsync(AbstractInputChannel|string|int $channel, bool $restricted): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new RestrictSponsoredMessagesRequest(channel: $channel, restricted: $restricted));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $restricted
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.restrictSponsoredMessages
     * @api
     */
    public function restrictSponsoredMessages(AbstractInputChannel|string|int $channel, bool $restricted): ?AbstractUpdates
    {
        return $this->restrictSponsoredMessagesAsync(channel: $channel, restricted: $restricted)->await();
    }

    /**
     * @param int $offsetRate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @param string|null $hashtag
     * @param string|null $query
     * @param int|null $allowPaidStars
     * @return Future<Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null>
     * @see https://core.telegram.org/method/channels.searchPosts
     * @api
     */
    public function searchPostsAsync(int $offsetRate, AbstractInputPeer|string|int $offsetPeer, int $offsetId, int $limit, ?string $hashtag = null, ?string $query = null, ?int $allowPaidStars = null): Future
    {
        if (is_string($offsetPeer) || is_int($offsetPeer)) {
            $offsetPeer = $this->client->peerManager->resolve($offsetPeer);
        }
        return $this->client->call(new SearchPostsRequest(offsetRate: $offsetRate, offsetPeer: $offsetPeer, offsetId: $offsetId, limit: $limit, hashtag: $hashtag, query: $query, allowPaidStars: $allowPaidStars));
    }

    /**
     * @param int $offsetRate
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @param string|null $hashtag
     * @param string|null $query
     * @param int|null $allowPaidStars
     * @return Messages|MessagesSlice|ChannelMessages|MessagesNotModified|null
     * @see https://core.telegram.org/method/channels.searchPosts
     * @api
     */
    public function searchPosts(int $offsetRate, AbstractInputPeer|string|int $offsetPeer, int $offsetId, int $limit, ?string $hashtag = null, ?string $query = null, ?int $allowPaidStars = null): ?AbstractMessages
    {
        return $this->searchPostsAsync(offsetRate: $offsetRate, offsetPeer: $offsetPeer, offsetId: $offsetId, limit: $limit, hashtag: $hashtag, query: $query, allowPaidStars: $allowPaidStars)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $sendPaidMessagesStars
     * @param bool|null $broadcastMessagesAllowed
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.updatePaidMessagesPrice
     * @api
     */
    public function updatePaidMessagesPriceAsync(AbstractInputChannel|string|int $channel, int $sendPaidMessagesStars, ?bool $broadcastMessagesAllowed = null): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new UpdatePaidMessagesPriceRequest(channel: $channel, sendPaidMessagesStars: $sendPaidMessagesStars, broadcastMessagesAllowed: $broadcastMessagesAllowed));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $sendPaidMessagesStars
     * @param bool|null $broadcastMessagesAllowed
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.updatePaidMessagesPrice
     * @api
     */
    public function updatePaidMessagesPrice(AbstractInputChannel|string|int $channel, int $sendPaidMessagesStars, ?bool $broadcastMessagesAllowed = null): ?AbstractUpdates
    {
        return $this->updatePaidMessagesPriceAsync(channel: $channel, sendPaidMessagesStars: $sendPaidMessagesStars, broadcastMessagesAllowed: $broadcastMessagesAllowed)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/channels.toggleAutotranslation
     * @api
     */
    public function toggleAutotranslationAsync(AbstractInputChannel|string|int $channel, bool $enabled): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleAutotranslationRequest(channel: $channel, enabled: $enabled));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool $enabled
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/channels.toggleAutotranslation
     * @api
     */
    public function toggleAutotranslation(AbstractInputChannel|string|int $channel, bool $enabled): ?AbstractUpdates
    {
        return $this->toggleAutotranslationAsync(channel: $channel, enabled: $enabled)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $id
     * @return Future<UserEmpty|User|null>
     * @see https://core.telegram.org/method/channels.getMessageAuthor
     * @api
     */
    public function getMessageAuthorAsync(AbstractInputChannel|string|int $channel, int $id): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new GetMessageAuthorRequest(channel: $channel, id: $id));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $id
     * @return UserEmpty|User|null
     * @see https://core.telegram.org/method/channels.getMessageAuthor
     * @api
     */
    public function getMessageAuthor(AbstractInputChannel|string|int $channel, int $id): ?AbstractUser
    {
        return $this->getMessageAuthorAsync(channel: $channel, id: $id)->await();
    }

    /**
     * @param string|null $query
     * @return Future<SearchPostsFlood|null>
     * @see https://core.telegram.org/method/channels.checkSearchPostsFlood
     * @api
     */
    public function checkSearchPostsFloodAsync(?string $query = null): Future
    {
        return $this->client->call(new CheckSearchPostsFloodRequest(query: $query));
    }

    /**
     * @param string|null $query
     * @return SearchPostsFlood|null
     * @see https://core.telegram.org/method/channels.checkSearchPostsFlood
     * @api
     */
    public function checkSearchPostsFlood(?string $query = null): ?SearchPostsFlood
    {
        return $this->checkSearchPostsFloodAsync(query: $query)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param ProfileTab $tab
     * @return Future<bool>
     * @see https://core.telegram.org/method/channels.setMainProfileTab
     * @api
     */
    public function setMainProfileTabAsync(AbstractInputChannel|string|int $channel, ProfileTab $tab): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new SetMainProfileTabRequest(channel: $channel, tab: $tab));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param ProfileTab $tab
     * @return bool
     * @see https://core.telegram.org/method/channels.setMainProfileTab
     * @api
     */
    public function setMainProfileTab(AbstractInputChannel|string|int $channel, ProfileTab $tab): bool
    {
        return (bool) $this->setMainProfileTabAsync(channel: $channel, tab: $tab)->await();
    }
}