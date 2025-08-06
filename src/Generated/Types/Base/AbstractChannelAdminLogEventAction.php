<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ChannelAdminLogEventAction
 */
abstract class AbstractChannelAdminLogEventAction extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            ChannelAdminLogEventActionChangeTitle::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeTitle::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeAbout::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeAbout::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeUsername::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeUsername::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangePhoto::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangePhoto::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionToggleInvites::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleInvites::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionToggleSignatures::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleSignatures::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionUpdatePinned::CONSTRUCTOR_ID => ChannelAdminLogEventActionUpdatePinned::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionEditMessage::CONSTRUCTOR_ID => ChannelAdminLogEventActionEditMessage::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionDeleteMessage::CONSTRUCTOR_ID => ChannelAdminLogEventActionDeleteMessage::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantJoin::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantJoin::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantLeave::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantLeave::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantInvite::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantInvite::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantToggleBan::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantToggleBan::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantToggleAdmin::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantToggleAdmin::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeStickerSet::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeStickerSet::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionTogglePreHistoryHidden::CONSTRUCTOR_ID => ChannelAdminLogEventActionTogglePreHistoryHidden::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionDefaultBannedRights::CONSTRUCTOR_ID => ChannelAdminLogEventActionDefaultBannedRights::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionStopPoll::CONSTRUCTOR_ID => ChannelAdminLogEventActionStopPoll::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeLinkedChat::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeLinkedChat::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeLocation::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeLocation::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionToggleSlowMode::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleSlowMode::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionStartGroupCall::CONSTRUCTOR_ID => ChannelAdminLogEventActionStartGroupCall::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionDiscardGroupCall::CONSTRUCTOR_ID => ChannelAdminLogEventActionDiscardGroupCall::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantMute::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantMute::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantUnmute::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantUnmute::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionToggleGroupCallSetting::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleGroupCallSetting::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantJoinByInvite::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantJoinByInvite::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionExportedInviteDelete::CONSTRUCTOR_ID => ChannelAdminLogEventActionExportedInviteDelete::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionExportedInviteRevoke::CONSTRUCTOR_ID => ChannelAdminLogEventActionExportedInviteRevoke::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionExportedInviteEdit::CONSTRUCTOR_ID => ChannelAdminLogEventActionExportedInviteEdit::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantVolume::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantVolume::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeHistoryTTL::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeHistoryTTL::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantJoinByRequest::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantJoinByRequest::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionToggleNoForwards::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleNoForwards::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionSendMessage::CONSTRUCTOR_ID => ChannelAdminLogEventActionSendMessage::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeAvailableReactions::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeAvailableReactions::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeUsernames::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeUsernames::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionToggleForum::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleForum::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionCreateTopic::CONSTRUCTOR_ID => ChannelAdminLogEventActionCreateTopic::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionEditTopic::CONSTRUCTOR_ID => ChannelAdminLogEventActionEditTopic::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionDeleteTopic::CONSTRUCTOR_ID => ChannelAdminLogEventActionDeleteTopic::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionPinTopic::CONSTRUCTOR_ID => ChannelAdminLogEventActionPinTopic::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionToggleAntiSpam::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleAntiSpam::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangePeerColor::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangePeerColor::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeProfilePeerColor::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeProfilePeerColor::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeWallpaper::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeWallpaper::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeEmojiStatus::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeEmojiStatus::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionChangeEmojiStickerSet::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeEmojiStickerSet::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionToggleSignatureProfiles::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleSignatureProfiles::deserialize($deserializer, $stream),
            ChannelAdminLogEventActionParticipantSubExtend::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantSubExtend::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ChannelAdminLogEventAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}