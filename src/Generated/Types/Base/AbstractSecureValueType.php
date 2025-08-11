<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/SecureValueType
 */
abstract class AbstractSecureValueType extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            SecureValueTypePersonalDetails::CONSTRUCTOR_ID => SecureValueTypePersonalDetails::deserialize($stream),
            SecureValueTypePassport::CONSTRUCTOR_ID => SecureValueTypePassport::deserialize($stream),
            SecureValueTypeDriverLicense::CONSTRUCTOR_ID => SecureValueTypeDriverLicense::deserialize($stream),
            SecureValueTypeIdentityCard::CONSTRUCTOR_ID => SecureValueTypeIdentityCard::deserialize($stream),
            SecureValueTypeInternalPassport::CONSTRUCTOR_ID => SecureValueTypeInternalPassport::deserialize($stream),
            SecureValueTypeAddress::CONSTRUCTOR_ID => SecureValueTypeAddress::deserialize($stream),
            SecureValueTypeUtilityBill::CONSTRUCTOR_ID => SecureValueTypeUtilityBill::deserialize($stream),
            SecureValueTypeBankStatement::CONSTRUCTOR_ID => SecureValueTypeBankStatement::deserialize($stream),
            SecureValueTypeRentalAgreement::CONSTRUCTOR_ID => SecureValueTypeRentalAgreement::deserialize($stream),
            SecureValueTypePassportRegistration::CONSTRUCTOR_ID => SecureValueTypePassportRegistration::deserialize($stream),
            SecureValueTypeTemporaryRegistration::CONSTRUCTOR_ID => SecureValueTypeTemporaryRegistration::deserialize($stream),
            SecureValueTypePhone::CONSTRUCTOR_ID => SecureValueTypePhone::deserialize($stream),
            SecureValueTypeEmail::CONSTRUCTOR_ID => SecureValueTypeEmail::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type SecureValueType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}