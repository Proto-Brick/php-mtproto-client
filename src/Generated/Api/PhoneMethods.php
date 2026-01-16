<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\AcceptCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\CheckGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\ConfirmCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\CreateConferenceCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\CreateGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DeclineConferenceCallInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DeleteConferenceCallParticipantsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DeleteGroupCallMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DeleteGroupCallParticipantMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DiscardCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DiscardGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\EditGroupCallParticipantRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\EditGroupCallTitleRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\ExportGroupCallInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetCallConfigRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallChainBlocksRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallJoinAsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallStarsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallStreamChannelsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallStreamRtmpUrlRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupParticipantsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\InviteConferenceCallParticipantRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\InviteToGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\JoinGroupCallPresentationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\JoinGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\LeaveGroupCallPresentationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\LeaveGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\ReceivedCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\RequestCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SaveCallDebugRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SaveCallLogRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SaveDefaultGroupCallJoinAsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SaveDefaultSendAsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SendConferenceCallBroadcastRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SendGroupCallEncryptedMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SendGroupCallMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SendSignalingDataRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SetCallRatingRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\StartScheduledGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\ToggleGroupCallRecordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\ToggleGroupCallSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\ToggleGroupCallStartSubscriptionRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPhoneCallDiscardReason;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileBig;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileStoryDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGroupCallInviteMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGroupCallSlug;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhoneCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PhoneCallDiscardReasonBusy;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PhoneCallDiscardReasonDisconnect;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PhoneCallDiscardReasonHangup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PhoneCallDiscardReasonMigrateConferenceCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PhoneCallDiscardReasonMissed;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PhoneCallProtocol;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\ExportedGroupCallInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCallStars;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCallStreamChannels;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCallStreamRtmpUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupParticipants;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\JoinAsPeers;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\PhoneCall;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "phone" group.
 */
