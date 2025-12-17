<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputEncryptedFileBigUploaded
 */
final class InputEncryptedFileBigUploaded extends AbstractInputEncryptedFile
{
    public const CONSTRUCTOR_ID = 0x2dc173c8;
    
    public string $predicate = 'inputEncryptedFileBigUploaded';
    
    /**
     * @param int $id
     * @param int $parts
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($this->parts);
        $buffer .= Serializer::int32($this->keyFingerprint);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $parts = Deserializer::int32($__payload, $__offset);
        $keyFingerprint = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $parts,
            $keyFingerprint
        );
    }
}