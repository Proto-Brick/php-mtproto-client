<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputChannel
 */
abstract class AbstractInputChannel extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputChannelEmpty::CONSTRUCTOR_ID => InputChannelEmpty::deserialize($deserializer, $stream),
            InputChannel::CONSTRUCTOR_ID => InputChannel::deserialize($deserializer, $stream),
            InputChannelFromMessage::CONSTRUCTOR_ID => InputChannelFromMessage::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputChannel: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}