<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPasswordKdfAlgo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureSecretSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.passwordInputSettings
 */
final class PasswordInputSettings extends AbstractPasswordInputSettings
{
    public const CONSTRUCTOR_ID = 3258394569;
    
    public string $_ = 'account.passwordInputSettings';
    
    /**
     * @param AbstractPasswordKdfAlgo|null $newAlgo
     * @param string|null $newPasswordHash
     * @param string|null $hint
     * @param string|null $email
     * @param AbstractSecureSecretSettings|null $newSecureSettings
     */
    public function __construct(
        public readonly ?AbstractPasswordKdfAlgo $newAlgo = null,
        public readonly ?string $newPasswordHash = null,
        public readonly ?string $hint = null,
        public readonly ?string $email = null,
        public readonly ?AbstractSecureSecretSettings $newSecureSettings = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->newAlgo !== null) $flags |= (1 << 0);
        if ($this->newPasswordHash !== null) $flags |= (1 << 0);
        if ($this->hint !== null) $flags |= (1 << 0);
        if ($this->email !== null) $flags |= (1 << 1);
        if ($this->newSecureSettings !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->newAlgo->serialize($serializer);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->newPasswordHash);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->hint);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->email);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->newSecureSettings->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $newAlgo = ($flags & (1 << 0)) ? AbstractPasswordKdfAlgo::deserialize($deserializer, $stream) : null;
        $newPasswordHash = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $hint = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $email = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $newSecureSettings = ($flags & (1 << 2)) ? AbstractSecureSecretSettings::deserialize($deserializer, $stream) : null;
            return new self(
            $newAlgo,
            $newPasswordHash,
            $hint,
            $email,
            $newSecureSettings
        );
    }
}