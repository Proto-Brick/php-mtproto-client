<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/auth.exportedAuthorization
 */
final class ExportedAuthorization extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb434e2b8;
    
    public string $predicate = 'auth.exportedAuthorization';
    
    /**
     * @param int $id
     * @param string $bytes
     */
    public function __construct(
        public readonly int $id,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::int64($__payload, $__offset);
        $bytes = Deserializer::bytes($__payload, $__offset);

        return new self(
            $id,
            $bytes
        );
    }
}