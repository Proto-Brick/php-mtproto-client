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
            ReplyKeyboardHide::CONSTRUCTOR_ID => ReplyKeyboardHide::deserialize($stream),
            ReplyKeyboardForceReply::CONSTRUCTOR_ID => ReplyKeyboardForceReply::deserialize($stream),
            ReplyKeyboardMarkup::CONSTRUCTOR_ID => ReplyKeyboardMarkup::deserialize($stream),
            ReplyInlineMarkup::CONSTRUCTOR_ID => ReplyInlineMarkup::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type ReplyMarkup. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}