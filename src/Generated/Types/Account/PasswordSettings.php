<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\SecureSecretSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.passwordSettings
 */
final class PasswordSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9a5c33e5;
    
    public string $_ = 'account.passwordSettings';
    
    /**
     * @param string|null $email
     * @param SecureSecretSettings|null $secureSettings
     */
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?SecureSecretSettings $secureSettings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->email !== null) $flags |= (1 << 0);
        if ($this->secureSettings !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->email);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->secureSettings->serialize();
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

        $email = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $secureSettings = ($flags & (1 << 1)) ? SecureSecretSettings::deserialize($stream) : null;
        return new self(
            $email,
            $secureSettings
        );
    }
}