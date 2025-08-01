<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/ReplyMarkup
 */
abstract class AbstractReplyMarkup extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ReplyKeyboardHide::CONSTRUCTOR_ID => ReplyKeyboardHide::deserialize($deserializer, $stream),
            ReplyKeyboardForceReply::CONSTRUCTOR_ID => ReplyKeyboardForceReply::deserialize($deserializer, $stream),
            ReplyKeyboardMarkup::CONSTRUCTOR_ID => ReplyKeyboardMarkup::deserialize($deserializer, $stream),
            ReplyInlineMarkup::CONSTRUCTOR_ID => ReplyInlineMarkup::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type ReplyMarkup: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}