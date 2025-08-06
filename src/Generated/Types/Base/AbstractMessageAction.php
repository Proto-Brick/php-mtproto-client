<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessageAction
 */
abstract class AbstractMessageAction extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            MessageActionEmpty::CONSTRUCTOR_ID => MessageActionEmpty::deserialize($deserializer, $stream),
            MessageActionChatCreate::CONSTRUCTOR_ID => MessageActionChatCreate::deserialize($deserializer, $stream),
            MessageActionChatEditTitle::CONSTRUCTOR_ID => MessageActionChatEditTitle::deserialize($deserializer, $stream),
            MessageActionChatEditPhoto::CONSTRUCTOR_ID => MessageActionChatEditPhoto::deserialize($deserializer, $stream),
            MessageActionChatDeletePhoto::CONSTRUCTOR_ID => MessageActionChatDeletePhoto::deserialize($deserializer, $stream),
            MessageActionChatAddUser::CONSTRUCTOR_ID => MessageActionChatAddUser::deserialize($deserializer, $stream),
            MessageActionChatDeleteUser::CONSTRUCTOR_ID => MessageActionChatDeleteUser::deserialize($deserializer, $stream),
            MessageActionChatJoinedByLink::CONSTRUCTOR_ID => MessageActionChatJoinedByLink::deserialize($deserializer, $stream),
            MessageActionChannelCreate::CONSTRUCTOR_ID => MessageActionChannelCreate::deserialize($deserializer, $stream),
            MessageActionChatMigrateTo::CONSTRUCTOR_ID => MessageActionChatMigrateTo::deserialize($deserializer, $stream),
            MessageActionChannelMigrateFrom::CONSTRUCTOR_ID => MessageActionChannelMigrateFrom::deserialize($deserializer, $stream),
            MessageActionPinMessage::CONSTRUCTOR_ID => MessageActionPinMessage::deserialize($deserializer, $stream),
            MessageActionHistoryClear::CONSTRUCTOR_ID => MessageActionHistoryClear::deserialize($deserializer, $stream),
            MessageActionGameScore::CONSTRUCTOR_ID => MessageActionGameScore::deserialize($deserializer, $stream),
            MessageActionPaymentSentMe::CONSTRUCTOR_ID => MessageActionPaymentSentMe::deserialize($deserializer, $stream),
            MessageActionPaymentSent::CONSTRUCTOR_ID => MessageActionPaymentSent::deserialize($deserializer, $stream),
            MessageActionPhoneCall::CONSTRUCTOR_ID => MessageActionPhoneCall::deserialize($deserializer, $stream),
            MessageActionScreenshotTaken::CONSTRUCTOR_ID => MessageActionScreenshotTaken::deserialize($deserializer, $stream),
            MessageActionCustomAction::CONSTRUCTOR_ID => MessageActionCustomAction::deserialize($deserializer, $stream),
            MessageActionBotAllowed::CONSTRUCTOR_ID => MessageActionBotAllowed::deserialize($deserializer, $stream),
            MessageActionSecureValuesSentMe::CONSTRUCTOR_ID => MessageActionSecureValuesSentMe::deserialize($deserializer, $stream),
            MessageActionSecureValuesSent::CONSTRUCTOR_ID => MessageActionSecureValuesSent::deserialize($deserializer, $stream),
            MessageActionContactSignUp::CONSTRUCTOR_ID => MessageActionContactSignUp::deserialize($deserializer, $stream),
            MessageActionGeoProximityReached::CONSTRUCTOR_ID => MessageActionGeoProximityReached::deserialize($deserializer, $stream),
            MessageActionGroupCall::CONSTRUCTOR_ID => MessageActionGroupCall::deserialize($deserializer, $stream),
            MessageActionInviteToGroupCall::CONSTRUCTOR_ID => MessageActionInviteToGroupCall::deserialize($deserializer, $stream),
            MessageActionSetMessagesTTL::CONSTRUCTOR_ID => MessageActionSetMessagesTTL::deserialize($deserializer, $stream),
            MessageActionGroupCallScheduled::CONSTRUCTOR_ID => MessageActionGroupCallScheduled::deserialize($deserializer, $stream),
            MessageActionSetChatTheme::CONSTRUCTOR_ID => MessageActionSetChatTheme::deserialize($deserializer, $stream),
            MessageActionChatJoinedByRequest::CONSTRUCTOR_ID => MessageActionChatJoinedByRequest::deserialize($deserializer, $stream),
            MessageActionWebViewDataSentMe::CONSTRUCTOR_ID => MessageActionWebViewDataSentMe::deserialize($deserializer, $stream),
            MessageActionWebViewDataSent::CONSTRUCTOR_ID => MessageActionWebViewDataSent::deserialize($deserializer, $stream),
            MessageActionGiftPremium::CONSTRUCTOR_ID => MessageActionGiftPremium::deserialize($deserializer, $stream),
            MessageActionTopicCreate::CONSTRUCTOR_ID => MessageActionTopicCreate::deserialize($deserializer, $stream),
            MessageActionTopicEdit::CONSTRUCTOR_ID => MessageActionTopicEdit::deserialize($deserializer, $stream),
            MessageActionSuggestProfilePhoto::CONSTRUCTOR_ID => MessageActionSuggestProfilePhoto::deserialize($deserializer, $stream),
            MessageActionRequestedPeer::CONSTRUCTOR_ID => MessageActionRequestedPeer::deserialize($deserializer, $stream),
            MessageActionSetChatWallPaper::CONSTRUCTOR_ID => MessageActionSetChatWallPaper::deserialize($deserializer, $stream),
            MessageActionGiftCode::CONSTRUCTOR_ID => MessageActionGiftCode::deserialize($deserializer, $stream),
            MessageActionGiveawayLaunch::CONSTRUCTOR_ID => MessageActionGiveawayLaunch::deserialize($deserializer, $stream),
            MessageActionGiveawayResults::CONSTRUCTOR_ID => MessageActionGiveawayResults::deserialize($deserializer, $stream),
            MessageActionBoostApply::CONSTRUCTOR_ID => MessageActionBoostApply::deserialize($deserializer, $stream),
            MessageActionRequestedPeerSentMe::CONSTRUCTOR_ID => MessageActionRequestedPeerSentMe::deserialize($deserializer, $stream),
            MessageActionPaymentRefunded::CONSTRUCTOR_ID => MessageActionPaymentRefunded::deserialize($deserializer, $stream),
            MessageActionGiftStars::CONSTRUCTOR_ID => MessageActionGiftStars::deserialize($deserializer, $stream),
            MessageActionPrizeStars::CONSTRUCTOR_ID => MessageActionPrizeStars::deserialize($deserializer, $stream),
            MessageActionStarGift::CONSTRUCTOR_ID => MessageActionStarGift::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessageAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}