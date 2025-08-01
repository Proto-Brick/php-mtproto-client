<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/payments.SuggestedStarRefBots
 */
abstract class AbstractSuggestedStarRefBots extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            SuggestedStarRefBots::CONSTRUCTOR_ID => SuggestedStarRefBots::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type payments.SuggestedStarRefBots: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}