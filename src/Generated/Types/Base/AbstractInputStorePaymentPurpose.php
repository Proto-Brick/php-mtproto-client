<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputStorePaymentPurpose
 */
abstract class AbstractInputStorePaymentPurpose extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputStorePaymentPremiumSubscription::CONSTRUCTOR_ID => InputStorePaymentPremiumSubscription::deserialize($deserializer, $stream),
            InputStorePaymentGiftPremium::CONSTRUCTOR_ID => InputStorePaymentGiftPremium::deserialize($deserializer, $stream),
            InputStorePaymentPremiumGiftCode::CONSTRUCTOR_ID => InputStorePaymentPremiumGiftCode::deserialize($deserializer, $stream),
            InputStorePaymentPremiumGiveaway::CONSTRUCTOR_ID => InputStorePaymentPremiumGiveaway::deserialize($deserializer, $stream),
            InputStorePaymentStarsTopup::CONSTRUCTOR_ID => InputStorePaymentStarsTopup::deserialize($deserializer, $stream),
            InputStorePaymentStarsGift::CONSTRUCTOR_ID => InputStorePaymentStarsGift::deserialize($deserializer, $stream),
            InputStorePaymentStarsGiveaway::CONSTRUCTOR_ID => InputStorePaymentStarsGiveaway::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputStorePaymentPurpose: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}