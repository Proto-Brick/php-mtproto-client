<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/SendMessageAction
 */
abstract class AbstractSendMessageAction extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            SendMessageTypingAction::CONSTRUCTOR_ID => SendMessageTypingAction::deserialize($stream),
            SendMessageCancelAction::CONSTRUCTOR_ID => SendMessageCancelAction::deserialize($stream),
            SendMessageRecordVideoAction::CONSTRUCTOR_ID => SendMessageRecordVideoAction::deserialize($stream),
            SendMessageUploadVideoAction::CONSTRUCTOR_ID => SendMessageUploadVideoAction::deserialize($stream),
            SendMessageRecordAudioAction::CONSTRUCTOR_ID => SendMessageRecordAudioAction::deserialize($stream),
            SendMessageUploadAudioAction::CONSTRUCTOR_ID => SendMessageUploadAudioAction::deserialize($stream),
            SendMessageUploadPhotoAction::CONSTRUCTOR_ID => SendMessageUploadPhotoAction::deserialize($stream),
            SendMessageUploadDocumentAction::CONSTRUCTOR_ID => SendMessageUploadDocumentAction::deserialize($stream),
            SendMessageGeoLocationAction::CONSTRUCTOR_ID => SendMessageGeoLocationAction::deserialize($stream),
            SendMessageChooseContactAction::CONSTRUCTOR_ID => SendMessageChooseContactAction::deserialize($stream),
            SendMessageGamePlayAction::CONSTRUCTOR_ID => SendMessageGamePlayAction::deserialize($stream),
            SendMessageRecordRoundAction::CONSTRUCTOR_ID => SendMessageRecordRoundAction::deserialize($stream),
            SendMessageUploadRoundAction::CONSTRUCTOR_ID => SendMessageUploadRoundAction::deserialize($stream),
            SpeakingInGroupCallAction::CONSTRUCTOR_ID => SpeakingInGroupCallAction::deserialize($stream),
            SendMessageHistoryImportAction::CONSTRUCTOR_ID => SendMessageHistoryImportAction::deserialize($stream),
            SendMessageChooseStickerAction::CONSTRUCTOR_ID => SendMessageChooseStickerAction::deserialize($stream),
            SendMessageEmojiInteraction::CONSTRUCTOR_ID => SendMessageEmojiInteraction::deserialize($stream),
            SendMessageEmojiInteractionSeen::CONSTRUCTOR_ID => SendMessageEmojiInteractionSeen::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type SendMessageAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}