<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureRequiredType;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureValueError;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.authorizationForm
 */
final class AuthorizationForm extends TlObject
{
    public const CONSTRUCTOR_ID = 0xad2e1cd8;
    
    public string $_ = 'account.authorizationForm';
    
    /**
     * @param list<AbstractSecureRequiredType> $requiredTypes
     * @param list<SecureValue> $values
     * @param list<AbstractSecureValueError> $errors
     * @param list<AbstractUser> $users
     * @param string|null $privacyPolicyUrl
     */
    public function __construct(
        public readonly array $requiredTypes,
        public readonly array $values,
        public readonly array $errors,
        public readonly array $users,
        public readonly ?string $privacyPolicyUrl = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->privacyPolicyUrl !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->requiredTypes);
        $buffer .= $serializer->vectorOfObjects($this->values);
        $buffer .= $serializer->vectorOfObjects($this->errors);
        $buffer .= $serializer->vectorOfObjects($this->users);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->privacyPolicyUrl);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $requiredTypes = $deserializer->vectorOfObjects($stream, [AbstractSecureRequiredType::class, 'deserialize']);
        $values = $deserializer->vectorOfObjects($stream, [SecureValue::class, 'deserialize']);
        $errors = $deserializer->vectorOfObjects($stream, [AbstractSecureValueError::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $privacyPolicyUrl = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        return new self(
            $requiredTypes,
            $values,
            $errors,
            $users,
            $privacyPolicyUrl
        );
    }
}