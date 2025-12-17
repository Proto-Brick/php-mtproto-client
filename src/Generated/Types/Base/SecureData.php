<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/secureData
 */
final class SecureData extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8aeabec3;
    
    public string $predicate = 'secureData';
    
    /**
     * @param string $data
     * @param string $dataHash
     * @param string $secret
     */
    public function __construct(
        public readonly string $data,
        public readonly string $dataHash,
        public readonly string $secret
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->data);
        $buffer .= Serializer::bytes($this->dataHash);
        $buffer .= Serializer::bytes($this->secret);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $data = Deserializer::bytes($__payload, $__offset);
        $dataHash = Deserializer::bytes($__payload, $__offset);
        $secret = Deserializer::bytes($__payload, $__offset);

        return new self(
            $data,
            $dataHash,
            $secret
        );
    }
}