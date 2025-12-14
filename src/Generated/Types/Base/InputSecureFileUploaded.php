<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputSecureFileUploaded
 */
final class InputSecureFileUploaded extends AbstractInputSecureFile
{
    public const CONSTRUCTOR_ID = 0x3334b0f0;
    
    public string $predicate = 'inputSecureFileUploaded';
    
    /**
     * @param int $id
     * @param int $parts
     * @param string $md5Checksum
     * @param string $fileHash
     * @param string $secret
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly string $md5Checksum,
        public readonly string $fileHash,
        public readonly string $secret
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($this->parts);
        $buffer .= Serializer::bytes($this->md5Checksum);
        $buffer .= Serializer::bytes($this->fileHash);
        $buffer .= Serializer::bytes($this->secret);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $parts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $md5Checksum = Deserializer::bytes($stream);
        $fileHash = Deserializer::bytes($stream);
        $secret = Deserializer::bytes($stream);

        return new self(
            $id,
            $parts,
            $md5Checksum,
            $fileHash,
            $secret
        );
    }
}