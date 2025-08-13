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
            0x764cf810 => BotInlineMessageMediaAuto::deserialize($stream),
            0x8c7f65e2 => BotInlineMessageText::deserialize($stream),
            0x51846fd => BotInlineMessageMediaGeo::deserialize($stream),
            0x8a86659c => BotInlineMessageMediaVenue::deserialize($stream),
            0x18d1cdc2 => BotInlineMessageMediaContact::deserialize($stream),
            0x354a9b09 => BotInlineMessageMediaInvoice::deserialize($stream),
            0x809ad9a6 => BotInlineMessageMediaWebPage::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type BotInlineMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}