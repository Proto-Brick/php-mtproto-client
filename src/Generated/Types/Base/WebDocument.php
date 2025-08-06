<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webDocument
 */
final class WebDocument extends AbstractWebDocument
{
    public const CONSTRUCTOR_ID = 0x1c570ed1;
    
    public string $_ = 'webDocument';
    
    /**
     * @param string $url
     * @param int $accessHash
     * @param int $size
     * @param string $mimeType
     * @param list<AbstractDocumentAttribute> $attributes
     */
    public function __construct(
        public readonly string $url,
        public readonly int $accessHash,
        public readonly int $size,
        public readonly string $mimeType,
        public readonly array $attributes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->int32($this->size);
        $buffer .= $serializer->bytes($this->mimeType);
        $buffer .= $serializer->vectorOfObjects($this->attributes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $accessHash = $deserializer->int64($stream);
        $size = $deserializer->int32($stream);
        $mimeType = $deserializer->bytes($stream);
        $attributes = $deserializer->vectorOfObjects($stream, [AbstractDocumentAttribute::class, 'deserialize']);
        return new self(
            $url,
            $accessHash,
            $size,
            $mimeType,
            $attributes
        );
    }
}