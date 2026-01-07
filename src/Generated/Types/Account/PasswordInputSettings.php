<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPasswordKdfAlgo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureSecretSettings;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.passwordInputSettings
 */
final class PasswordInputSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc23727c9;
    
    public string $predicate = 'account.passwordInputSettings';
    
    /**
     * @param AbstractPasswordKdfAlgo|null $newAlgo
     * @param string|null $newPasswordHash
     * @param string|null $hint
     * @param string|null $email
     * @param SecureSecretSettings|null $newSecureSettings
     */
    public function __construct(
        public readonly ?AbstractPasswordKdfAlgo $newAlgo = null,
        public readonly ?string $newPasswordHash = null,
        public readonly ?string $hint = null,
        public readonly ?string $email = null,
        public readonly ?SecureSecretSettings $newSecureSettings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->newAlgo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->newPasswordHash !== null) {
            $flags |= (1 << 0);
        }
        if ($this->hint !== null) {
            $flags |= (1 << 0);
        }
        if ($this->email !== null) {
            $flags |= (1 << 1);
        }
        if ($this->newSecureSettings !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->newAlgo->serialize();
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->newPasswordHash);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->hint);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->email);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->newSecureSettings->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $newAlgo = (($flags & (1 << 0)) !== 0) ? AbstractPasswordKdfAlgo::deserialize($__payload, $__offset) : null;
        $newPasswordHash = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $hint = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $email = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $newSecureSettings = (($flags & (1 << 2)) !== 0) ? SecureSecretSettings::deserialize($__payload, $__offset) : null;

        return new self(
            $newAlgo,
            $newPasswordHash,
            $hint,
            $email,
            $newSecureSettings
        );
    }
}