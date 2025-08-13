<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\AcceptCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\CheckGroupCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\ConfirmCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\CreateConferenceCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\CreateGroupCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\DeclineConferenceCallInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\DeleteConferenceCallParticipantsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\DiscardCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\DiscardGroupCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\EditGroupCallParticipantRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\EditGroupCallTitleRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\ExportGroupCallInviteRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\GetCallConfigRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\GetGroupCallChainBlocksRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\GetGroupCallJoinAsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\GetGroupCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\GetGroupCallStreamChannelsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\GetGroupCallStreamRtmpUrlRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\GetGroupParticipantsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\InviteConferenceCallParticipantRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\InviteToGroupCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\JoinGroupCallPresentationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\JoinGroupCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\LeaveGroupCallPresentationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\LeaveGroupCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\ReceivedCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\RequestCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\SaveCallDebugRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\SaveCallLogRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\SaveDefaultGroupCallJoinAsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\SendConferenceCallBroadcastRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\SendSignalingDataRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\SetCallRatingRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\StartScheduledGroupCallRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\ToggleGroupCallRecordRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\ToggleGroupCallSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Phone\ToggleGroupCallStartSubscriptionRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPhoneCallDiscardReason;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileBig;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileStoryDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCallInviteMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCallSlug;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallDiscardReasonBusy;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallDiscardReasonDisconnect;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallDiscardReasonHangup;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallDiscardReasonMigrateConferenceCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallDiscardReasonMissed;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallProtocol;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Phone\ExportedGroupCallInvite;
use DigitalStars\MtprotoClient\Generated\Types\Phone\GroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Phone\GroupCallStreamChannels;
use DigitalStars\MtprotoClient\Generated\Types\Phone\GroupCallStreamRtmpUrl;
use DigitalStars\MtprotoClient\Generated\Types\Phone\GroupParticipants;
use DigitalStars\MtprotoClient\Generated\Types\Phone\JoinAsPeers;
use DigitalStars\MtprotoClient\Generated\Types\Phone\PhoneCall;


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
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $randomId
     * @param string $gAHash
     * @param PhoneCallProtocol $protocol
     * @param bool|null $video
     * @return PhoneCall|null
     * @see https://core.telegram.org/method/phone.requestCall
     * @api
     */
    public function requestCall(AbstractInputUser $userId, int $randomId, string $gAHash, PhoneCallProtocol $protocol, ?bool $video = null): ?PhoneCall
    {
        return $this->client->callSync(new RequestCallRequest($userId, $randomId, $gAHash, $protocol, $video));
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
        return $this->client->callSync(new AcceptCallRequest($peer, $gB, $protocol));
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
        return $this->client->callSync(new ConfirmCallRequest($peer, $gA, $keyFingerprint, $protocol));
    }

    /**
     * @param InputPhoneCall $peer
     * @return bool
     * @see https://core.telegram.org/method/phone.receivedCall
     * @api
     */
    public function receivedCall(InputPhoneCall $peer): bool
    {
        return (bool) $this->client->callSync(new ReceivedCallRequest($peer));
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
        return $this->client->callSync(new DiscardCallRequest($peer, $duration, $reason, $connectionId, $video));
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
        return $this->client->callSync(new SetCallRatingRequest($peer, $rating, $comment, $userInitiative));
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
        return (bool) $this->client->callSync(new SaveCallDebugRequest($peer, $debug));
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
        return (bool) $this->client->callSync(new SendSignalingDataRequest($peer, $data));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $randomId
     * @param bool|null $rtmpStream
     * @param string|null $title
     * @param int|null $scheduleDate
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.createGroupCall
     * @api
     */
    public function createGroupCall(AbstractInputPeer $peer, int $randomId, ?bool $rtmpStream = null, ?string $title = null, ?int $scheduleDate = null): ?AbstractUpdates
    {
        return $this->client->callSync(new CreateGroupCallRequest($peer, $randomId, $rtmpStream, $title, $scheduleDate));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $joinAs
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
    public function joinGroupCall(AbstractInputGroupCall $call, AbstractInputPeer $joinAs, array $params, ?bool $muted = null, ?bool $videoStopped = null, ?string $inviteHash = null, ?string $publicKey = null, ?string $block = null): ?AbstractUpdates
    {
        return $this->client->callSync(new JoinGroupCallRequest($call, $joinAs, $params, $muted, $videoStopped, $inviteHash, $publicKey, $block));
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
        return $this->client->callSync(new LeaveGroupCallRequest($call, $source));
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
        return $this->client->callSync(new InviteToGroupCallRequest($call, $users));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.discardGroupCall
     * @api
     */
    public function discardGroupCall(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->client->callSync(new DiscardGroupCallRequest($call));
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
        return $this->client->callSync(new ToggleGroupCallSettingsRequest($call, $resetInviteHash, $joinMuted));
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
        return $this->client->callSync(new GetGroupCallRequest($call, $limit));
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
        return $this->client->callSync(new GetGroupParticipantsRequest($call, $ids, $sources, $offset, $limit));
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
        return $this->client->callSync(new CheckGroupCallRequest($call, $sources));
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
        return $this->client->callSync(new ToggleGroupCallRecordRequest($call, $start, $video, $title, $videoPortrait));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $participant
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
    public function editGroupCallParticipant(AbstractInputGroupCall $call, AbstractInputPeer $participant, ?bool $muted = null, ?int $volume = null, ?bool $raiseHand = null, ?bool $videoStopped = null, ?bool $videoPaused = null, ?bool $presentationPaused = null): ?AbstractUpdates
    {
        return $this->client->callSync(new EditGroupCallParticipantRequest($call, $participant, $muted, $volume, $raiseHand, $videoStopped, $videoPaused, $presentationPaused));
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
        return $this->client->callSync(new EditGroupCallTitleRequest($call, $title));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return JoinAsPeers|null
     * @see https://core.telegram.org/method/phone.getGroupCallJoinAs
     * @api
     */
    public function getGroupCallJoinAs(AbstractInputPeer $peer): ?JoinAsPeers
    {
        return $this->client->callSync(new GetGroupCallJoinAsRequest($peer));
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
        return $this->client->callSync(new ExportGroupCallInviteRequest($call, $canSelfUnmute));
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
        return $this->client->callSync(new ToggleGroupCallStartSubscriptionRequest($call, $subscribed));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.startScheduledGroupCall
     * @api
     */
    public function startScheduledGroupCall(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->client->callSync(new StartScheduledGroupCallRequest($call));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $joinAs
     * @return bool
     * @see https://core.telegram.org/method/phone.saveDefaultGroupCallJoinAs
     * @api
     */
    public function saveDefaultGroupCallJoinAs(AbstractInputPeer $peer, AbstractInputPeer $joinAs): bool
    {
        return (bool) $this->client->callSync(new SaveDefaultGroupCallJoinAsRequest($peer, $joinAs));
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
        return $this->client->callSync(new JoinGroupCallPresentationRequest($call, $params));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.leaveGroupCallPresentation
     * @api
     */
    public function leaveGroupCallPresentation(AbstractInputGroupCall $call): ?AbstractUpdates
    {
        return $this->client->callSync(new LeaveGroupCallPresentationRequest($call));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @return GroupCallStreamChannels|null
     * @see https://core.telegram.org/method/phone.getGroupCallStreamChannels
     * @api
     */
    public function getGroupCallStreamChannels(AbstractInputGroupCall $call): ?GroupCallStreamChannels
    {
        return $this->client->callSync(new GetGroupCallStreamChannelsRequest($call));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool $revoke
     * @return GroupCallStreamRtmpUrl|null
     * @see https://core.telegram.org/method/phone.getGroupCallStreamRtmpUrl
     * @api
     */
    public function getGroupCallStreamRtmpUrl(AbstractInputPeer $peer, bool $revoke): ?GroupCallStreamRtmpUrl
    {
        return $this->client->callSync(new GetGroupCallStreamRtmpUrlRequest($peer, $revoke));
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
        return (bool) $this->client->callSync(new SaveCallLogRequest($peer, $file));
    }

    /**
     * @param int $randomId
     * @param bool|null $muted
     * @param bool|null $videoStopped
     * @param bool|null $join
     * @param string|null $publicKey
     * @param string|null $block
     * @param array|null $params
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.createConferenceCall
     * @api
     */
    public function createConferenceCall(int $randomId, ?bool $muted = null, ?bool $videoStopped = null, ?bool $join = null, ?string $publicKey = null, ?string $block = null, ?array $params = null): ?AbstractUpdates
    {
        return $this->client->callSync(new CreateConferenceCallRequest($randomId, $muted, $videoStopped, $join, $publicKey, $block, $params));
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
        return $this->client->callSync(new DeleteConferenceCallParticipantsRequest($call, $ids, $block, $onlyLeft, $kick));
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
        return $this->client->callSync(new SendConferenceCallBroadcastRequest($call, $block));
    }

    /**
     * @param InputGroupCall|InputGroupCallSlug|InputGroupCallInviteMessage $call
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param bool|null $video
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.inviteConferenceCallParticipant
     * @api
     */
    public function inviteConferenceCallParticipant(AbstractInputGroupCall $call, AbstractInputUser $userId, ?bool $video = null): ?AbstractUpdates
    {
        return $this->client->callSync(new InviteConferenceCallParticipantRequest($call, $userId, $video));
    }

    /**
     * @param int $msgId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/phone.declineConferenceCallInvite
     * @api
     */
    public function declineConferenceCallInvite(int $msgId): ?AbstractUpdates
    {
        return $this->client->callSync(new DeclineConferenceCallInviteRequest($msgId));
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
        return $this->client->callSync(new GetGroupCallChainBlocksRequest($call, $subChainId, $offset, $limit));
    }
}