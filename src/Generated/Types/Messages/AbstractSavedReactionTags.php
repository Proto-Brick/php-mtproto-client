<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.SavedReactionTags
 */
abstract class AbstractSavedReactionTags extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            SavedReactionTagsNotModified::CONSTRUCTOR_ID => SavedReactionTagsNotModified::deserialize($deserializer, $stream),
            SavedReactionTags::CONSTRUCTOR_ID => SavedReactionTags::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type messages.SavedReactionTags. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}