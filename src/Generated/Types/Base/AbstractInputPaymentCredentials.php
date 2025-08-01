<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputPaymentCredentials
 */
abstract class AbstractInputPaymentCredentials extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputPaymentCredentialsSaved::CONSTRUCTOR_ID => InputPaymentCredentialsSaved::deserialize($deserializer, $stream),
            InputPaymentCredentials::CONSTRUCTOR_ID => InputPaymentCredentials::deserialize($deserializer, $stream),
            InputPaymentCredentialsApplePay::CONSTRUCTOR_ID => InputPaymentCredentialsApplePay::deserialize($deserializer, $stream),
            InputPaymentCredentialsGooglePay::CONSTRUCTOR_ID => InputPaymentCredentialsGooglePay::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputPaymentCredentials: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}