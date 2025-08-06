<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/Updates
 */
abstract class AbstractUpdates extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            UpdatesTooLong::CONSTRUCTOR_ID => UpdatesTooLong::deserialize($deserializer, $stream),
            UpdateShortMessage::CONSTRUCTOR_ID => UpdateShortMessage::deserialize($deserializer, $stream),
            UpdateShortChatMessage::CONSTRUCTOR_ID => UpdateShortChatMessage::deserialize($deserializer, $stream),
            UpdateShort::CONSTRUCTOR_ID => UpdateShort::deserialize($deserializer, $stream),
            UpdatesCombined::CONSTRUCTOR_ID => UpdatesCombined::deserialize($deserializer, $stream),
            Updates::CONSTRUCTOR_ID => Updates::deserialize($deserializer, $stream),
            UpdateShortSentMessage::CONSTRUCTOR_ID => UpdateShortSentMessage::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type Updates. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}