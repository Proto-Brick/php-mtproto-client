<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/BotInlineMessage
 */
abstract class AbstractBotInlineMessage extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            BotInlineMessageMediaAuto::CONSTRUCTOR_ID => BotInlineMessageMediaAuto::deserialize($deserializer, $stream),
            BotInlineMessageText::CONSTRUCTOR_ID => BotInlineMessageText::deserialize($deserializer, $stream),
            BotInlineMessageMediaGeo::CONSTRUCTOR_ID => BotInlineMessageMediaGeo::deserialize($deserializer, $stream),
            BotInlineMessageMediaVenue::CONSTRUCTOR_ID => BotInlineMessageMediaVenue::deserialize($deserializer, $stream),
            BotInlineMessageMediaContact::CONSTRUCTOR_ID => BotInlineMessageMediaContact::deserialize($deserializer, $stream),
            BotInlineMessageMediaInvoice::CONSTRUCTOR_ID => BotInlineMessageMediaInvoice::deserialize($deserializer, $stream),
            BotInlineMessageMediaWebPage::CONSTRUCTOR_ID => BotInlineMessageMediaWebPage::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type BotInlineMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}