<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Base\FileHash;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/upload.fileCdnRedirect
 */
final class FileCdnRedirect extends AbstractFile
{
    public const CONSTRUCTOR_ID = 0xf18cda44;
    
    public string $_ = 'upload.fileCdnRedirect';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->dcId);
        $buffer .= $serializer->bytes($this->fileToken);
        $buffer .= $serializer->bytes($this->encryptionKey);
        $buffer .= $serializer->bytes($this->encryptionIv);
        $buffer .= $serializer->vectorOfObjects($this->fileHashes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $dcId = $deserializer->int32($stream);
        $fileToken = $deserializer->bytes($stream);
        $encryptionKey = $deserializer->bytes($stream);
        $encryptionIv = $deserializer->bytes($stream);
        $fileHashes = $deserializer->vectorOfObjects($stream, [FileHash::class, 'deserialize']);
        return new self(
            $dcId,
            $fileToken,
            $encryptionKey,
            $encryptionIv,
            $fileHashes
        );
    }
}