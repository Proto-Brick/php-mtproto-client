<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/help.PromoData
 */
abstract class AbstractPromoData extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PromoDataEmpty::CONSTRUCTOR_ID => PromoDataEmpty::deserialize($deserializer, $stream),
            PromoData::CONSTRUCTOR_ID => PromoData::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type help.PromoData: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}