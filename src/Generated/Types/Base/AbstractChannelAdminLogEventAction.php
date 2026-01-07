<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/ChannelAdminLogEventAction
 */
abstract class AbstractChannelAdminLogEventAction extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xe6dfb825 => ChannelAdminLogEventActionChangeTitle::deserialize($__payload, $__offset),
            0x55188a2e => ChannelAdminLogEventActionChangeAbout::deserialize($__payload, $__offset),
            0x6a4afc38 => ChannelAdminLogEventActionChangeUsername::deserialize($__payload, $__offset),
            0x434bd2af => ChannelAdminLogEventActionChangePhoto::deserialize($__payload, $__offset),
            0x1b7907ae => ChannelAdminLogEventActionToggleInvites::deserialize($__payload, $__offset),
            0x26ae0971 => ChannelAdminLogEventActionToggleSignatures::deserialize($__payload, $__offset),
            0xe9e82c18 => ChannelAdminLogEventActionUpdatePinned::deserialize($__payload, $__offset),
            0x709b2405 => ChannelAdminLogEventActionEditMessage::deserialize($__payload, $__offset),
            0x42e047bb => ChannelAdminLogEventActionDeleteMessage::deserialize($__payload, $__offset),
            0x183040d3 => ChannelAdminLogEventActionParticipantJoin::deserialize($__payload, $__offset),
            0xf89777f2 => ChannelAdminLogEventActionParticipantLeave::deserialize($__payload, $__offset),
            0xe31c34d8 => ChannelAdminLogEventActionParticipantInvite::deserialize($__payload, $__offset),
            0xe6d83d7e => ChannelAdminLogEventActionParticipantToggleBan::deserialize($__payload, $__offset),
            0xd5676710 => ChannelAdminLogEventActionParticipantToggleAdmin::deserialize($__payload, $__offset),
            0xb1c3caa7 => ChannelAdminLogEventActionChangeStickerSet::deserialize($__payload, $__offset),
            0x5f5c95f1 => ChannelAdminLogEventActionTogglePreHistoryHidden::deserialize($__payload, $__offset),
            0x2df5fc0a => ChannelAdminLogEventActionDefaultBannedRights::deserialize($__payload, $__offset),
            0x8f079643 => ChannelAdminLogEventActionStopPoll::deserialize($__payload, $__offset),
            0x50c7ac8 => ChannelAdminLogEventActionChangeLinkedChat::deserialize($__payload, $__offset),
            0xe6b76ae => ChannelAdminLogEventActionChangeLocation::deserialize($__payload, $__offset),
            0x53909779 => ChannelAdminLogEventActionToggleSlowMode::deserialize($__payload, $__offset),
            0x23209745 => ChannelAdminLogEventActionStartGroupCall::deserialize($__payload, $__offset),
            0xdb9f9140 => ChannelAdminLogEventActionDiscardGroupCall::deserialize($__payload, $__offset),
            0xf92424d2 => ChannelAdminLogEventActionParticipantMute::deserialize($__payload, $__offset),
            0xe64429c0 => ChannelAdminLogEventActionParticipantUnmute::deserialize($__payload, $__offset),
            0x56d6a247 => ChannelAdminLogEventActionToggleGroupCallSetting::deserialize($__payload, $__offset),
            0xfe9fc158 => ChannelAdminLogEventActionParticipantJoinByInvite::deserialize($__payload, $__offset),
            0x5a50fca4 => ChannelAdminLogEventActionExportedInviteDelete::deserialize($__payload, $__offset),
            0x410a134e => ChannelAdminLogEventActionExportedInviteRevoke::deserialize($__payload, $__offset),
            0xe90ebb59 => ChannelAdminLogEventActionExportedInviteEdit::deserialize($__payload, $__offset),
            0x3e7f6847 => ChannelAdminLogEventActionParticipantVolume::deserialize($__payload, $__offset),
            0x6e941a38 => ChannelAdminLogEventActionChangeHistoryTTL::deserialize($__payload, $__offset),
            0xafb6144a => ChannelAdminLogEventActionParticipantJoinByRequest::deserialize($__payload, $__offset),
            0xcb2ac766 => ChannelAdminLogEventActionToggleNoForwards::deserialize($__payload, $__offset),
            0x278f2868 => ChannelAdminLogEventActionSendMessage::deserialize($__payload, $__offset),
            0xbe4e0ef8 => ChannelAdminLogEventActionChangeAvailableReactions::deserialize($__payload, $__offset),
            0xf04fb3a9 => ChannelAdminLogEventActionChangeUsernames::deserialize($__payload, $__offset),
            0x2cc6383 => ChannelAdminLogEventActionToggleForum::deserialize($__payload, $__offset),
            0x58707d28 => ChannelAdminLogEventActionCreateTopic::deserialize($__payload, $__offset),
            0xf06fe208 => ChannelAdminLogEventActionEditTopic::deserialize($__payload, $__offset),
            0xae168909 => ChannelAdminLogEventActionDeleteTopic::deserialize($__payload, $__offset),
            0x5d8d353b => ChannelAdminLogEventActionPinTopic::deserialize($__payload, $__offset),
            0x64f36dfc => ChannelAdminLogEventActionToggleAntiSpam::deserialize($__payload, $__offset),
            0x5796e780 => ChannelAdminLogEventActionChangePeerColor::deserialize($__payload, $__offset),
            0x5e477b25 => ChannelAdminLogEventActionChangeProfilePeerColor::deserialize($__payload, $__offset),
            0x31bb5d52 => ChannelAdminLogEventActionChangeWallpaper::deserialize($__payload, $__offset),
            0x3ea9feb1 => ChannelAdminLogEventActionChangeEmojiStatus::deserialize($__payload, $__offset),
            0x46d840ab => ChannelAdminLogEventActionChangeEmojiStickerSet::deserialize($__payload, $__offset),
            0x60a79c79 => ChannelAdminLogEventActionToggleSignatureProfiles::deserialize($__payload, $__offset),
            0x64642db3 => ChannelAdminLogEventActionParticipantSubExtend::deserialize($__payload, $__offset),
            0xc517f77e => ChannelAdminLogEventActionToggleAutotranslation::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type ChannelAdminLogEventAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}