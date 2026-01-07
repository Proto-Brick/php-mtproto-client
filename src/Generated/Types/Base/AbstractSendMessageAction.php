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
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x16bf744e => SendMessageTypingAction::deserialize($__payload, $__offset),
            0xfd5ec8f5 => SendMessageCancelAction::deserialize($__payload, $__offset),
            0xa187d66f => SendMessageRecordVideoAction::deserialize($__payload, $__offset),
            0xe9763aec => SendMessageUploadVideoAction::deserialize($__payload, $__offset),
            0xd52f73f7 => SendMessageRecordAudioAction::deserialize($__payload, $__offset),
            0xf351d7ab => SendMessageUploadAudioAction::deserialize($__payload, $__offset),
            0xd1d34a26 => SendMessageUploadPhotoAction::deserialize($__payload, $__offset),
            0xaa0cd9e4 => SendMessageUploadDocumentAction::deserialize($__payload, $__offset),
            0x176f8ba1 => SendMessageGeoLocationAction::deserialize($__payload, $__offset),
            0x628cbc6f => SendMessageChooseContactAction::deserialize($__payload, $__offset),
            0xdd6a8f48 => SendMessageGamePlayAction::deserialize($__payload, $__offset),
            0x88f27fbc => SendMessageRecordRoundAction::deserialize($__payload, $__offset),
            0x243e1c66 => SendMessageUploadRoundAction::deserialize($__payload, $__offset),
            0xd92c2285 => SpeakingInGroupCallAction::deserialize($__payload, $__offset),
            0xdbda9246 => SendMessageHistoryImportAction::deserialize($__payload, $__offset),
            0xb05ac6b1 => SendMessageChooseStickerAction::deserialize($__payload, $__offset),
            0x25972bcb => SendMessageEmojiInteraction::deserialize($__payload, $__offset),
            0xb665902e => SendMessageEmojiInteractionSeen::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type SendMessageAction. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}