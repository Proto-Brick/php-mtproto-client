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
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xb6aef7b0 => MessageActionEmpty::deserialize($__payload, $__offset),
            0xbd47cbad => MessageActionChatCreate::deserialize($__payload, $__offset),
            0xb5a1ce5a => MessageActionChatEditTitle::deserialize($__payload, $__offset),
            0x7fcb13a8 => MessageActionChatEditPhoto::deserialize($__payload, $__offset),
            0x95e3fbef => MessageActionChatDeletePhoto::deserialize($__payload, $__offset),
            0x15cefd00 => MessageActionChatAddUser::deserialize($__payload, $__offset),
            0xa43f30cc => MessageActionChatDeleteUser::deserialize($__payload, $__offset),
            0x31224c3 => MessageActionChatJoinedByLink::deserialize($__payload, $__offset),
            0x95d2ac92 => MessageActionChannelCreate::deserialize($__payload, $__offset),
            0xe1037f92 => MessageActionChatMigrateTo::deserialize($__payload, $__offset),
            0xea3948e9 => MessageActionChannelMigrateFrom::deserialize($__payload, $__offset),
            0x94bd38ed => MessageActionPinMessage::deserialize($__payload, $__offset),
            0x9fbab604 => MessageActionHistoryClear::deserialize($__payload, $__offset),
            0x92a72876 => MessageActionGameScore::deserialize($__payload, $__offset),
            0xffa00ccc => MessageActionPaymentSentMe::deserialize($__payload, $__offset),
            0xc624b16e => MessageActionPaymentSent::deserialize($__payload, $__offset),
            0x80e11a7f => MessageActionPhoneCall::deserialize($__payload, $__offset),
            0x4792929b => MessageActionScreenshotTaken::deserialize($__payload, $__offset),
            0xfae69f56 => MessageActionCustomAction::deserialize($__payload, $__offset),
            0xc516d679 => MessageActionBotAllowed::deserialize($__payload, $__offset),
            0x1b287353 => MessageActionSecureValuesSentMe::deserialize($__payload, $__offset),
            0xd95c6154 => MessageActionSecureValuesSent::deserialize($__payload, $__offset),
            0xf3f25f76 => MessageActionContactSignUp::deserialize($__payload, $__offset),
            0x98e0d697 => MessageActionGeoProximityReached::deserialize($__payload, $__offset),
            0x7a0d7f42 => MessageActionGroupCall::deserialize($__payload, $__offset),
            0x502f92f7 => MessageActionInviteToGroupCall::deserialize($__payload, $__offset),
            0x3c134d7b => MessageActionSetMessagesTTL::deserialize($__payload, $__offset),
            0xb3a07661 => MessageActionGroupCallScheduled::deserialize($__payload, $__offset),
            0xb91bbd3a => MessageActionSetChatTheme::deserialize($__payload, $__offset),
            0xebbca3cb => MessageActionChatJoinedByRequest::deserialize($__payload, $__offset),
            0x47dd8079 => MessageActionWebViewDataSentMe::deserialize($__payload, $__offset),
            0xb4c38cb5 => MessageActionWebViewDataSent::deserialize($__payload, $__offset),
            0x48e91302 => MessageActionGiftPremium::deserialize($__payload, $__offset),
            0xd999256 => MessageActionTopicCreate::deserialize($__payload, $__offset),
            0xc0944820 => MessageActionTopicEdit::deserialize($__payload, $__offset),
            0x57de635e => MessageActionSuggestProfilePhoto::deserialize($__payload, $__offset),
            0x31518e9b => MessageActionRequestedPeer::deserialize($__payload, $__offset),
            0x5060a3f4 => MessageActionSetChatWallPaper::deserialize($__payload, $__offset),
            0x31c48347 => MessageActionGiftCode::deserialize($__payload, $__offset),
            0xa80f51e4 => MessageActionGiveawayLaunch::deserialize($__payload, $__offset),
            0x87e2f155 => MessageActionGiveawayResults::deserialize($__payload, $__offset),
            0xcc02aa6d => MessageActionBoostApply::deserialize($__payload, $__offset),
            0x93b31848 => MessageActionRequestedPeerSentMe::deserialize($__payload, $__offset),
            0x41b3e202 => MessageActionPaymentRefunded::deserialize($__payload, $__offset),
            0x45d5b021 => MessageActionGiftStars::deserialize($__payload, $__offset),
            0xb00c47a2 => MessageActionPrizeStars::deserialize($__payload, $__offset),
            0xea2c31d3 => MessageActionStarGift::deserialize($__payload, $__offset),
            0x95728543 => MessageActionStarGiftUnique::deserialize($__payload, $__offset),
            0xac1f1fcd => MessageActionPaidMessagesRefunded::deserialize($__payload, $__offset),
            0x84b88578 => MessageActionPaidMessagesPrice::deserialize($__payload, $__offset),
            0x2ffe2f7a => MessageActionConferenceCall::deserialize($__payload, $__offset),
            0xcc7c5c89 => MessageActionTodoCompletions::deserialize($__payload, $__offset),
            0xc7edbc83 => MessageActionTodoAppendTasks::deserialize($__payload, $__offset),
            0xee7a1596 => MessageActionSuggestedPostApproval::deserialize($__payload, $__offset),
            0x95ddcf69 => MessageActionSuggestedPostSuccess::deserialize($__payload, $__offset),
            0x69f916f8 => MessageActionSuggestedPostRefund::deserialize($__payload, $__offset),
            0xa8a3c699 => MessageActionGiftTon::deserialize($__payload, $__offset),
            0x2c8f2a25 => MessageActionSuggestBirthday::deserialize($__payload, $__offset),
            0x774278d4 => MessageActionStarGiftPurchaseOffer::deserialize($__payload, $__offset),
            0x73ada76b => MessageActionStarGiftPurchaseOfferDeclined::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type MessageAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}