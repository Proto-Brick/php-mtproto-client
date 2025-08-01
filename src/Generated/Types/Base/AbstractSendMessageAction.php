<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/SendMessageAction
 */
abstract class AbstractSendMessageAction extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            SendMessageTypingAction::CONSTRUCTOR_ID => SendMessageTypingAction::deserialize($deserializer, $stream),
            SendMessageCancelAction::CONSTRUCTOR_ID => SendMessageCancelAction::deserialize($deserializer, $stream),
            SendMessageRecordVideoAction::CONSTRUCTOR_ID => SendMessageRecordVideoAction::deserialize($deserializer, $stream),
            SendMessageUploadVideoAction::CONSTRUCTOR_ID => SendMessageUploadVideoAction::deserialize($deserializer, $stream),
            SendMessageRecordAudioAction::CONSTRUCTOR_ID => SendMessageRecordAudioAction::deserialize($deserializer, $stream),
            SendMessageUploadAudioAction::CONSTRUCTOR_ID => SendMessageUploadAudioAction::deserialize($deserializer, $stream),
            SendMessageUploadPhotoAction::CONSTRUCTOR_ID => SendMessageUploadPhotoAction::deserialize($deserializer, $stream),
            SendMessageUploadDocumentAction::CONSTRUCTOR_ID => SendMessageUploadDocumentAction::deserialize($deserializer, $stream),
            SendMessageGeoLocationAction::CONSTRUCTOR_ID => SendMessageGeoLocationAction::deserialize($deserializer, $stream),
            SendMessageChooseContactAction::CONSTRUCTOR_ID => SendMessageChooseContactAction::deserialize($deserializer, $stream),
            SendMessageGamePlayAction::CONSTRUCTOR_ID => SendMessageGamePlayAction::deserialize($deserializer, $stream),
            SendMessageRecordRoundAction::CONSTRUCTOR_ID => SendMessageRecordRoundAction::deserialize($deserializer, $stream),
            SendMessageUploadRoundAction::CONSTRUCTOR_ID => SendMessageUploadRoundAction::deserialize($deserializer, $stream),
            SpeakingInGroupCallAction::CONSTRUCTOR_ID => SpeakingInGroupCallAction::deserialize($deserializer, $stream),
            SendMessageHistoryImportAction::CONSTRUCTOR_ID => SendMessageHistoryImportAction::deserialize($deserializer, $stream),
            SendMessageChooseStickerAction::CONSTRUCTOR_ID => SendMessageChooseStickerAction::deserialize($deserializer, $stream),
            SendMessageEmojiInteraction::CONSTRUCTOR_ID => SendMessageEmojiInteraction::deserialize($deserializer, $stream),
            SendMessageEmojiInteractionSeen::CONSTRUCTOR_ID => SendMessageEmojiInteractionSeen::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type SendMessageAction: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}