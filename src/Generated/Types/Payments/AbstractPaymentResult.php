<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/payments.PaymentResult
 */
abstract class AbstractPaymentResult extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PaymentResult::CONSTRUCTOR_ID => PaymentResult::deserialize($deserializer, $stream),
            PaymentVerificationNeeded::CONSTRUCTOR_ID => PaymentVerificationNeeded::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type payments.PaymentResult: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}