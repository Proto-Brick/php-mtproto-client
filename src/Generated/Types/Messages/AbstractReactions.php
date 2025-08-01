<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.Reactions
 */
abstract class AbstractReactions extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ReactionsNotModified::CONSTRUCTOR_ID => ReactionsNotModified::deserialize($deserializer, $stream),
            Reactions::CONSTRUCTOR_ID => Reactions::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type messages.Reactions: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}