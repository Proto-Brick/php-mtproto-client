<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/KeyboardButton
 */
abstract class AbstractKeyboardButton extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xa2fa4880 => KeyboardButton::deserialize($__payload, $__offset),
            0x258aff05 => KeyboardButtonUrl::deserialize($__payload, $__offset),
            0x35bbdb6b => KeyboardButtonCallback::deserialize($__payload, $__offset),
            0xb16a6c29 => KeyboardButtonRequestPhone::deserialize($__payload, $__offset),
            0xfc796b3f => KeyboardButtonRequestGeoLocation::deserialize($__payload, $__offset),
            0x93b9fbb5 => KeyboardButtonSwitchInline::deserialize($__payload, $__offset),
            0x50f41ccf => KeyboardButtonGame::deserialize($__payload, $__offset),
            0xafd93fbb => KeyboardButtonBuy::deserialize($__payload, $__offset),
            0x10b78d29 => KeyboardButtonUrlAuth::deserialize($__payload, $__offset),
            0xd02e7fd4 => InputKeyboardButtonUrlAuth::deserialize($__payload, $__offset),
            0xbbc7515d => KeyboardButtonRequestPoll::deserialize($__payload, $__offset),
            0xe988037b => InputKeyboardButtonUserProfile::deserialize($__payload, $__offset),
            0x308660c1 => KeyboardButtonUserProfile::deserialize($__payload, $__offset),
            0x13767230 => KeyboardButtonWebView::deserialize($__payload, $__offset),
            0xa0c0505c => KeyboardButtonSimpleWebView::deserialize($__payload, $__offset),
            0x53d7bfd8 => KeyboardButtonRequestPeer::deserialize($__payload, $__offset),
            0xc9662d05 => InputKeyboardButtonRequestPeer::deserialize($__payload, $__offset),
            0x75d2698e => KeyboardButtonCopy::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type KeyboardButton. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}