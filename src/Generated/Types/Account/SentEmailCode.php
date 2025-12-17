<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.sentEmailCode
 */
final class SentEmailCode extends TlObject
{
    public const CONSTRUCTOR_ID = 0x811f854f;
    
    public string $predicate = 'account.sentEmailCode';
    
    /**
     * @param string $emailPattern
     * @param int $length
     */
    public function __construct(
        public readonly string $emailPattern,
        public readonly int $length
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emailPattern);
        $buffer .= Serializer::int32($this->length);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $emailPattern = Deserializer::bytes($__payload, $__offset);
        $length = Deserializer::int32($__payload, $__offset);

        return new self(
            $emailPattern,
            $length
        );
    }
}