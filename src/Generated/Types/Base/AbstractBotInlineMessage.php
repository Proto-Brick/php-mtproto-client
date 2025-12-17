<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/BotInlineMessage
 */
abstract class AbstractBotInlineMessage extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x764cf810 => BotInlineMessageMediaAuto::deserialize($__payload, $__offset),
            0x8c7f65e2 => BotInlineMessageText::deserialize($__payload, $__offset),
            0x51846fd => BotInlineMessageMediaGeo::deserialize($__payload, $__offset),
            0x8a86659c => BotInlineMessageMediaVenue::deserialize($__payload, $__offset),
            0x18d1cdc2 => BotInlineMessageMediaContact::deserialize($__payload, $__offset),
            0x354a9b09 => BotInlineMessageMediaInvoice::deserialize($__payload, $__offset),
            0x809ad9a6 => BotInlineMessageMediaWebPage::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type BotInlineMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}