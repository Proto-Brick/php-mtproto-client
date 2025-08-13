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
            0x3380c786 => InputBotInlineMessageMediaAuto::deserialize($stream),
            0x3dcd7a87 => InputBotInlineMessageText::deserialize($stream),
            0x96929a85 => InputBotInlineMessageMediaGeo::deserialize($stream),
            0x417bbf11 => InputBotInlineMessageMediaVenue::deserialize($stream),
            0xa6edbffd => InputBotInlineMessageMediaContact::deserialize($stream),
            0x4b425864 => InputBotInlineMessageGame::deserialize($stream),
            0xd7e78225 => InputBotInlineMessageMediaInvoice::deserialize($stream),
            0xbddcc510 => InputBotInlineMessageMediaWebPage::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputBotInlineMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}