<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/ReplyMarkup
 */
abstract class AbstractReplyMarkup extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xa03e5b85 => ReplyKeyboardHide::deserialize($__payload, $__offset),
            0x86b40b08 => ReplyKeyboardForceReply::deserialize($__payload, $__offset),
            0x85dd99d1 => ReplyKeyboardMarkup::deserialize($__payload, $__offset),
            0x48a30254 => ReplyInlineMarkup::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type ReplyMarkup. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}