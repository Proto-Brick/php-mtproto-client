<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ReplyMarkup
 */
abstract class AbstractReplyMarkup extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xa03e5b85 => ReplyKeyboardHide::deserialize($stream),
            0x86b40b08 => ReplyKeyboardForceReply::deserialize($stream),
            0x85dd99d1 => ReplyKeyboardMarkup::deserialize($stream),
            0x48a30254 => ReplyInlineMarkup::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ReplyMarkup. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}