<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/SecureValueType
 */
abstract class AbstractSecureValueType extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            SecureValueTypePersonalDetails::CONSTRUCTOR_ID => SecureValueTypePersonalDetails::deserialize($deserializer, $stream),
            SecureValueTypePassport::CONSTRUCTOR_ID => SecureValueTypePassport::deserialize($deserializer, $stream),
            SecureValueTypeDriverLicense::CONSTRUCTOR_ID => SecureValueTypeDriverLicense::deserialize($deserializer, $stream),
            SecureValueTypeIdentityCard::CONSTRUCTOR_ID => SecureValueTypeIdentityCard::deserialize($deserializer, $stream),
            SecureValueTypeInternalPassport::CONSTRUCTOR_ID => SecureValueTypeInternalPassport::deserialize($deserializer, $stream),
            SecureValueTypeAddress::CONSTRUCTOR_ID => SecureValueTypeAddress::deserialize($deserializer, $stream),
            SecureValueTypeUtilityBill::CONSTRUCTOR_ID => SecureValueTypeUtilityBill::deserialize($deserializer, $stream),
            SecureValueTypeBankStatement::CONSTRUCTOR_ID => SecureValueTypeBankStatement::deserialize($deserializer, $stream),
            SecureValueTypeRentalAgreement::CONSTRUCTOR_ID => SecureValueTypeRentalAgreement::deserialize($deserializer, $stream),
            SecureValueTypePassportRegistration::CONSTRUCTOR_ID => SecureValueTypePassportRegistration::deserialize($deserializer, $stream),
            SecureValueTypeTemporaryRegistration::CONSTRUCTOR_ID => SecureValueTypeTemporaryRegistration::deserialize($deserializer, $stream),
            SecureValueTypePhone::CONSTRUCTOR_ID => SecureValueTypePhone::deserialize($deserializer, $stream),
            SecureValueTypeEmail::CONSTRUCTOR_ID => SecureValueTypeEmail::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type SecureValueType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}