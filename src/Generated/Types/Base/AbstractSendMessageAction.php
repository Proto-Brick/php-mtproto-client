<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


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
            0x16bf744e => SendMessageTypingAction::deserialize($stream),
            0xfd5ec8f5 => SendMessageCancelAction::deserialize($stream),
            0xa187d66f => SendMessageRecordVideoAction::deserialize($stream),
            0xe9763aec => SendMessageUploadVideoAction::deserialize($stream),
            0xd52f73f7 => SendMessageRecordAudioAction::deserialize($stream),
            0xf351d7ab => SendMessageUploadAudioAction::deserialize($stream),
            0xd1d34a26 => SendMessageUploadPhotoAction::deserialize($stream),
            0xaa0cd9e4 => SendMessageUploadDocumentAction::deserialize($stream),
            0x176f8ba1 => SendMessageGeoLocationAction::deserialize($stream),
            0x628cbc6f => SendMessageChooseContactAction::deserialize($stream),
            0xdd6a8f48 => SendMessageGamePlayAction::deserialize($stream),
            0x88f27fbc => SendMessageRecordRoundAction::deserialize($stream),
            0x243e1c66 => SendMessageUploadRoundAction::deserialize($stream),
            0xd92c2285 => SpeakingInGroupCallAction::deserialize($stream),
            0xdbda9246 => SendMessageHistoryImportAction::deserialize($stream),
            0xb05ac6b1 => SendMessageChooseStickerAction::deserialize($stream),
            0x25972bcb => SendMessageEmojiInteraction::deserialize($stream),
            0xb665902e => SendMessageEmojiInteractionSeen::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type SendMessageAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}