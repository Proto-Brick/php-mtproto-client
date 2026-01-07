<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputEncryptedFileUploaded
 */
final class InputEncryptedFileUploaded extends AbstractInputEncryptedFile
{
    public const CONSTRUCTOR_ID = 0x64bd0306;
    
    public string $predicate = 'inputEncryptedFileUploaded';
    
    /**
     * @param int $id
     * @param int $parts
     * @param string $md5Checksum
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly string $md5Checksum,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($this->parts);
        $buffer .= Serializer::bytes($this->md5Checksum);
        $buffer .= Serializer::int32($this->keyFingerprint);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $parts = Deserializer::int32($__payload, $__offset);
        $md5Checksum = Deserializer::bytes($__payload, $__offset);
        $keyFingerprint = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $parts,
            $md5Checksum,
            $keyFingerprint
        );
    }
}