final readonly class PhoneMethods
{
    public function __construct(private Client $client) {}

    /**
     * @return Future<array>
     * @see https://core.telegram.org/method/phone.getCallConfig
     * @api
     */
    public function getCallConfigAsync(): Future
    {
        return $this->client->call(new GetCallConfigRequest());
    }

    /**
     * @return array
     * @see https://core.telegram.org/method/phone.getCallConfig
     * @api
     */
    public function getCallConfig(): array
    {
        return $this->getCallConfigAsync()->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $gAHash
     * @param PhoneCallProtocol $protocol
     * @param bool|null $video
     * @param int|null $randomId
     * @return Future<PhoneCall|null>
     * @see https://core.telegram.org/method/phone.requestCall
     * @api
     */
    public function requestCallAsync(AbstractInputUser|string|int $userId, string $gAHash, PhoneCallProtocol $protocol, ?bool $video = null, ?int $randomId = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new RequestCallRequest(userId: $userId, gAHash: $gAHash, protocol: $protocol, video: $video, randomId: $randomId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $gAHash
     * @param PhoneCallProtocol $protocol
     * @param bool|null $video
     * @param int|null $randomId
     * @return PhoneCall|null
     * @see https://core.telegram.org/method/phone.requestCall
     * @api
     */
    public function requestCall(AbstractInputUser|string|int $userId, string $gAHash, PhoneCallProtocol $protocol, ?bool $video = null, ?int $randomId = null): ?PhoneCall
    {
        return $this->requestCallAsync(userId: $userId, gAHash: $gAHash, protocol: $protocol, video: $video, randomId: $randomId)->await();
    }

    /**
     * @param InputPhoneCall $peer
     * @param string $gB
     * @param PhoneCallProtocol $protocol
     * @return Future<PhoneCall|null>
     * @see https://core.telegram.org/method/phone.acceptCall
     * @api
     */
    public function acceptCallAsync(InputPhoneCall $peer, string $gB, PhoneCallProtocol $protocol): Future
    {
        return $this->client->call(new AcceptCallRequest(peer: $peer, gB: $gB, protocol: $protocol));
    }

    /**
     * @param InputPhoneCall $peer
     * @param string $gB
     * @param PhoneCallProtocol $protocol
     * @return PhoneCall|null
     * @see https://core.telegram.org/method/phone.acceptCall
     * @api
     */
    public function acceptCall(InputPhoneCall $peer, string $gB, PhoneCallProtocol $protocol): ?PhoneCall
    {
        return $this->acceptCallAsync(peer: $peer, gB: $gB, protocol: $protocol)->await();
    }

    /**
     * @param InputPhoneCall $peer
     * @param string $gA
     * @param int $keyFingerprint
     * @param PhoneCallProtocol $protocol
     * @return Future<PhoneCall|null>
     * @see https://core.telegram.org/method/phone.confirmCall
     * @api
     */
    public function confirmCallAsync(InputPhoneCall $peer, string $gA, int $keyFingerprint, PhoneCallProtocol $protocol): Future
    {
        return $this->client->call(new ConfirmCallRequest(peer: $peer, gA: $gA, keyFingerprint: $keyFingerprint, protocol: $protocol));
    }

    /**
     * @param InputPhoneCall $peer
     * @param string $gA
     * @param int $keyFingerprint
     * @param PhoneCallProtocol $protocol
     * @return PhoneCall|null
     * @see https://core.telegram.org/method/phone.confirmCall
     * @api
     */
    public function confirmCall(InputPhoneCall $peer, string $gA, int $keyFingerprint, PhoneCallProtocol $protocol): ?PhoneCall
    {
        return $this->confirmCallAsync(peer: $peer, gA: $gA, keyFingerprint: $keyFingerprint, protocol: $protocol)->await();
    }

    /**
     * @param InputPhoneCall $peer
     * @return Future<bool>
     * @see https://core.telegram.org/method/phone.receivedCall
     * @api
     */
    public function receivedCallAsync(InputPhoneCall $peer): Future
    {
        return $this->client->call(new ReceivedCallRequest(peer: $peer));
    }

    /**
     * @param InputPhoneCall $peer
     * @return bool
     * @see https://core.telegram.org/method/phone.receivedCall
     * @api
     */
    public function receivedCall(InputPhoneCall $peer): bool
    {
        return (bool) $this->receivedCallAsync(peer: $peer)->await();
    }

    /**
     * @param InputPhoneCall $peer
     * @param int $duration
     * @param PhoneCallDiscardReasonMissed|PhoneCallDiscardReasonDisconnect|PhoneCallDiscardReasonHangup|PhoneCallDiscardReasonBusy|PhoneCallDiscardReasonMigrateConferenceCall $reason
     * @param int $connectionId
     * @param bool|null $video
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.discardCall
     * @api
     */
    public function discardCallAsync(InputPhoneCall $peer, int $duration, AbstractPhoneCallDiscardReason $reason, int $connectionId, ?bool $video = null): Future
    {
        return $this->client->call(new DiscardCallRequest(peer: $peer, duration: $duration, reason: $reason, connectionId: $connectionId, video: $video));
    }

    /**
     * @param InputPhoneCall $peer
     * @param int $duration
     * @param PhoneCallDiscardReasonMissed|PhoneCallDiscardReasonDisconnect|PhoneCallDiscardReasonHangup|PhoneCallDiscardReasonBusy|PhoneCallDiscardReasonMigrateConferenceCall $reason
     * @param int $connectionId
     * @param bool|null $video
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.discardCall
     * @api
     */
    public function discardCall(InputPhoneCall $peer, int $duration, AbstractPhoneCallDiscardReason $reason, int $connectionId, ?bool $video = null): ?AbstractUpdates
    {
        return $this->discardCallAsync(peer: $peer, duration: $duration, reason: $reason, connectionId: $connectionId, video: $video)->await();
    }

    /**
     * @param InputPhoneCall $peer
     * @param int $rating
     * @param string $comment
     * @param bool|null $userInitiative
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.setCallRating
     * @api
     */
    public function setCallRatingAsync(InputPhoneCall $peer, int $rating, string $comment, ?bool $userInitiative = null): Future
    {
        return $this->client->call(new SetCallRatingRequest(peer: $peer, rating: $rating, comment: $comment, userInitiative: $userInitiative));
    }

    /**
     * @param InputPhoneCall $peer
     * @param int $rating
     * @param string $comment
     * @param bool|null $userInitiative
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.setCallRating
     * @api
     */
    public function setCallRating(InputPhoneCall $peer, int $rating, string $comment, ?bool $userInitiative = null): ?AbstractUpdates
    {
        return $this->setCallRatingAsync(peer: $peer, rating: $rating, comment: $comment, userInitiative: $userInitiative)->await();
    }

    /**
     * @param InputPhoneCall $peer
     * @param array $debug
     * @return Future<bool>
     * @see https://core.telegram.org/method/phone.saveCallDebug
     * @api
     */
    public function saveCallDebugAsync(InputPhoneCall $peer, array $debug): Future
    {
        return $this->client->call(new SaveCallDebugRequest(peer: $peer, debug: $debug));
    }

    /**
     * @param InputPhoneCall $peer
     * @param array $debug
     * @return bool
     * @see https://core.telegram.org/method/phone.saveCallDebug
     * @api
     */
    public function saveCallDebug(InputPhoneCall $peer, array $debug): bool
    {
        return (bool) $this->saveCallDebugAsync(peer: $peer, debug: $debug)->await();
    }

    /**
     * @param InputPhoneCall $peer
     * @param string $data
     * @return Future<bool>
     * @see https://core.telegram.org/method/phone.sendSignalingData
     * @api
     */
    public function sendSignalingDataAsync(InputPhoneCall $peer, string $data): Future
    {
        return $this->client->call(new SendSignalingDataRequest(peer: $peer, data: $data));
    }

    /**
     * @param InputPhoneCall $peer
     * @param string $data
     * @return bool
     * @see https://core.telegram.org/method/phone.sendSignalingData
     * @api
     */
    public function sendSignalingData(InputPhoneCall $peer, string $data): bool
    {
        return (bool) $this->sendSignalingDataAsync(peer: $peer, data: $data)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $rtmpStream
     * @param int|null $randomId
     * @param string|null $title
     * @param int|null $scheduleDate
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.createGroupCall
     * @api
     */
    public function createGroupCallAsync(AbstractInputPeer|string|int $peer, ?bool $rtmpStream = null, ?int $randomId = null, ?string $title = null, ?int $scheduleDate = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new CreateGroupCallRequest(peer: $peer, rtmpStream: $rtmpStream, randomId: $randomId, title: $title, scheduleDate: $scheduleDate));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool|null $rtmpStream
     * @param int|null $randomId
     * @param string|null $title
     * @param int|null $scheduleDate
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.createGroupCall
     * @api
     */
    public function createGroupCall(AbstractInputPeer|string|int $peer, ?bool $rtmpStream = null, ?int $randomId = null, ?string $title = null, ?int $scheduleDate = null): ?AbstractUpdates
    {
        return $this->createGroupCallAsync(peer: $peer, rtmpStream: $rtmpStream, randomId: $randomId, title: $title, scheduleDate: $scheduleDate)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $joinAs
     * @param array $params
     * @param bool|null $muted
     * @param bool|null $videoStopped
     * @param string|null $inviteHash
     * @param string|null $publicKey
     * @param string|null $block
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.joinGroupCall
     * @api
     */
    public function joinGroupCallAsync(AbstractInputGroupCall $call, AbstractInputPeer|string|int $joinAs, array $params, ?bool $muted = null, ?bool $videoStopped = null, ?string $inviteHash = null, ?string $publicKey = null, ?string $block = null): Future
    {
        if (is_string($joinAs) || is_int($joinAs)) {
            $joinAs = $this->client->peerManager->resolve($joinAs);
        }
        return $this->client->call(new JoinGroupCallRequest(call: $call, joinAs: $joinAs, params: $params, muted: $muted, videoStopped: $videoStopped, inviteHash: $inviteHash, publicKey: $publicKey, block: $block));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $joinAs
     * @param array $params
     * @param bool|null $muted
     * @param bool|null $videoStopped
     * @param string|null $inviteHash
     * @param string|null $publicKey
     * @param string|null $block
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.joinGroupCall
     * @api
     */
    public function joinGroupCall(AbstractInputGroupCall $call, AbstractInputPeer|string|int $joinAs, array $params, ?bool $muted = null, ?bool $videoStopped = null, ?string $inviteHash = null, ?string $publicKey = null, ?string $block = null): ?AbstractUpdates
    {
        return $this->joinGroupCallAsync(call: $call, joinAs: $joinAs, params: $params, muted: $muted, videoStopped: $videoStopped, inviteHash: $inviteHash, publicKey: $publicKey, block: $block)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param int $source
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.leaveGroupCall
     * @api
     */
    public function leaveGroupCallAsync(AbstractInputGroupCall $call, int $source): Future
    {
        return $this->client->call(new LeaveGroupCallRequest(call: $call, source: $source));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param int $source
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.leaveGroupCall
     * @api
     */
    public function leaveGroupCall(AbstractInputGroupCall $call, int $source): ?AbstractUpdates
    {
        return $this->leaveGroupCallAsync(call: $call, source: $source)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $users
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.inviteToGroupCall
     * @api
     */
    public function inviteToGroupCallAsync(AbstractInputGroupCall $call, array $users): Future
    {
        return $this->client->call(new InviteToGroupCallRequest(call: $call, users: $users));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $users
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.inviteToGroupCall
     * @api
     */
    public function inviteToGroupCall(AbstractInputGroupCall $call, array $users): ?AbstractUpdates
    {
        return $this->inviteToGroupCallAsync(call: $call, users: $users)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.discardGroupCall
     * @api
     */
    public function discardGroupCallAsync(AbstractInputGroupCall $call): Future
    {
        return $this->client->call(new DiscardGroupCallRequest(call: $call));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.discardGroupCall
     * @api
     */
    public function discardGroupCall(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->discardGroupCallAsync(call: $call)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool|null $resetInviteHash
     * @param bool|null $joinMuted
     * @param bool|null $messagesEnabled
     * @param int|null $sendPaidMessagesStars
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.toggleGroupCallSettings
     * @api
     */
    public function toggleGroupCallSettingsAsync(AbstractInputGroupCall $call, ?bool $resetInviteHash = null, ?bool $joinMuted = null, ?bool $messagesEnabled = null, ?int $sendPaidMessagesStars = null): Future
    {
        return $this->client->call(new ToggleGroupCallSettingsRequest(call: $call, resetInviteHash: $resetInviteHash, joinMuted: $joinMuted, messagesEnabled: $messagesEnabled, sendPaidMessagesStars: $sendPaidMessagesStars));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool|null $resetInviteHash
     * @param bool|null $joinMuted
     * @param bool|null $messagesEnabled
     * @param int|null $sendPaidMessagesStars
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.toggleGroupCallSettings
     * @api
     */
    public function toggleGroupCallSettings(AbstractInputGroupCall $call, ?bool $resetInviteHash = null, ?bool $joinMuted = null, ?bool $messagesEnabled = null, ?int $sendPaidMessagesStars = null): ?AbstractUpdates
    {
        return $this->toggleGroupCallSettingsAsync(call: $call, resetInviteHash: $resetInviteHash, joinMuted: $joinMuted, messagesEnabled: $messagesEnabled, sendPaidMessagesStars: $sendPaidMessagesStars)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param int $limit
     * @return Future<GroupCall|null>
     * @see https://core.telegram.org/method/phone.getGroupCall
     * @api
     */
    public function getGroupCallAsync(AbstractInputGroupCall $call, int $limit): Future
    {
        return $this->client->call(new GetGroupCallRequest(call: $call, limit: $limit));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param int $limit
     * @return GroupCall|null
     * @see https://core.telegram.org/method/phone.getGroupCall
     * @api
     */
    public function getGroupCall(AbstractInputGroupCall $call, int $limit): ?GroupCall
    {
        return $this->getGroupCallAsync(call: $call, limit: $limit)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $ids
     * @param list<int> $sources
     * @param string $offset
     * @param int $limit
     * @return Future<GroupParticipants|null>
     * @see https://core.telegram.org/method/phone.getGroupParticipants
     * @api
     */
    public function getGroupParticipantsAsync(AbstractInputGroupCall $call, array $ids, array $sources, string $offset, int $limit): Future
    {
        return $this->client->call(new GetGroupParticipantsRequest(call: $call, ids: $ids, sources: $sources, offset: $offset, limit: $limit));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage> $ids
     * @param list<int> $sources
     * @param string $offset
     * @param int $limit
     * @return GroupParticipants|null
     * @see https://core.telegram.org/method/phone.getGroupParticipants
     * @api
     */
    public function getGroupParticipants(AbstractInputGroupCall $call, array $ids, array $sources, string $offset, int $limit): ?GroupParticipants
    {
        return $this->getGroupParticipantsAsync(call: $call, ids: $ids, sources: $sources, offset: $offset, limit: $limit)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<int> $sources
     * @return Future<list<int>>
     * @see https://core.telegram.org/method/phone.checkGroupCall
     * @api
     */
    public function checkGroupCallAsync(AbstractInputGroupCall $call, array $sources): Future
    {
        return $this->client->call(new CheckGroupCallRequest(call: $call, sources: $sources));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<int> $sources
     * @return list<int>
     * @see https://core.telegram.org/method/phone.checkGroupCall
     * @api
     */
    public function checkGroupCall(AbstractInputGroupCall $call, array $sources): array
    {
        return $this->checkGroupCallAsync(call: $call, sources: $sources)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool|null $start
     * @param bool|null $video
     * @param string|null $title
     * @param bool|null $videoPortrait
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.toggleGroupCallRecord
     * @api
     */
    public function toggleGroupCallRecordAsync(AbstractInputGroupCall $call, ?bool $start = null, ?bool $video = null, ?string $title = null, ?bool $videoPortrait = null): Future
    {
        return $this->client->call(new ToggleGroupCallRecordRequest(call: $call, start: $start, video: $video, title: $title, videoPortrait: $videoPortrait));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool|null $start
     * @param bool|null $video
     * @param string|null $title
     * @param bool|null $videoPortrait
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.toggleGroupCallRecord
     * @api
     */
    public function toggleGroupCallRecord(AbstractInputGroupCall $call, ?bool $start = null, ?bool $video = null, ?string $title = null, ?bool $videoPortrait = null): ?AbstractUpdates
    {
        return $this->toggleGroupCallRecordAsync(call: $call, start: $start, video: $video, title: $title, videoPortrait: $videoPortrait)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @param bool|null $muted
     * @param int|null $volume
     * @param bool|null $raiseHand
     * @param bool|null $videoStopped
     * @param bool|null $videoPaused
     * @param bool|null $presentationPaused
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.editGroupCallParticipant
     * @api
     */
    public function editGroupCallParticipantAsync(AbstractInputGroupCall $call, AbstractInputPeer|string|int $participant, ?bool $muted = null, ?int $volume = null, ?bool $raiseHand = null, ?bool $videoStopped = null, ?bool $videoPaused = null, ?bool $presentationPaused = null): Future
    {
        if (is_string($participant) || is_int($participant)) {
            $participant = $this->client->peerManager->resolve($participant);
        }
        return $this->client->call(new EditGroupCallParticipantRequest(call: $call, participant: $participant, muted: $muted, volume: $volume, raiseHand: $raiseHand, videoStopped: $videoStopped, videoPaused: $videoPaused, presentationPaused: $presentationPaused));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @param bool|null $muted
     * @param int|null $volume
     * @param bool|null $raiseHand
     * @param bool|null $videoStopped
     * @param bool|null $videoPaused
     * @param bool|null $presentationPaused
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.editGroupCallParticipant
     * @api
     */
    public function editGroupCallParticipant(AbstractInputGroupCall $call, AbstractInputPeer|string|int $participant, ?bool $muted = null, ?int $volume = null, ?bool $raiseHand = null, ?bool $videoStopped = null, ?bool $videoPaused = null, ?bool $presentationPaused = null): ?AbstractUpdates
    {
        return $this->editGroupCallParticipantAsync(call: $call, participant: $participant, muted: $muted, volume: $volume, raiseHand: $raiseHand, videoStopped: $videoStopped, videoPaused: $videoPaused, presentationPaused: $presentationPaused)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param string $title
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.editGroupCallTitle
     * @api
     */
    public function editGroupCallTitleAsync(AbstractInputGroupCall $call, string $title): Future
    {
        return $this->client->call(new EditGroupCallTitleRequest(call: $call, title: $title));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param string $title
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.editGroupCallTitle
     * @api
     */
    public function editGroupCallTitle(AbstractInputGroupCall $call, string $title): ?AbstractUpdates
    {
        return $this->editGroupCallTitleAsync(call: $call, title: $title)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<JoinAsPeers|null>
     * @see https://core.telegram.org/method/phone.getGroupCallJoinAs
     * @api
     */
    public function getGroupCallJoinAsAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetGroupCallJoinAsRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return JoinAsPeers|null
     * @see https://core.telegram.org/method/phone.getGroupCallJoinAs
     * @api
     */
    public function getGroupCallJoinAs(AbstractInputPeer|string|int $peer): ?JoinAsPeers
    {
        return $this->getGroupCallJoinAsAsync(peer: $peer)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool|null $canSelfUnmute
     * @return Future<ExportedGroupCallInvite|null>
     * @see https://core.telegram.org/method/phone.exportGroupCallInvite
     * @api
     */
    public function exportGroupCallInviteAsync(AbstractInputGroupCall $call, ?bool $canSelfUnmute = null): Future
    {
        return $this->client->call(new ExportGroupCallInviteRequest(call: $call, canSelfUnmute: $canSelfUnmute));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool|null $canSelfUnmute
     * @return ExportedGroupCallInvite|null
     * @see https://core.telegram.org/method/phone.exportGroupCallInvite
     * @api
     */
    public function exportGroupCallInvite(AbstractInputGroupCall $call, ?bool $canSelfUnmute = null): ?ExportedGroupCallInvite
    {
        return $this->exportGroupCallInviteAsync(call: $call, canSelfUnmute: $canSelfUnmute)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool $subscribed
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.toggleGroupCallStartSubscription
     * @api
     */
    public function toggleGroupCallStartSubscriptionAsync(AbstractInputGroupCall $call, bool $subscribed): Future
    {
        return $this->client->call(new ToggleGroupCallStartSubscriptionRequest(call: $call, subscribed: $subscribed));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool $subscribed
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.toggleGroupCallStartSubscription
     * @api
     */
    public function toggleGroupCallStartSubscription(AbstractInputGroupCall $call, bool $subscribed): ?AbstractUpdates
    {
        return $this->toggleGroupCallStartSubscriptionAsync(call: $call, subscribed: $subscribed)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.startScheduledGroupCall
     * @api
     */
    public function startScheduledGroupCallAsync(AbstractInputGroupCall $call): Future
    {
        return $this->client->call(new StartScheduledGroupCallRequest(call: $call));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.startScheduledGroupCall
     * @api
     */
    public function startScheduledGroupCall(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->startScheduledGroupCallAsync(call: $call)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $joinAs
     * @return Future<bool>
     * @see https://core.telegram.org/method/phone.saveDefaultGroupCallJoinAs
     * @api
     */
    public function saveDefaultGroupCallJoinAsAsync(AbstractInputPeer|string|int $peer, AbstractInputPeer|string|int $joinAs): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($joinAs) || is_int($joinAs)) {
            $joinAs = $this->client->peerManager->resolve($joinAs);
        }
        return $this->client->call(new SaveDefaultGroupCallJoinAsRequest(peer: $peer, joinAs: $joinAs));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $joinAs
     * @return bool
     * @see https://core.telegram.org/method/phone.saveDefaultGroupCallJoinAs
     * @api
     */
    public function saveDefaultGroupCallJoinAs(AbstractInputPeer|string|int $peer, AbstractInputPeer|string|int $joinAs): bool
    {
        return (bool) $this->saveDefaultGroupCallJoinAsAsync(peer: $peer, joinAs: $joinAs)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param array $params
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.joinGroupCallPresentation
     * @api
     */
    public function joinGroupCallPresentationAsync(AbstractInputGroupCall $call, array $params): Future
    {
        return $this->client->call(new JoinGroupCallPresentationRequest(call: $call, params: $params));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param array $params
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.joinGroupCallPresentation
     * @api
     */
    public function joinGroupCallPresentation(AbstractInputGroupCall $call, array $params): ?AbstractUpdates
    {
        return $this->joinGroupCallPresentationAsync(call: $call, params: $params)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.leaveGroupCallPresentation
     * @api
     */
    public function leaveGroupCallPresentationAsync(AbstractInputGroupCall $call): Future
    {
        return $this->client->call(new LeaveGroupCallPresentationRequest(call: $call));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.leaveGroupCallPresentation
     * @api
     */
    public function leaveGroupCallPresentation(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->leaveGroupCallPresentationAsync(call: $call)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return Future<GroupCallStreamChannels|null>
     * @see https://core.telegram.org/method/phone.getGroupCallStreamChannels
     * @api
     */
    public function getGroupCallStreamChannelsAsync(AbstractInputGroupCall $call): Future
    {
        return $this->client->call(new GetGroupCallStreamChannelsRequest(call: $call));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return GroupCallStreamChannels|null
     * @see https://core.telegram.org/method/phone.getGroupCallStreamChannels
     * @api
     */
    public function getGroupCallStreamChannels(AbstractInputGroupCall $call): ?GroupCallStreamChannels
    {
        return $this->getGroupCallStreamChannelsAsync(call: $call)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool $revoke
     * @param bool|null $liveStory
     * @return Future<GroupCallStreamRtmpUrl|null>
     * @see https://core.telegram.org/method/phone.getGroupCallStreamRtmpUrl
     * @api
     */
    public function getGroupCallStreamRtmpUrlAsync(AbstractInputPeer|string|int $peer, bool $revoke, ?bool $liveStory = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new GetGroupCallStreamRtmpUrlRequest(peer: $peer, revoke: $revoke, liveStory: $liveStory));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool $revoke
     * @param bool|null $liveStory
     * @return GroupCallStreamRtmpUrl|null
     * @see https://core.telegram.org/method/phone.getGroupCallStreamRtmpUrl
     * @api
     */
    public function getGroupCallStreamRtmpUrl(AbstractInputPeer|string|int $peer, bool $revoke, ?bool $liveStory = null): ?GroupCallStreamRtmpUrl
    {
        return $this->getGroupCallStreamRtmpUrlAsync(peer: $peer, revoke: $revoke, liveStory: $liveStory)->await();
    }

    /**
     * @param InputPhoneCall $peer
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @return Future<bool>
     * @see https://core.telegram.org/method/phone.saveCallLog
     * @api
     */
    public function saveCallLogAsync(InputPhoneCall $peer, AbstractInputFile $file): Future
    {
        return $this->client->call(new SaveCallLogRequest(peer: $peer, file: $file));
    }

    /**
     * @param InputPhoneCall $peer
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @return bool
     * @see https://core.telegram.org/method/phone.saveCallLog
     * @api
     */
    public function saveCallLog(InputPhoneCall $peer, AbstractInputFile $file): bool
    {
        return (bool) $this->saveCallLogAsync(peer: $peer, file: $file)->await();
    }

    /**
     * @param bool|null $muted
     * @param bool|null $videoStopped
     * @param bool|null $join
     * @param int|null $randomId
     * @param string|null $publicKey
     * @param string|null $block
     * @param array|null $params
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.createConferenceCall
     * @api
     */
    public function createConferenceCallAsync(?bool $muted = null, ?bool $videoStopped = null, ?bool $join = null, ?int $randomId = null, ?string $publicKey = null, ?string $block = null, ?array $params = null): Future
    {
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new CreateConferenceCallRequest(muted: $muted, videoStopped: $videoStopped, join: $join, randomId: $randomId, publicKey: $publicKey, block: $block, params: $params));
    }

    /**
     * @param bool|null $muted
     * @param bool|null $videoStopped
     * @param bool|null $join
     * @param int|null $randomId
     * @param string|null $publicKey
     * @param string|null $block
     * @param array|null $params
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.createConferenceCall
     * @api
     */
    public function createConferenceCall(?bool $muted = null, ?bool $videoStopped = null, ?bool $join = null, ?int $randomId = null, ?string $publicKey = null, ?string $block = null, ?array $params = null): ?AbstractUpdates
    {
        return $this->createConferenceCallAsync(muted: $muted, videoStopped: $videoStopped, join: $join, randomId: $randomId, publicKey: $publicKey, block: $block, params: $params)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<int> $ids
     * @param string $block
     * @param bool|null $onlyLeft
     * @param bool|null $kick
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.deleteConferenceCallParticipants
     * @api
     */
    public function deleteConferenceCallParticipantsAsync(AbstractInputGroupCall $call, array $ids, string $block, ?bool $onlyLeft = null, ?bool $kick = null): Future
    {
        return $this->client->call(new DeleteConferenceCallParticipantsRequest(call: $call, ids: $ids, block: $block, onlyLeft: $onlyLeft, kick: $kick));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<int> $ids
     * @param string $block
     * @param bool|null $onlyLeft
     * @param bool|null $kick
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.deleteConferenceCallParticipants
     * @api
     */
    public function deleteConferenceCallParticipants(AbstractInputGroupCall $call, array $ids, string $block, ?bool $onlyLeft = null, ?bool $kick = null): ?AbstractUpdates
    {
        return $this->deleteConferenceCallParticipantsAsync(call: $call, ids: $ids, block: $block, onlyLeft: $onlyLeft, kick: $kick)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param string $block
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.sendConferenceCallBroadcast
     * @api
     */
    public function sendConferenceCallBroadcastAsync(AbstractInputGroupCall $call, string $block): Future
    {
        return $this->client->call(new SendConferenceCallBroadcastRequest(call: $call, block: $block));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param string $block
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.sendConferenceCallBroadcast
     * @api
     */
    public function sendConferenceCallBroadcast(AbstractInputGroupCall $call, string $block): ?AbstractUpdates
    {
        return $this->sendConferenceCallBroadcastAsync(call: $call, block: $block)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $video
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.inviteConferenceCallParticipant
     * @api
     */
    public function inviteConferenceCallParticipantAsync(AbstractInputGroupCall $call, AbstractInputUser|string|int $userId, ?bool $video = null): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new InviteConferenceCallParticipantRequest(call: $call, userId: $userId, video: $video));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $video
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.inviteConferenceCallParticipant
     * @api
     */
    public function inviteConferenceCallParticipant(AbstractInputGroupCall $call, AbstractInputUser|string|int $userId, ?bool $video = null): ?AbstractUpdates
    {
        return $this->inviteConferenceCallParticipantAsync(call: $call, userId: $userId, video: $video)->await();
    }

    /**
     * @param int $msgId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.declineConferenceCallInvite
     * @api
     */
    public function declineConferenceCallInviteAsync(int $msgId): Future
    {
        return $this->client->call(new DeclineConferenceCallInviteRequest(msgId: $msgId));
    }

    /**
     * @param int $msgId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.declineConferenceCallInvite
     * @api
     */
    public function declineConferenceCallInvite(int $msgId): ?AbstractUpdates
    {
        return $this->declineConferenceCallInviteAsync(msgId: $msgId)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param int $subChainId
     * @param int $offset
     * @param int $limit
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.getGroupCallChainBlocks
     * @api
     */
    public function getGroupCallChainBlocksAsync(AbstractInputGroupCall $call, int $subChainId, int $offset, int $limit): Future
    {
        return $this->client->call(new GetGroupCallChainBlocksRequest(call: $call, subChainId: $subChainId, offset: $offset, limit: $limit));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param int $subChainId
     * @param int $offset
     * @param int $limit
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.getGroupCallChainBlocks
     * @api
     */
    public function getGroupCallChainBlocks(AbstractInputGroupCall $call, int $subChainId, int $offset, int $limit): ?AbstractUpdates
    {
        return $this->getGroupCallChainBlocksAsync(call: $call, subChainId: $subChainId, offset: $offset, limit: $limit)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param TextWithEntities $message
     * @param int|null $randomId
     * @param int|null $allowPaidStars
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.sendGroupCallMessage
     * @api
     */
    public function sendGroupCallMessageAsync(AbstractInputGroupCall $call, TextWithEntities $message, ?int $randomId = null, ?int $allowPaidStars = null, AbstractInputPeer|string|int|null $sendAs = null): Future
    {
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->call(new SendGroupCallMessageRequest(call: $call, message: $message, randomId: $randomId, allowPaidStars: $allowPaidStars, sendAs: $sendAs));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param TextWithEntities $message
     * @param int|null $randomId
     * @param int|null $allowPaidStars
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $sendAs
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.sendGroupCallMessage
     * @api
     */
    public function sendGroupCallMessage(AbstractInputGroupCall $call, TextWithEntities $message, ?int $randomId = null, ?int $allowPaidStars = null, AbstractInputPeer|string|int|null $sendAs = null): ?AbstractUpdates
    {
        return $this->sendGroupCallMessageAsync(call: $call, message: $message, randomId: $randomId, allowPaidStars: $allowPaidStars, sendAs: $sendAs)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param string $encryptedMessage
     * @return Future<bool>
     * @see https://core.telegram.org/method/phone.sendGroupCallEncryptedMessage
     * @api
     */
    public function sendGroupCallEncryptedMessageAsync(AbstractInputGroupCall $call, string $encryptedMessage): Future
    {
        return $this->client->call(new SendGroupCallEncryptedMessageRequest(call: $call, encryptedMessage: $encryptedMessage));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param string $encryptedMessage
     * @return bool
     * @see https://core.telegram.org/method/phone.sendGroupCallEncryptedMessage
     * @api
     */
    public function sendGroupCallEncryptedMessage(AbstractInputGroupCall $call, string $encryptedMessage): bool
    {
        return (bool) $this->sendGroupCallEncryptedMessageAsync(call: $call, encryptedMessage: $encryptedMessage)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<int> $messages
     * @param bool|null $reportSpam
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.deleteGroupCallMessages
     * @api
     */
    public function deleteGroupCallMessagesAsync(AbstractInputGroupCall $call, array $messages, ?bool $reportSpam = null): Future
    {
        return $this->client->call(new DeleteGroupCallMessagesRequest(call: $call, messages: $messages, reportSpam: $reportSpam));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param list<int> $messages
     * @param bool|null $reportSpam
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.deleteGroupCallMessages
     * @api
     */
    public function deleteGroupCallMessages(AbstractInputGroupCall $call, array $messages, ?bool $reportSpam = null): ?AbstractUpdates
    {
        return $this->deleteGroupCallMessagesAsync(call: $call, messages: $messages, reportSpam: $reportSpam)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @param bool|null $reportSpam
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/phone.deleteGroupCallParticipantMessages
     * @api
     */
    public function deleteGroupCallParticipantMessagesAsync(AbstractInputGroupCall $call, AbstractInputPeer|string|int $participant, ?bool $reportSpam = null): Future
    {
        if (is_string($participant) || is_int($participant)) {
            $participant = $this->client->peerManager->resolve($participant);
        }
        return $this->client->call(new DeleteGroupCallParticipantMessagesRequest(call: $call, participant: $participant, reportSpam: $reportSpam));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $participant
     * @param bool|null $reportSpam
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.deleteGroupCallParticipantMessages
     * @api
     */
    public function deleteGroupCallParticipantMessages(AbstractInputGroupCall $call, AbstractInputPeer|string|int $participant, ?bool $reportSpam = null): ?AbstractUpdates
    {
        return $this->deleteGroupCallParticipantMessagesAsync(call: $call, participant: $participant, reportSpam: $reportSpam)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return Future<GroupCallStars|null>
     * @see https://core.telegram.org/method/phone.getGroupCallStars
     * @api
     */
    public function getGroupCallStarsAsync(AbstractInputGroupCall $call): Future
    {
        return $this->client->call(new GetGroupCallStarsRequest(call: $call));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return GroupCallStars|null
     * @see https://core.telegram.org/method/phone.getGroupCallStars
     * @api
     */
    public function getGroupCallStars(AbstractInputGroupCall $call): ?GroupCallStars
    {
        return $this->getGroupCallStarsAsync(call: $call)->await();
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $sendAs
     * @return Future<bool>
     * @see https://core.telegram.org/method/phone.saveDefaultSendAs
     * @api
     */
    public function saveDefaultSendAsAsync(AbstractInputGroupCall $call, AbstractInputPeer|string|int $sendAs): Future
    {
        if (is_string($sendAs) || is_int($sendAs)) {
            $sendAs = $this->client->peerManager->resolve($sendAs);
        }
        return $this->client->call(new SaveDefaultSendAsRequest(call: $call, sendAs: $sendAs));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $sendAs
     * @return bool
     * @see https://core.telegram.org/method/phone.saveDefaultSendAs
     * @api
     */
    public function saveDefaultSendAs(AbstractInputGroupCall $call, AbstractInputPeer|string|int $sendAs): bool
    {
        return (bool) $this->saveDefaultSendAsAsync(call: $call, sendAs: $sendAs)->await();
    }
}