<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/BotInlineMessage
 */
abstract class AbstractBotInlineMessage extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            BotInlineMessageMediaAuto::CONSTRUCTOR_ID => BotInlineMessageMediaAuto::deserialize($stream),
            BotInlineMessageText::CONSTRUCTOR_ID => BotInlineMessageText::deserialize($stream),
            BotInlineMessageMediaGeo::CONSTRUCTOR_ID => BotInlineMessageMediaGeo::deserialize($stream),
            BotInlineMessageMediaVenue::CONSTRUCTOR_ID => BotInlineMessageMediaVenue::deserialize($stream),
            BotInlineMessageMediaContact::CONSTRUCTOR_ID => BotInlineMessageMediaContact::deserialize($stream),
            BotInlineMessageMediaInvoice::CONSTRUCTOR_ID => BotInlineMessageMediaInvoice::deserialize($stream),
            BotInlineMessageMediaWebPage::CONSTRUCTOR_ID => BotInlineMessageMediaWebPage::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type BotInlineMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}