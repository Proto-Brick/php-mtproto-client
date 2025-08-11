<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
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
            MessageActionEmpty::CONSTRUCTOR_ID => MessageActionEmpty::deserialize($stream),
            MessageActionChatCreate::CONSTRUCTOR_ID => MessageActionChatCreate::deserialize($stream),
            MessageActionChatEditTitle::CONSTRUCTOR_ID => MessageActionChatEditTitle::deserialize($stream),
            MessageActionChatEditPhoto::CONSTRUCTOR_ID => MessageActionChatEditPhoto::deserialize($stream),
            MessageActionChatDeletePhoto::CONSTRUCTOR_ID => MessageActionChatDeletePhoto::deserialize($stream),
            MessageActionChatAddUser::CONSTRUCTOR_ID => MessageActionChatAddUser::deserialize($stream),
            MessageActionChatDeleteUser::CONSTRUCTOR_ID => MessageActionChatDeleteUser::deserialize($stream),
            MessageActionChatJoinedByLink::CONSTRUCTOR_ID => MessageActionChatJoinedByLink::deserialize($stream),
            MessageActionChannelCreate::CONSTRUCTOR_ID => MessageActionChannelCreate::deserialize($stream),
            MessageActionChatMigrateTo::CONSTRUCTOR_ID => MessageActionChatMigrateTo::deserialize($stream),
            MessageActionChannelMigrateFrom::CONSTRUCTOR_ID => MessageActionChannelMigrateFrom::deserialize($stream),
            MessageActionPinMessage::CONSTRUCTOR_ID => MessageActionPinMessage::deserialize($stream),
            MessageActionHistoryClear::CONSTRUCTOR_ID => MessageActionHistoryClear::deserialize($stream),
            MessageActionGameScore::CONSTRUCTOR_ID => MessageActionGameScore::deserialize($stream),
            MessageActionPaymentSentMe::CONSTRUCTOR_ID => MessageActionPaymentSentMe::deserialize($stream),
            MessageActionPaymentSent::CONSTRUCTOR_ID => MessageActionPaymentSent::deserialize($stream),
            MessageActionPhoneCall::CONSTRUCTOR_ID => MessageActionPhoneCall::deserialize($stream),
            MessageActionScreenshotTaken::CONSTRUCTOR_ID => MessageActionScreenshotTaken::deserialize($stream),
            MessageActionCustomAction::CONSTRUCTOR_ID => MessageActionCustomAction::deserialize($stream),
            MessageActionBotAllowed::CONSTRUCTOR_ID => MessageActionBotAllowed::deserialize($stream),
            MessageActionSecureValuesSentMe::CONSTRUCTOR_ID => MessageActionSecureValuesSentMe::deserialize($stream),
            MessageActionSecureValuesSent::CONSTRUCTOR_ID => MessageActionSecureValuesSent::deserialize($stream),
            MessageActionContactSignUp::CONSTRUCTOR_ID => MessageActionContactSignUp::deserialize($stream),
            MessageActionGeoProximityReached::CONSTRUCTOR_ID => MessageActionGeoProximityReached::deserialize($stream),
            MessageActionGroupCall::CONSTRUCTOR_ID => MessageActionGroupCall::deserialize($stream),
            MessageActionInviteToGroupCall::CONSTRUCTOR_ID => MessageActionInviteToGroupCall::deserialize($stream),
            MessageActionSetMessagesTTL::CONSTRUCTOR_ID => MessageActionSetMessagesTTL::deserialize($stream),
            MessageActionGroupCallScheduled::CONSTRUCTOR_ID => MessageActionGroupCallScheduled::deserialize($stream),
            MessageActionSetChatTheme::CONSTRUCTOR_ID => MessageActionSetChatTheme::deserialize($stream),
            MessageActionChatJoinedByRequest::CONSTRUCTOR_ID => MessageActionChatJoinedByRequest::deserialize($stream),
            MessageActionWebViewDataSentMe::CONSTRUCTOR_ID => MessageActionWebViewDataSentMe::deserialize($stream),
            MessageActionWebViewDataSent::CONSTRUCTOR_ID => MessageActionWebViewDataSent::deserialize($stream),
            MessageActionGiftPremium::CONSTRUCTOR_ID => MessageActionGiftPremium::deserialize($stream),
            MessageActionTopicCreate::CONSTRUCTOR_ID => MessageActionTopicCreate::deserialize($stream),
            MessageActionTopicEdit::CONSTRUCTOR_ID => MessageActionTopicEdit::deserialize($stream),
            MessageActionSuggestProfilePhoto::CONSTRUCTOR_ID => MessageActionSuggestProfilePhoto::deserialize($stream),
            MessageActionRequestedPeer::CONSTRUCTOR_ID => MessageActionRequestedPeer::deserialize($stream),
            MessageActionSetChatWallPaper::CONSTRUCTOR_ID => MessageActionSetChatWallPaper::deserialize($stream),
            MessageActionGiftCode::CONSTRUCTOR_ID => MessageActionGiftCode::deserialize($stream),
            MessageActionGiveawayLaunch::CONSTRUCTOR_ID => MessageActionGiveawayLaunch::deserialize($stream),
            MessageActionGiveawayResults::CONSTRUCTOR_ID => MessageActionGiveawayResults::deserialize($stream),
            MessageActionBoostApply::CONSTRUCTOR_ID => MessageActionBoostApply::deserialize($stream),
            MessageActionRequestedPeerSentMe::CONSTRUCTOR_ID => MessageActionRequestedPeerSentMe::deserialize($stream),
            MessageActionPaymentRefunded::CONSTRUCTOR_ID => MessageActionPaymentRefunded::deserialize($stream),
            MessageActionGiftStars::CONSTRUCTOR_ID => MessageActionGiftStars::deserialize($stream),
            MessageActionPrizeStars::CONSTRUCTOR_ID => MessageActionPrizeStars::deserialize($stream),
            MessageActionStarGift::CONSTRUCTOR_ID => MessageActionStarGift::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessageAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}