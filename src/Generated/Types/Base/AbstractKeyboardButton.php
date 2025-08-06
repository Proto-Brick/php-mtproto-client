<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/KeyboardButton
 */
abstract class AbstractKeyboardButton extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            KeyboardButton::CONSTRUCTOR_ID => KeyboardButton::deserialize($deserializer, $stream),
            KeyboardButtonUrl::CONSTRUCTOR_ID => KeyboardButtonUrl::deserialize($deserializer, $stream),
            KeyboardButtonCallback::CONSTRUCTOR_ID => KeyboardButtonCallback::deserialize($deserializer, $stream),
            KeyboardButtonRequestPhone::CONSTRUCTOR_ID => KeyboardButtonRequestPhone::deserialize($deserializer, $stream),
            KeyboardButtonRequestGeoLocation::CONSTRUCTOR_ID => KeyboardButtonRequestGeoLocation::deserialize($deserializer, $stream),
            KeyboardButtonSwitchInline::CONSTRUCTOR_ID => KeyboardButtonSwitchInline::deserialize($deserializer, $stream),
            KeyboardButtonGame::CONSTRUCTOR_ID => KeyboardButtonGame::deserialize($deserializer, $stream),
            KeyboardButtonBuy::CONSTRUCTOR_ID => KeyboardButtonBuy::deserialize($deserializer, $stream),
            KeyboardButtonUrlAuth::CONSTRUCTOR_ID => KeyboardButtonUrlAuth::deserialize($deserializer, $stream),
            InputKeyboardButtonUrlAuth::CONSTRUCTOR_ID => InputKeyboardButtonUrlAuth::deserialize($deserializer, $stream),
            KeyboardButtonRequestPoll::CONSTRUCTOR_ID => KeyboardButtonRequestPoll::deserialize($deserializer, $stream),
            InputKeyboardButtonUserProfile::CONSTRUCTOR_ID => InputKeyboardButtonUserProfile::deserialize($deserializer, $stream),
            KeyboardButtonUserProfile::CONSTRUCTOR_ID => KeyboardButtonUserProfile::deserialize($deserializer, $stream),
            KeyboardButtonWebView::CONSTRUCTOR_ID => KeyboardButtonWebView::deserialize($deserializer, $stream),
            KeyboardButtonSimpleWebView::CONSTRUCTOR_ID => KeyboardButtonSimpleWebView::deserialize($deserializer, $stream),
            KeyboardButtonRequestPeer::CONSTRUCTOR_ID => KeyboardButtonRequestPeer::deserialize($deserializer, $stream),
            InputKeyboardButtonRequestPeer::CONSTRUCTOR_ID => InputKeyboardButtonRequestPeer::deserialize($deserializer, $stream),
            KeyboardButtonCopy::CONSTRUCTOR_ID => KeyboardButtonCopy::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type KeyboardButton. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}