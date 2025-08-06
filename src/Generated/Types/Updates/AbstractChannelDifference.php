<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/updates.ChannelDifference
 */
abstract class AbstractChannelDifference extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            ChannelDifferenceEmpty::CONSTRUCTOR_ID => ChannelDifferenceEmpty::deserialize($deserializer, $stream),
            ChannelDifferenceTooLong::CONSTRUCTOR_ID => ChannelDifferenceTooLong::deserialize($deserializer, $stream),
            ChannelDifference::CONSTRUCTOR_ID => ChannelDifference::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type updates.ChannelDifference. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}