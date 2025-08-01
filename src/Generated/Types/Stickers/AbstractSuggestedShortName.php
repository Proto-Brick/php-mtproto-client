<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stickers;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/stickers.SuggestedShortName
 */
abstract class AbstractSuggestedShortName extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            SuggestedShortName::CONSTRUCTOR_ID => SuggestedShortName::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type stickers.SuggestedShortName: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}