<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/payments.ConnectedStarRefBots
 */
abstract class AbstractConnectedStarRefBots extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ConnectedStarRefBots::CONSTRUCTOR_ID => ConnectedStarRefBots::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type payments.ConnectedStarRefBots: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}