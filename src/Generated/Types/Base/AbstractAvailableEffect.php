<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/AvailableEffect
 */
abstract class AbstractAvailableEffect extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            AvailableEffect::CONSTRUCTOR_ID => AvailableEffect::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type AvailableEffect: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}