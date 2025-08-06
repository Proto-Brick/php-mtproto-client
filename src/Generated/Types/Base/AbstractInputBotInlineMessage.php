<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputBotInlineMessage
 */
abstract class AbstractInputBotInlineMessage extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            InputBotInlineMessageMediaAuto::CONSTRUCTOR_ID => InputBotInlineMessageMediaAuto::deserialize($deserializer, $stream),
            InputBotInlineMessageText::CONSTRUCTOR_ID => InputBotInlineMessageText::deserialize($deserializer, $stream),
            InputBotInlineMessageMediaGeo::CONSTRUCTOR_ID => InputBotInlineMessageMediaGeo::deserialize($deserializer, $stream),
            InputBotInlineMessageMediaVenue::CONSTRUCTOR_ID => InputBotInlineMessageMediaVenue::deserialize($deserializer, $stream),
            InputBotInlineMessageMediaContact::CONSTRUCTOR_ID => InputBotInlineMessageMediaContact::deserialize($deserializer, $stream),
            InputBotInlineMessageGame::CONSTRUCTOR_ID => InputBotInlineMessageGame::deserialize($deserializer, $stream),
            InputBotInlineMessageMediaInvoice::CONSTRUCTOR_ID => InputBotInlineMessageMediaInvoice::deserialize($deserializer, $stream),
            InputBotInlineMessageMediaWebPage::CONSTRUCTOR_ID => InputBotInlineMessageMediaWebPage::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputBotInlineMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}