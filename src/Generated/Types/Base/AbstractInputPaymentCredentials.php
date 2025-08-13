<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputPaymentCredentials
 */
abstract class AbstractInputPaymentCredentials extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xc10eb2cf => InputPaymentCredentialsSaved::deserialize($stream),
            0x3417d728 => InputPaymentCredentials::deserialize($stream),
            0xaa1c39f => InputPaymentCredentialsApplePay::deserialize($stream),
            0x8ac32801 => InputPaymentCredentialsGooglePay::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputPaymentCredentials. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}