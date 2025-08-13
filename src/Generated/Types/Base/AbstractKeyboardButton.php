<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/KeyboardButton
 */
abstract class AbstractKeyboardButton extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xa2fa4880 => KeyboardButton::deserialize($stream),
            0x258aff05 => KeyboardButtonUrl::deserialize($stream),
            0x35bbdb6b => KeyboardButtonCallback::deserialize($stream),
            0xb16a6c29 => KeyboardButtonRequestPhone::deserialize($stream),
            0xfc796b3f => KeyboardButtonRequestGeoLocation::deserialize($stream),
            0x93b9fbb5 => KeyboardButtonSwitchInline::deserialize($stream),
            0x50f41ccf => KeyboardButtonGame::deserialize($stream),
            0xafd93fbb => KeyboardButtonBuy::deserialize($stream),
            0x10b78d29 => KeyboardButtonUrlAuth::deserialize($stream),
            0xd02e7fd4 => InputKeyboardButtonUrlAuth::deserialize($stream),
            0xbbc7515d => KeyboardButtonRequestPoll::deserialize($stream),
            0xe988037b => InputKeyboardButtonUserProfile::deserialize($stream),
            0x308660c1 => KeyboardButtonUserProfile::deserialize($stream),
            0x13767230 => KeyboardButtonWebView::deserialize($stream),
            0xa0c0505c => KeyboardButtonSimpleWebView::deserialize($stream),
            0x53d7bfd8 => KeyboardButtonRequestPeer::deserialize($stream),
            0xc9662d05 => InputKeyboardButtonRequestPeer::deserialize($stream),
            0x75d2698e => KeyboardButtonCopy::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type KeyboardButton. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}