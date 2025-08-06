<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Upload\AbstractCdnFile;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/upload.getCdnFile
 */
final class GetCdnFileRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x395f69da;
    
    public string $_ = 'upload.getCdnFile';
    
    public function getMethodName(): string
    {
        return 'upload.getCdnFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractCdnFile::class;
    }
    /**
     * @param string $fileToken
     * @param int $offset
     * @param int $limit
     */
    public function __construct(
        public readonly string $fileToken,
        public readonly int $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->fileToken);
        $buffer .= $serializer->int64($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}