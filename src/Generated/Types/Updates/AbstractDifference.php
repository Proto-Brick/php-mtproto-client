<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/updates.Difference
 */
abstract class AbstractDifference extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            DifferenceEmpty::CONSTRUCTOR_ID => DifferenceEmpty::deserialize($deserializer, $stream),
            Difference::CONSTRUCTOR_ID => Difference::deserialize($deserializer, $stream),
            DifferenceSlice::CONSTRUCTOR_ID => DifferenceSlice::deserialize($deserializer, $stream),
            DifferenceTooLong::CONSTRUCTOR_ID => DifferenceTooLong::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type updates.Difference: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}