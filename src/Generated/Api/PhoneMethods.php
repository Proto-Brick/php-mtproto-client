<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\AcceptCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\CheckGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\ConfirmCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\CreateConferenceCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\CreateGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DeclineConferenceCallInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DeleteConferenceCallParticipantsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DiscardCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\DiscardGroupCallRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\EditGroupCallParticipantRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\EditGroupCallTitleRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\ExportGroupCallInviteRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetCallConfigRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallChainBlocksRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallJoinAsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\GetGroupCallRequest;
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
use ProtoBrick\MTProtoClient\Generated\Methods\Phone\SendConferenceCallBroadcastRequest;
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
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\ExportedGroupCallInvite;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupCall;
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
     * @return array
     * @see https://core.telegram.org/method/phone.getCallConfig
     * @api
     */
    public function getCallConfig(): array
    {
        return $this->client->callSync(new GetCallConfigRequest());
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
        return $this->client->callSync(new RequestCallRequest(userId: $userId, gAHash: $gAHash, protocol: $protocol, video: $video, randomId: $randomId));
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
        return $this->client->callSync(new AcceptCallRequest(peer: $peer, gB: $gB, protocol: $protocol));
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
        return $this->client->callSync(new ConfirmCallRequest(peer: $peer, gA: $gA, keyFingerprint: $keyFingerprint, protocol: $protocol));
    }

    /**
     * @param InputPhoneCall $peer
     * @return bool
     * @see https://core.telegram.org/method/phone.receivedCall
     * @api
     */
    public function receivedCall(InputPhoneCall $peer): bool
    {
        return (bool) $this->client->callSync(new ReceivedCallRequest(peer: $peer));
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
        return $this->client->callSync(new DiscardCallRequest(peer: $peer, duration: $duration, reason: $reason, connectionId: $connectionId, video: $video));
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
        return $this->client->callSync(new SetCallRatingRequest(peer: $peer, rating: $rating, comment: $comment, userInitiative: $userInitiative));
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
        return (bool) $this->client->callSync(new SaveCallDebugRequest(peer: $peer, debug: $debug));
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
        return (bool) $this->client->callSync(new SendSignalingDataRequest(peer: $peer, data: $data));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->callSync(new CreateGroupCallRequest(peer: $peer, rtmpStream: $rtmpStream, randomId: $randomId, title: $title, scheduleDate: $scheduleDate));
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
        if (is_string($joinAs) || is_int($joinAs)) {
            $joinAs = $this->client->peerManager->resolve($joinAs);
        }
        return $this->client->callSync(new JoinGroupCallRequest(call: $call, joinAs: $joinAs, params: $params, muted: $muted, videoStopped: $videoStopped, inviteHash: $inviteHash, publicKey: $publicKey, block: $block));
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
        return $this->client->callSync(new LeaveGroupCallRequest(call: $call, source: $source));
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
        return $this->client->callSync(new InviteToGroupCallRequest(call: $call, users: $users));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.discardGroupCall
     * @api
     */
    public function discardGroupCall(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->client->callSync(new DiscardGroupCallRequest(call: $call));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param bool|null $resetInviteHash
     * @param bool|null $joinMuted
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.toggleGroupCallSettings
     * @api
     */
    public function toggleGroupCallSettings(AbstractInputGroupCall $call, ?bool $resetInviteHash = null, ?bool $joinMuted = null): ?AbstractUpdates
    {
        return $this->client->callSync(new ToggleGroupCallSettingsRequest(call: $call, resetInviteHash: $resetInviteHash, joinMuted: $joinMuted));
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
        return $this->client->callSync(new GetGroupCallRequest(call: $call, limit: $limit));
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
        return $this->client->callSync(new GetGroupParticipantsRequest(call: $call, ids: $ids, sources: $sources, offset: $offset, limit: $limit));
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
        return $this->client->callSync(new CheckGroupCallRequest(call: $call, sources: $sources));
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
        return $this->client->callSync(new ToggleGroupCallRecordRequest(call: $call, start: $start, video: $video, title: $title, videoPortrait: $videoPortrait));
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
        if (is_string($participant) || is_int($participant)) {
            $participant = $this->client->peerManager->resolve($participant);
        }
        return $this->client->callSync(new EditGroupCallParticipantRequest(call: $call, participant: $participant, muted: $muted, volume: $volume, raiseHand: $raiseHand, videoStopped: $videoStopped, videoPaused: $videoPaused, presentationPaused: $presentationPaused));
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
        return $this->client->callSync(new EditGroupCallTitleRequest(call: $call, title: $title));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return JoinAsPeers|null
     * @see https://core.telegram.org/method/phone.getGroupCallJoinAs
     * @api
     */
    public function getGroupCallJoinAs(AbstractInputPeer|string|int $peer): ?JoinAsPeers
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetGroupCallJoinAsRequest(peer: $peer));
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
        return $this->client->callSync(new ExportGroupCallInviteRequest(call: $call, canSelfUnmute: $canSelfUnmute));
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
        return $this->client->callSync(new ToggleGroupCallStartSubscriptionRequest(call: $call, subscribed: $subscribed));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.startScheduledGroupCall
     * @api
     */
    public function startScheduledGroupCall(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->client->callSync(new StartScheduledGroupCallRequest(call: $call));
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
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($joinAs) || is_int($joinAs)) {
            $joinAs = $this->client->peerManager->resolve($joinAs);
        }
        return (bool) $this->client->callSync(new SaveDefaultGroupCallJoinAsRequest(peer: $peer, joinAs: $joinAs));
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
        return $this->client->callSync(new JoinGroupCallPresentationRequest(call: $call, params: $params));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.leaveGroupCallPresentation
     * @api
     */
    public function leaveGroupCallPresentation(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->client->callSync(new LeaveGroupCallPresentationRequest(call: $call));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return GroupCallStreamChannels|null
     * @see https://core.telegram.org/method/phone.getGroupCallStreamChannels
     * @api
     */
    public function getGroupCallStreamChannels(AbstractInputGroupCall $call): ?GroupCallStreamChannels
    {
        return $this->client->callSync(new GetGroupCallStreamChannelsRequest(call: $call));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool $revoke
     * @return GroupCallStreamRtmpUrl|null
     * @see https://core.telegram.org/method/phone.getGroupCallStreamRtmpUrl
     * @api
     */
    public function getGroupCallStreamRtmpUrl(AbstractInputPeer|string|int $peer, bool $revoke): ?GroupCallStreamRtmpUrl
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetGroupCallStreamRtmpUrlRequest(peer: $peer, revoke: $revoke));
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
        return (bool) $this->client->callSync(new SaveCallLogRequest(peer: $peer, file: $file));
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
        if ($randomId === null) {
            $randomId = random_int(0, 9223372036854775807);
        }
        return $this->client->callSync(new CreateConferenceCallRequest(muted: $muted, videoStopped: $videoStopped, join: $join, randomId: $randomId, publicKey: $publicKey, block: $block, params: $params));
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
        return $this->client->callSync(new DeleteConferenceCallParticipantsRequest(call: $call, ids: $ids, block: $block, onlyLeft: $onlyLeft, kick: $kick));
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
        return $this->client->callSync(new SendConferenceCallBroadcastRequest(call: $call, block: $block));
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
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->callSync(new InviteConferenceCallParticipantRequest(call: $call, userId: $userId, video: $video));
    }

    /**
     * @param int $msgId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.declineConferenceCallInvite
     * @api
     */
    public function declineConferenceCallInvite(int $msgId): ?AbstractUpdates
    {
        return $this->client->callSync(new DeclineConferenceCallInviteRequest(msgId: $msgId));
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
        return $this->client->callSync(new GetGroupCallChainBlocksRequest(call: $call, subChainId: $subChainId, offset: $offset, limit: $limit));
    }
}