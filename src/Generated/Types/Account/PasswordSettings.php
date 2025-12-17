<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureSecretSettings;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.passwordSettings
 */
final class PasswordSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9a5c33e5;
    
    public string $predicate = 'account.passwordSettings';
    
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
        if ($this->email !== null) {
            $flags |= (1 << 0);
        }
        if ($this->secureSettings !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->email);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->secureSettings->serialize();
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
        $email = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $secureSettings = (($flags & (1 << 1)) !== 0) ? SecureSecretSettings::deserialize($__payload, $__offset) : null;

        return new self(
            $email,
            $secureSettings
        );
    }
}