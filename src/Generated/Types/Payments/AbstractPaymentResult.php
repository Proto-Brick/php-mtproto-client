<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/payments.PaymentResult
 */
abstract class AbstractPaymentResult extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            PaymentResult::CONSTRUCTOR_ID => PaymentResult::deserialize($stream),
            PaymentVerificationNeeded::CONSTRUCTOR_ID => PaymentVerificationNeeded::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type payments.PaymentResult. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}