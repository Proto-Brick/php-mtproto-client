<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/InputStorePaymentPurpose
 */
abstract class AbstractInputStorePaymentPurpose extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xa6751e66 => InputStorePaymentPremiumSubscription::deserialize($__payload, $__offset),
            0x616f7fe8 => InputStorePaymentGiftPremium::deserialize($__payload, $__offset),
            0xfb790393 => InputStorePaymentPremiumGiftCode::deserialize($__payload, $__offset),
            0x160544ca => InputStorePaymentPremiumGiveaway::deserialize($__payload, $__offset),
            0xf9a2a6cb => InputStorePaymentStarsTopup::deserialize($__payload, $__offset),
            0x1d741ef7 => InputStorePaymentStarsGift::deserialize($__payload, $__offset),
            0x751f08fa => InputStorePaymentStarsGiveaway::deserialize($__payload, $__offset),
            0x9bb2636d => InputStorePaymentAuthCode::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputStorePaymentPurpose. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}