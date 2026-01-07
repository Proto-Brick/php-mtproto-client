<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/auth.passwordRecovery
 */
final class PasswordRecovery extends TlObject
{
    public const CONSTRUCTOR_ID = 0x137948a5;
    
    public string $predicate = 'auth.passwordRecovery';
    
    /**
     * @param string $emailPattern
     */
    public function __construct(
        public readonly string $emailPattern
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emailPattern);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $emailPattern = Deserializer::bytes($__payload, $__offset);

        return new self(
            $emailPattern
        );
    }
}