<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/payments.GiveawayInfo
 */
abstract class AbstractGiveawayInfo extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            GiveawayInfo::CONSTRUCTOR_ID => GiveawayInfo::deserialize($deserializer, $stream),
            GiveawayInfoResults::CONSTRUCTOR_ID => GiveawayInfoResults::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type payments.GiveawayInfo: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}