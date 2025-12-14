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
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $size = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $mimeType = Deserializer::bytes($stream);
        $fileType = FileType::deserialize($stream);
        $mtime = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $bytes = Deserializer::bytes($stream);

        return new self(
            $size,
            $mimeType,
            $fileType,
            $mtime,
            $bytes
        );
    }
}