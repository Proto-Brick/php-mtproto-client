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
    public const CONSTRUCTOR_ID = 0xeea8e46e;
    
    public string $_ = 'upload.cdnFileReuploadNeeded';
    
    /**
     * @param string $requestToken
     */
    public function __construct(
        public readonly string $requestToken
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->requestToken);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $requestToken = Deserializer::bytes($stream);
        return new self(
            $requestToken
        );
    }
}