<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Base\FileHash;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/upload.getCdnFileHashes
 */
final class GetCdnFileHashesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x91dc3f31;
    
    public string $_ = 'upload.getCdnFileHashes';
    
    public function getMethodName(): string
    {
        return 'upload.getCdnFileHashes';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . FileHash::class . '>';
    }
    /**
     * @param string $fileToken
     * @param int $offset
     */
    public function __construct(
        public readonly string $fileToken,
        public readonly int $offset
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->fileToken);
        $buffer .= $serializer->int64($this->offset);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}