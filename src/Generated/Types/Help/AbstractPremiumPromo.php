<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/help.PremiumPromo
 */
abstract class AbstractPremiumPromo extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PremiumPromo::CONSTRUCTOR_ID => PremiumPromo::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type help.PremiumPromo: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}