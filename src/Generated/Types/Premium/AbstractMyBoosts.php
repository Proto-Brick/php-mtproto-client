<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Premium;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/premium.MyBoosts
 */
abstract class AbstractMyBoosts extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            MyBoosts::CONSTRUCTOR_ID => MyBoosts::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type premium.MyBoosts: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}