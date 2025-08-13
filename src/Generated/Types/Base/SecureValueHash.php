<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/secureValueHash
 */
final class SecureValueHash extends TlObject
{
    public const CONSTRUCTOR_ID = 0xed1ecdb0;
    
    public string $predicate = 'secureValueHash';
    
    /**
     * @param SecureValueType $type
     * @param string $hash
     */
    public function __construct(
        public readonly SecureValueType $type,
        public readonly string $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::bytes($this->hash);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $type = SecureValueType::deserialize($stream);
        $hash = Deserializer::bytes($stream);

        return new self(
            $type,
            $hash
        );
    }
}