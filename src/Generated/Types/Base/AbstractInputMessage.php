<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputMessage
 */
abstract class AbstractInputMessage extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputMessageID::CONSTRUCTOR_ID => InputMessageID::deserialize($deserializer, $stream),
            InputMessageReplyTo::CONSTRUCTOR_ID => InputMessageReplyTo::deserialize($deserializer, $stream),
            InputMessagePinned::CONSTRUCTOR_ID => InputMessagePinned::deserialize($deserializer, $stream),
            InputMessageCallbackQuery::CONSTRUCTOR_ID => InputMessageCallbackQuery::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputMessage: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}