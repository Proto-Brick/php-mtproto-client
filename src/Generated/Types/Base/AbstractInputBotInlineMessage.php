<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputBotInlineMessage
 */
abstract class AbstractInputBotInlineMessage extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputBotInlineMessageMediaAuto::CONSTRUCTOR_ID => InputBotInlineMessageMediaAuto::deserialize($stream),
            InputBotInlineMessageText::CONSTRUCTOR_ID => InputBotInlineMessageText::deserialize($stream),
            InputBotInlineMessageMediaGeo::CONSTRUCTOR_ID => InputBotInlineMessageMediaGeo::deserialize($stream),
            InputBotInlineMessageMediaVenue::CONSTRUCTOR_ID => InputBotInlineMessageMediaVenue::deserialize($stream),
            InputBotInlineMessageMediaContact::CONSTRUCTOR_ID => InputBotInlineMessageMediaContact::deserialize($stream),
            InputBotInlineMessageGame::CONSTRUCTOR_ID => InputBotInlineMessageGame::deserialize($stream),
            InputBotInlineMessageMediaInvoice::CONSTRUCTOR_ID => InputBotInlineMessageMediaInvoice::deserialize($stream),
            InputBotInlineMessageMediaWebPage::CONSTRUCTOR_ID => InputBotInlineMessageMediaWebPage::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputBotInlineMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}