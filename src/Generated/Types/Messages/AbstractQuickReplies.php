<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.QuickReplies
 */
abstract class AbstractQuickReplies extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            QuickReplies::CONSTRUCTOR_ID => QuickReplies::deserialize($deserializer, $stream),
            QuickRepliesNotModified::CONSTRUCTOR_ID => QuickRepliesNotModified::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type messages.QuickReplies. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}