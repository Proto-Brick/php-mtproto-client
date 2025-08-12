<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputMessage
 */
abstract class AbstractInputMessage extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputMessageID::CONSTRUCTOR_ID => InputMessageID::deserialize($stream),
            InputMessageReplyTo::CONSTRUCTOR_ID => InputMessageReplyTo::deserialize($stream),
            InputMessagePinned::CONSTRUCTOR_ID => InputMessagePinned::deserialize($stream),
            InputMessageCallbackQuery::CONSTRUCTOR_ID => InputMessageCallbackQuery::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputMessage. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}