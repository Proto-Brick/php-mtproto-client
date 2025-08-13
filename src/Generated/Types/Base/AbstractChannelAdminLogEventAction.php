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
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xe6dfb825 => ChannelAdminLogEventActionChangeTitle::deserialize($stream),
            0x55188a2e => ChannelAdminLogEventActionChangeAbout::deserialize($stream),
            0x6a4afc38 => ChannelAdminLogEventActionChangeUsername::deserialize($stream),
            0x434bd2af => ChannelAdminLogEventActionChangePhoto::deserialize($stream),
            0x1b7907ae => ChannelAdminLogEventActionToggleInvites::deserialize($stream),
            0x26ae0971 => ChannelAdminLogEventActionToggleSignatures::deserialize($stream),
            0xe9e82c18 => ChannelAdminLogEventActionUpdatePinned::deserialize($stream),
            0x709b2405 => ChannelAdminLogEventActionEditMessage::deserialize($stream),
            0x42e047bb => ChannelAdminLogEventActionDeleteMessage::deserialize($stream),
            0x183040d3 => ChannelAdminLogEventActionParticipantJoin::deserialize($stream),
            0xf89777f2 => ChannelAdminLogEventActionParticipantLeave::deserialize($stream),
            0xe31c34d8 => ChannelAdminLogEventActionParticipantInvite::deserialize($stream),
            0xe6d83d7e => ChannelAdminLogEventActionParticipantToggleBan::deserialize($stream),
            0xd5676710 => ChannelAdminLogEventActionParticipantToggleAdmin::deserialize($stream),
            0xb1c3caa7 => ChannelAdminLogEventActionChangeStickerSet::deserialize($stream),
            0x5f5c95f1 => ChannelAdminLogEventActionTogglePreHistoryHidden::deserialize($stream),
            0x2df5fc0a => ChannelAdminLogEventActionDefaultBannedRights::deserialize($stream),
            0x8f079643 => ChannelAdminLogEventActionStopPoll::deserialize($stream),
            0x50c7ac8 => ChannelAdminLogEventActionChangeLinkedChat::deserialize($stream),
            0xe6b76ae => ChannelAdminLogEventActionChangeLocation::deserialize($stream),
            0x53909779 => ChannelAdminLogEventActionToggleSlowMode::deserialize($stream),
            0x23209745 => ChannelAdminLogEventActionStartGroupCall::deserialize($stream),
            0xdb9f9140 => ChannelAdminLogEventActionDiscardGroupCall::deserialize($stream),
            0xf92424d2 => ChannelAdminLogEventActionParticipantMute::deserialize($stream),
            0xe64429c0 => ChannelAdminLogEventActionParticipantUnmute::deserialize($stream),
            0x56d6a247 => ChannelAdminLogEventActionToggleGroupCallSetting::deserialize($stream),
            0xfe9fc158 => ChannelAdminLogEventActionParticipantJoinByInvite::deserialize($stream),
            0x5a50fca4 => ChannelAdminLogEventActionExportedInviteDelete::deserialize($stream),
            0x410a134e => ChannelAdminLogEventActionExportedInviteRevoke::deserialize($stream),
            0xe90ebb59 => ChannelAdminLogEventActionExportedInviteEdit::deserialize($stream),
            0x3e7f6847 => ChannelAdminLogEventActionParticipantVolume::deserialize($stream),
            0x6e941a38 => ChannelAdminLogEventActionChangeHistoryTTL::deserialize($stream),
            0xafb6144a => ChannelAdminLogEventActionParticipantJoinByRequest::deserialize($stream),
            0xcb2ac766 => ChannelAdminLogEventActionToggleNoForwards::deserialize($stream),
            0x278f2868 => ChannelAdminLogEventActionSendMessage::deserialize($stream),
            0xbe4e0ef8 => ChannelAdminLogEventActionChangeAvailableReactions::deserialize($stream),
            0xf04fb3a9 => ChannelAdminLogEventActionChangeUsernames::deserialize($stream),
            0x2cc6383 => ChannelAdminLogEventActionToggleForum::deserialize($stream),
            0x58707d28 => ChannelAdminLogEventActionCreateTopic::deserialize($stream),
            0xf06fe208 => ChannelAdminLogEventActionEditTopic::deserialize($stream),
            0xae168909 => ChannelAdminLogEventActionDeleteTopic::deserialize($stream),
            0x5d8d353b => ChannelAdminLogEventActionPinTopic::deserialize($stream),
            0x64f36dfc => ChannelAdminLogEventActionToggleAntiSpam::deserialize($stream),
            0x5796e780 => ChannelAdminLogEventActionChangePeerColor::deserialize($stream),
            0x5e477b25 => ChannelAdminLogEventActionChangeProfilePeerColor::deserialize($stream),
            0x31bb5d52 => ChannelAdminLogEventActionChangeWallpaper::deserialize($stream),
            0x3ea9feb1 => ChannelAdminLogEventActionChangeEmojiStatus::deserialize($stream),
            0x46d840ab => ChannelAdminLogEventActionChangeEmojiStickerSet::deserialize($stream),
            0x60a79c79 => ChannelAdminLogEventActionToggleSignatureProfiles::deserialize($stream),
            0x64642db3 => ChannelAdminLogEventActionParticipantSubExtend::deserialize($stream),
            0xc517f77e => ChannelAdminLogEventActionToggleAutotranslation::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type ChannelAdminLogEventAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}