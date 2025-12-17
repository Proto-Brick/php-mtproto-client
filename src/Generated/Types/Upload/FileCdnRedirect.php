<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Upload;

use ProtoBrick\MTProtoClient\Generated\Types\Base\FileHash;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/upload.fileCdnRedirect
 */
final class FileCdnRedirect extends AbstractFile
{
    public const CONSTRUCTOR_ID = 0xf18cda44;
    
    public string $predicate = 'upload.fileCdnRedirect';
    
    /**
     * @param int $dcId
     * @param string $fileToken
     * @param string $encryptionKey
     * @param string $encryptionIv
     * @param list<FileHash> $fileHashes
     */
    public function __construct(
        public readonly int $dcId,
        public readonly string $fileToken,
        public readonly string $encryptionKey,
        public readonly string $encryptionIv,
        public readonly array $fileHashes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::bytes($this->fileToken);
        $buffer .= Serializer::bytes($this->encryptionKey);
        $buffer .= Serializer::bytes($this->encryptionIv);
        $buffer .= Serializer::vectorOfObjects($this->fileHashes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $dcId = Deserializer::int32($__payload, $__offset);
        $fileToken = Deserializer::bytes($__payload, $__offset);
        $encryptionKey = Deserializer::bytes($__payload, $__offset);
        $encryptionIv = Deserializer::bytes($__payload, $__offset);
        $fileHashes = Deserializer::vectorOfObjects($__payload, $__offset, [FileHash::class, 'deserialize']);

        return new self(
            $dcId,
            $fileToken,
            $encryptionKey,
            $encryptionIv,
            $fileHashes
        );
    }
}