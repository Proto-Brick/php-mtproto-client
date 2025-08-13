<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/MessageAction
 */
abstract class AbstractMessageAction extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xb6aef7b0 => MessageActionEmpty::deserialize($stream),
            0xbd47cbad => MessageActionChatCreate::deserialize($stream),
            0xb5a1ce5a => MessageActionChatEditTitle::deserialize($stream),
            0x7fcb13a8 => MessageActionChatEditPhoto::deserialize($stream),
            0x95e3fbef => MessageActionChatDeletePhoto::deserialize($stream),
            0x15cefd00 => MessageActionChatAddUser::deserialize($stream),
            0xa43f30cc => MessageActionChatDeleteUser::deserialize($stream),
            0x31224c3 => MessageActionChatJoinedByLink::deserialize($stream),
            0x95d2ac92 => MessageActionChannelCreate::deserialize($stream),
            0xe1037f92 => MessageActionChatMigrateTo::deserialize($stream),
            0xea3948e9 => MessageActionChannelMigrateFrom::deserialize($stream),
            0x94bd38ed => MessageActionPinMessage::deserialize($stream),
            0x9fbab604 => MessageActionHistoryClear::deserialize($stream),
            0x92a72876 => MessageActionGameScore::deserialize($stream),
            0xffa00ccc => MessageActionPaymentSentMe::deserialize($stream),
            0xc624b16e => MessageActionPaymentSent::deserialize($stream),
            0x80e11a7f => MessageActionPhoneCall::deserialize($stream),
            0x4792929b => MessageActionScreenshotTaken::deserialize($stream),
            0xfae69f56 => MessageActionCustomAction::deserialize($stream),
            0xc516d679 => MessageActionBotAllowed::deserialize($stream),
            0x1b287353 => MessageActionSecureValuesSentMe::deserialize($stream),
            0xd95c6154 => MessageActionSecureValuesSent::deserialize($stream),
            0xf3f25f76 => MessageActionContactSignUp::deserialize($stream),
            0x98e0d697 => MessageActionGeoProximityReached::deserialize($stream),
            0x7a0d7f42 => MessageActionGroupCall::deserialize($stream),
            0x502f92f7 => MessageActionInviteToGroupCall::deserialize($stream),
            0x3c134d7b => MessageActionSetMessagesTTL::deserialize($stream),
            0xb3a07661 => MessageActionGroupCallScheduled::deserialize($stream),
            0xaa786345 => MessageActionSetChatTheme::deserialize($stream),
            0xebbca3cb => MessageActionChatJoinedByRequest::deserialize($stream),
            0x47dd8079 => MessageActionWebViewDataSentMe::deserialize($stream),
            0xb4c38cb5 => MessageActionWebViewDataSent::deserialize($stream),
            0x6c6274fa => MessageActionGiftPremium::deserialize($stream),
            0xd999256 => MessageActionTopicCreate::deserialize($stream),
            0xc0944820 => MessageActionTopicEdit::deserialize($stream),
            0x57de635e => MessageActionSuggestProfilePhoto::deserialize($stream),
            0x31518e9b => MessageActionRequestedPeer::deserialize($stream),
            0x5060a3f4 => MessageActionSetChatWallPaper::deserialize($stream),
            0x56d03994 => MessageActionGiftCode::deserialize($stream),
            0xa80f51e4 => MessageActionGiveawayLaunch::deserialize($stream),
            0x87e2f155 => MessageActionGiveawayResults::deserialize($stream),
            0xcc02aa6d => MessageActionBoostApply::deserialize($stream),
            0x93b31848 => MessageActionRequestedPeerSentMe::deserialize($stream),
            0x41b3e202 => MessageActionPaymentRefunded::deserialize($stream),
            0x45d5b021 => MessageActionGiftStars::deserialize($stream),
            0xb00c47a2 => MessageActionPrizeStars::deserialize($stream),
            0x4717e8a4 => MessageActionStarGift::deserialize($stream),
            0x34f762f3 => MessageActionStarGiftUnique::deserialize($stream),
            0xac1f1fcd => MessageActionPaidMessagesRefunded::deserialize($stream),
            0x84b88578 => MessageActionPaidMessagesPrice::deserialize($stream),
            0x2ffe2f7a => MessageActionConferenceCall::deserialize($stream),
            0xcc7c5c89 => MessageActionTodoCompletions::deserialize($stream),
            0xc7edbc83 => MessageActionTodoAppendTasks::deserialize($stream),
            0xee7a1596 => MessageActionSuggestedPostApproval::deserialize($stream),
            0x95ddcf69 => MessageActionSuggestedPostSuccess::deserialize($stream),
            0x69f916f8 => MessageActionSuggestedPostRefund::deserialize($stream),
            0xa8a3c699 => MessageActionGiftTon::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type MessageAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}