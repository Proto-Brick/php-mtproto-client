<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.tmpPassword
 */
final class TmpPassword extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdb64fd34;
    
    public string $predicate = 'account.tmpPassword';
    
    /**
     * @param string $tmpPassword
     * @param int $validUntil
     */
    public function __construct(
        public readonly string $tmpPassword,
        public readonly int $validUntil
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->tmpPassword);
        $buffer .= Serializer::int32($this->validUntil);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $tmpPassword = Deserializer::bytes($__payload, $__offset);
        $validUntil = Deserializer::int32($__payload, $__offset);

        return new self(
            $tmpPassword,
            $validUntil
        );
    }
}