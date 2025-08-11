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
            KeyboardButton::CONSTRUCTOR_ID => KeyboardButton::deserialize($stream),
            KeyboardButtonUrl::CONSTRUCTOR_ID => KeyboardButtonUrl::deserialize($stream),
            KeyboardButtonCallback::CONSTRUCTOR_ID => KeyboardButtonCallback::deserialize($stream),
            KeyboardButtonRequestPhone::CONSTRUCTOR_ID => KeyboardButtonRequestPhone::deserialize($stream),
            KeyboardButtonRequestGeoLocation::CONSTRUCTOR_ID => KeyboardButtonRequestGeoLocation::deserialize($stream),
            KeyboardButtonSwitchInline::CONSTRUCTOR_ID => KeyboardButtonSwitchInline::deserialize($stream),
            KeyboardButtonGame::CONSTRUCTOR_ID => KeyboardButtonGame::deserialize($stream),
            KeyboardButtonBuy::CONSTRUCTOR_ID => KeyboardButtonBuy::deserialize($stream),
            KeyboardButtonUrlAuth::CONSTRUCTOR_ID => KeyboardButtonUrlAuth::deserialize($stream),
            InputKeyboardButtonUrlAuth::CONSTRUCTOR_ID => InputKeyboardButtonUrlAuth::deserialize($stream),
            KeyboardButtonRequestPoll::CONSTRUCTOR_ID => KeyboardButtonRequestPoll::deserialize($stream),
            InputKeyboardButtonUserProfile::CONSTRUCTOR_ID => InputKeyboardButtonUserProfile::deserialize($stream),
            KeyboardButtonUserProfile::CONSTRUCTOR_ID => KeyboardButtonUserProfile::deserialize($stream),
            KeyboardButtonWebView::CONSTRUCTOR_ID => KeyboardButtonWebView::deserialize($stream),
            KeyboardButtonSimpleWebView::CONSTRUCTOR_ID => KeyboardButtonSimpleWebView::deserialize($stream),
            KeyboardButtonRequestPeer::CONSTRUCTOR_ID => KeyboardButtonRequestPeer::deserialize($stream),
            InputKeyboardButtonRequestPeer::CONSTRUCTOR_ID => InputKeyboardButtonRequestPeer::deserialize($stream),
            KeyboardButtonCopy::CONSTRUCTOR_ID => KeyboardButtonCopy::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type KeyboardButton. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}