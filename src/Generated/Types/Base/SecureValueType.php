<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use RuntimeException;
use ValueError;

/**
 * @see https://core.telegram.org/type/SecureValueType
 */
enum SecureValueType: int implements TlObjectInterface
{
    case SecureValueTypePersonalDetails = 0x9d2a81e3;
    case SecureValueTypePassport = 0x3dac6a00;
    case SecureValueTypeDriverLicense = 0x6e425c4;
    case SecureValueTypeIdentityCard = 0xa0d0744b;
    case SecureValueTypeInternalPassport = 0x99a48f23;
    case SecureValueTypeAddress = 0xcbe31e26;
    case SecureValueTypeUtilityBill = 0xfc36954e;
    case SecureValueTypeBankStatement = 0x89137c0d;
    case SecureValueTypeRentalAgreement = 0x8b883488;
    case SecureValueTypePassportRegistration = 0x99e3806a;
    case SecureValueTypeTemporaryRegistration = 0xea02ec33;
    case SecureValueTypePhone = 0xb320aadb;
    case SecureValueTypeEmail = 0x8e3ca7ee;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string $__payload, int &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        try {
            return self::from($constructorId);
        } catch (ValueError $e) {
            throw new RuntimeException(sprintf(
                'Unknown constructor ID for enum %s. Received ID: 0x%s (signed: %d)',
                self::class,
                dechex(unpack('V', pack('l', $constructorId))[1]),
                $constructorId
            ), 0, $e);
        }
    }
    
    public function getConstructorId(): int
    {
        return $this->value;
    }
    
    public function getPredicate(): string
    {
        return match($this) {
            self::SecureValueTypePersonalDetails => 'secureValueTypePersonalDetails',
            self::SecureValueTypePassport => 'secureValueTypePassport',
            self::SecureValueTypeDriverLicense => 'secureValueTypeDriverLicense',
            self::SecureValueTypeIdentityCard => 'secureValueTypeIdentityCard',
            self::SecureValueTypeInternalPassport => 'secureValueTypeInternalPassport',
            self::SecureValueTypeAddress => 'secureValueTypeAddress',
            self::SecureValueTypeUtilityBill => 'secureValueTypeUtilityBill',
            self::SecureValueTypeBankStatement => 'secureValueTypeBankStatement',
            self::SecureValueTypeRentalAgreement => 'secureValueTypeRentalAgreement',
            self::SecureValueTypePassportRegistration => 'secureValueTypePassportRegistration',
            self::SecureValueTypeTemporaryRegistration => 'secureValueTypeTemporaryRegistration',
            self::SecureValueTypePhone => 'secureValueTypePhone',
            self::SecureValueTypeEmail => 'secureValueTypeEmail',
        };
    }
}