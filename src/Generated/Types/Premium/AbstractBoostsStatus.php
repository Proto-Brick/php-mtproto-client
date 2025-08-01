<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Premium;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/premium.BoostsStatus
 */
abstract class AbstractBoostsStatus extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            BoostsStatus::CONSTRUCTOR_ID => BoostsStatus::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type premium.BoostsStatus: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}