<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/Updates
 */
abstract class AbstractUpdates extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            UpdatesTooLong::CONSTRUCTOR_ID => UpdatesTooLong::deserialize($stream),
            UpdateShortMessage::CONSTRUCTOR_ID => UpdateShortMessage::deserialize($stream),
            UpdateShortChatMessage::CONSTRUCTOR_ID => UpdateShortChatMessage::deserialize($stream),
            UpdateShort::CONSTRUCTOR_ID => UpdateShort::deserialize($stream),
            UpdatesCombined::CONSTRUCTOR_ID => UpdatesCombined::deserialize($stream),
            Updates::CONSTRUCTOR_ID => Updates::deserialize($stream),
            UpdateShortSentMessage::CONSTRUCTOR_ID => UpdateShortSentMessage::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type Updates. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}