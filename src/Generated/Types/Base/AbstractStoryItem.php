<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/StoryItem
 */
abstract class AbstractStoryItem extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            StoryItemDeleted::CONSTRUCTOR_ID => StoryItemDeleted::deserialize($deserializer, $stream),
            StoryItemSkipped::CONSTRUCTOR_ID => StoryItemSkipped::deserialize($deserializer, $stream),
            StoryItem::CONSTRUCTOR_ID => StoryItem::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type StoryItem: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}