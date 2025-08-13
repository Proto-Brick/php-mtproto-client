<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputStorePaymentPurpose
 */
abstract class AbstractInputStorePaymentPurpose extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputStorePaymentPremiumSubscription::CONSTRUCTOR_ID => InputStorePaymentPremiumSubscription::deserialize($stream),
            InputStorePaymentGiftPremium::CONSTRUCTOR_ID => InputStorePaymentGiftPremium::deserialize($stream),
            InputStorePaymentPremiumGiftCode::CONSTRUCTOR_ID => InputStorePaymentPremiumGiftCode::deserialize($stream),
            InputStorePaymentPremiumGiveaway::CONSTRUCTOR_ID => InputStorePaymentPremiumGiveaway::deserialize($stream),
            InputStorePaymentStarsTopup::CONSTRUCTOR_ID => InputStorePaymentStarsTopup::deserialize($stream),
            InputStorePaymentStarsGift::CONSTRUCTOR_ID => InputStorePaymentStarsGift::deserialize($stream),
            InputStorePaymentStarsGiveaway::CONSTRUCTOR_ID => InputStorePaymentStarsGiveaway::deserialize($stream),
            InputStorePaymentAuthCode::CONSTRUCTOR_ID => InputStorePaymentAuthCode::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputStorePaymentPurpose. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}