<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Upload;

use ProtoBrick\MTProtoClient\Generated\Types\Storage\FileType;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/upload.file
 */
final class File extends AbstractFile
{
    public const CONSTRUCTOR_ID = 0x96a18d5;
    
    public string $predicate = 'upload.file';
    
    /**
     * @param FileType $type
     * @param int $mtime
     * @param string $bytes
     */
    public function __construct(
        public readonly FileType $type,
        public readonly int $mtime,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::int32($this->mtime);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $type = FileType::deserialize($stream);
        $mtime = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $bytes = Deserializer::bytes($stream);

        return new self(
            $type,
            $mtime,
            $bytes
        );
    }
}