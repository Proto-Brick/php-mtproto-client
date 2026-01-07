<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Upload;

use ProtoBrick\MTProtoClient\Generated\Types\Storage\FileType;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/upload.webFile
 */
final class WebFile extends TlObject
{
    public const CONSTRUCTOR_ID = 0x21e753bc;
    
    public string $predicate = 'upload.webFile';
    
    /**
     * @param int $size
     * @param string $mimeType
     * @param FileType $fileType
     * @param int $mtime
     * @param string $bytes
     */
    public function __construct(
        public readonly int $size,
        public readonly string $mimeType,
        public readonly FileType $fileType,
        public readonly int $mtime,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->size);
        $buffer .= Serializer::bytes($this->mimeType);
        $buffer .= $this->fileType->serialize();
        $buffer .= Serializer::int32($this->mtime);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $size = Deserializer::int32($__payload, $__offset);
        $mimeType = Deserializer::bytes($__payload, $__offset);
        $fileType = FileType::deserialize($__payload, $__offset);
        $mtime = Deserializer::int32($__payload, $__offset);
        $bytes = Deserializer::bytes($__payload, $__offset);

        return new self(
            $size,
            $mimeType,
            $fileType,
            $mtime,
            $bytes
        );
    }
}