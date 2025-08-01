<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/payments.CheckedGiftCode
 */
abstract class AbstractCheckedGiftCode extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            CheckedGiftCode::CONSTRUCTOR_ID => CheckedGiftCode::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type payments.CheckedGiftCode: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}