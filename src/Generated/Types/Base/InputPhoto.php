<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPhoto
 */
final class InputPhoto extends AbstractInputPhoto
{
    public const CONSTRUCTOR_ID = 0x3bb3b94a;
    
    public string $predicate = 'inputPhoto';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->fileReference);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $fileReference = Deserializer::bytes($__payload, $__offset);

        return new self(
            $id,
            $accessHash,
            $fileReference
        );
    }
}