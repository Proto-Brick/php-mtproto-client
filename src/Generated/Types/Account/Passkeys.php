<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\Passkey;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.passkeys
 */
final class Passkeys extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf8e0aa1c;
    
    public string $predicate = 'account.passkeys';
    
    /**
     * @param list<Passkey> $passkeys
     */
    public function __construct(
        public readonly array $passkeys
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->passkeys);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $passkeys = Deserializer::vectorOfObjects($__payload, $__offset, [Passkey::class, 'deserialize']);

        return new self(
            $passkeys
        );
    }
}