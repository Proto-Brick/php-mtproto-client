<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.FavedStickers
 */
abstract class AbstractFavedStickers extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            FavedStickersNotModified::CONSTRUCTOR_ID => FavedStickersNotModified::deserialize($deserializer, $stream),
            FavedStickers::CONSTRUCTOR_ID => FavedStickers::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type messages.FavedStickers: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}