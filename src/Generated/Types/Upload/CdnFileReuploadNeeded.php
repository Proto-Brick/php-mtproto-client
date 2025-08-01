<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Upload;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/upload.cdnFileReuploadNeeded
 */
final class CdnFileReuploadNeeded extends AbstractCdnFile
{
    public const CONSTRUCTOR_ID = 4004045934;
    
    public string $_ = 'upload.cdnFileReuploadNeeded';
    
    /**
     * @param string $requestToken
     */
    public function __construct(
        public readonly string $requestToken
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->requestToken);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $requestToken = $deserializer->bytes($stream);
            return new self(
            $requestToken
        );
    }
}