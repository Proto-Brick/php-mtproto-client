<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/StoryView
 */
abstract class AbstractStoryView extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            StoryView::CONSTRUCTOR_ID => StoryView::deserialize($deserializer, $stream),
            StoryViewPublicForward::CONSTRUCTOR_ID => StoryViewPublicForward::deserialize($deserializer, $stream),
            StoryViewPublicRepost::CONSTRUCTOR_ID => StoryViewPublicRepost::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type StoryView: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}