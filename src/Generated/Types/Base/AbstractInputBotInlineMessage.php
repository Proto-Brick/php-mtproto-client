<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputBotInlineMessage
 */
abstract class AbstractInputBotInlineMessage extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x3380c786 => InputBotInlineMessageMediaAuto::deserialize($__payload, $__offset),
            0x3dcd7a87 => InputBotInlineMessageText::deserialize($__payload, $__offset),
            0x96929a85 => InputBotInlineMessageMediaGeo::deserialize($__payload, $__offset),
            0x417bbf11 => InputBotInlineMessageMediaVenue::deserialize($__payload, $__offset),
            0xa6edbffd => InputBotInlineMessageMediaContact::deserialize($__payload, $__offset),
            0x4b425864 => InputBotInlineMessageGame::deserialize($__payload, $__offset),
            0xd7e78225 => InputBotInlineMessageMediaInvoice::deserialize($__payload, $__offset),
            0xbddcc510 => InputBotInlineMessageMediaWebPage::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputBotInlineMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}