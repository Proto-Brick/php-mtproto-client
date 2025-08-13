<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ChannelAdminLogEventAction
 */
abstract class AbstractChannelAdminLogEventAction extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            ChannelAdminLogEventActionChangeTitle::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeTitle::deserialize($stream),
            ChannelAdminLogEventActionChangeAbout::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeAbout::deserialize($stream),
            ChannelAdminLogEventActionChangeUsername::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeUsername::deserialize($stream),
            ChannelAdminLogEventActionChangePhoto::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangePhoto::deserialize($stream),
            ChannelAdminLogEventActionToggleInvites::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleInvites::deserialize($stream),
            ChannelAdminLogEventActionToggleSignatures::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleSignatures::deserialize($stream),
            ChannelAdminLogEventActionUpdatePinned::CONSTRUCTOR_ID => ChannelAdminLogEventActionUpdatePinned::deserialize($stream),
            ChannelAdminLogEventActionEditMessage::CONSTRUCTOR_ID => ChannelAdminLogEventActionEditMessage::deserialize($stream),
            ChannelAdminLogEventActionDeleteMessage::CONSTRUCTOR_ID => ChannelAdminLogEventActionDeleteMessage::deserialize($stream),
            ChannelAdminLogEventActionParticipantJoin::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantJoin::deserialize($stream),
            ChannelAdminLogEventActionParticipantLeave::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantLeave::deserialize($stream),
            ChannelAdminLogEventActionParticipantInvite::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantInvite::deserialize($stream),
            ChannelAdminLogEventActionParticipantToggleBan::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantToggleBan::deserialize($stream),
            ChannelAdminLogEventActionParticipantToggleAdmin::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantToggleAdmin::deserialize($stream),
            ChannelAdminLogEventActionChangeStickerSet::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeStickerSet::deserialize($stream),
            ChannelAdminLogEventActionTogglePreHistoryHidden::CONSTRUCTOR_ID => ChannelAdminLogEventActionTogglePreHistoryHidden::deserialize($stream),
            ChannelAdminLogEventActionDefaultBannedRights::CONSTRUCTOR_ID => ChannelAdminLogEventActionDefaultBannedRights::deserialize($stream),
            ChannelAdminLogEventActionStopPoll::CONSTRUCTOR_ID => ChannelAdminLogEventActionStopPoll::deserialize($stream),
            ChannelAdminLogEventActionChangeLinkedChat::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeLinkedChat::deserialize($stream),
            ChannelAdminLogEventActionChangeLocation::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeLocation::deserialize($stream),
            ChannelAdminLogEventActionToggleSlowMode::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleSlowMode::deserialize($stream),
            ChannelAdminLogEventActionStartGroupCall::CONSTRUCTOR_ID => ChannelAdminLogEventActionStartGroupCall::deserialize($stream),
            ChannelAdminLogEventActionDiscardGroupCall::CONSTRUCTOR_ID => ChannelAdminLogEventActionDiscardGroupCall::deserialize($stream),
            ChannelAdminLogEventActionParticipantMute::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantMute::deserialize($stream),
            ChannelAdminLogEventActionParticipantUnmute::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantUnmute::deserialize($stream),
            ChannelAdminLogEventActionToggleGroupCallSetting::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleGroupCallSetting::deserialize($stream),
            ChannelAdminLogEventActionParticipantJoinByInvite::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantJoinByInvite::deserialize($stream),
            ChannelAdminLogEventActionExportedInviteDelete::CONSTRUCTOR_ID => ChannelAdminLogEventActionExportedInviteDelete::deserialize($stream),
            ChannelAdminLogEventActionExportedInviteRevoke::CONSTRUCTOR_ID => ChannelAdminLogEventActionExportedInviteRevoke::deserialize($stream),
            ChannelAdminLogEventActionExportedInviteEdit::CONSTRUCTOR_ID => ChannelAdminLogEventActionExportedInviteEdit::deserialize($stream),
            ChannelAdminLogEventActionParticipantVolume::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantVolume::deserialize($stream),
            ChannelAdminLogEventActionChangeHistoryTTL::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeHistoryTTL::deserialize($stream),
            ChannelAdminLogEventActionParticipantJoinByRequest::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantJoinByRequest::deserialize($stream),
            ChannelAdminLogEventActionToggleNoForwards::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleNoForwards::deserialize($stream),
            ChannelAdminLogEventActionSendMessage::CONSTRUCTOR_ID => ChannelAdminLogEventActionSendMessage::deserialize($stream),
            ChannelAdminLogEventActionChangeAvailableReactions::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeAvailableReactions::deserialize($stream),
            ChannelAdminLogEventActionChangeUsernames::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeUsernames::deserialize($stream),
            ChannelAdminLogEventActionToggleForum::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleForum::deserialize($stream),
            ChannelAdminLogEventActionCreateTopic::CONSTRUCTOR_ID => ChannelAdminLogEventActionCreateTopic::deserialize($stream),
            ChannelAdminLogEventActionEditTopic::CONSTRUCTOR_ID => ChannelAdminLogEventActionEditTopic::deserialize($stream),
            ChannelAdminLogEventActionDeleteTopic::CONSTRUCTOR_ID => ChannelAdminLogEventActionDeleteTopic::deserialize($stream),
            ChannelAdminLogEventActionPinTopic::CONSTRUCTOR_ID => ChannelAdminLogEventActionPinTopic::deserialize($stream),
            ChannelAdminLogEventActionToggleAntiSpam::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleAntiSpam::deserialize($stream),
            ChannelAdminLogEventActionChangePeerColor::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangePeerColor::deserialize($stream),
            ChannelAdminLogEventActionChangeProfilePeerColor::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeProfilePeerColor::deserialize($stream),
            ChannelAdminLogEventActionChangeWallpaper::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeWallpaper::deserialize($stream),
            ChannelAdminLogEventActionChangeEmojiStatus::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeEmojiStatus::deserialize($stream),
            ChannelAdminLogEventActionChangeEmojiStickerSet::CONSTRUCTOR_ID => ChannelAdminLogEventActionChangeEmojiStickerSet::deserialize($stream),
            ChannelAdminLogEventActionToggleSignatureProfiles::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleSignatureProfiles::deserialize($stream),
            ChannelAdminLogEventActionParticipantSubExtend::CONSTRUCTOR_ID => ChannelAdminLogEventActionParticipantSubExtend::deserialize($stream),
            ChannelAdminLogEventActionToggleAutotranslation::CONSTRUCTOR_ID => ChannelAdminLogEventActionToggleAutotranslation::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ChannelAdminLogEventAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}