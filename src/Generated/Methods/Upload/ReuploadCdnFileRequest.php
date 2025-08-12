<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Base\FileHash;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/upload.reuploadCdnFile
 */
final class ReuploadCdnFileRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9b2754a8;
    
    public string $predicate = 'upload.reuploadCdnFile';
    
    public function getMethodName(): string
    {
        return 'upload.reuploadCdnFile';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . FileHash::class . '>';
    }
    /**
     * @param string $fileToken
     * @param string $requestToken
     */
    public function __construct(
        public readonly string $fileToken,
        public readonly string $requestToken
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->fileToken);
        $buffer .= Serializer::bytes($this->requestToken);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}