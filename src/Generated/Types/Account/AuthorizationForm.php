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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->privacyPolicyUrl !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::vectorOfObjects($this->requiredTypes);
        $buffer .= Serializer::vectorOfObjects($this->values);
        $buffer .= Serializer::vectorOfObjects($this->errors);
        $buffer .= Serializer::vectorOfObjects($this->users);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->privacyPolicyUrl);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $requiredTypes = Deserializer::vectorOfObjects($stream, [AbstractSecureRequiredType::class, 'deserialize']);
        $values = Deserializer::vectorOfObjects($stream, [SecureValue::class, 'deserialize']);
        $errors = Deserializer::vectorOfObjects($stream, [AbstractSecureValueError::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $privacyPolicyUrl = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        return new self(
            $requiredTypes,
            $values,
            $errors,
            $users,
            $privacyPolicyUrl
        );
    }
}