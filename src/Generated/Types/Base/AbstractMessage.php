<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/Message
 */
abstract class AbstractMessage extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            MessageEmpty::CONSTRUCTOR_ID => MessageEmpty::deserialize($deserializer, $stream),
            Message::CONSTRUCTOR_ID => Message::deserialize($deserializer, $stream),
            MessageService::CONSTRUCTOR_ID => MessageService::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type Message: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}