<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputWebDocument
 */
final class InputWebDocument extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9bed434d;
    
    public string $_ = 'inputWebDocument';
    
    /**
     * @param string $url
     * @param int $size
     * @param string $mimeType
     * @param list<AbstractDocumentAttribute> $attributes
     */
    public function __construct(
        public readonly string $url,
        public readonly int $size,
        public readonly string $mimeType,
        public readonly array $attributes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int32($this->size);
        $buffer .= $serializer->bytes($this->mimeType);
        $buffer .= $serializer->vectorOfObjects($this->attributes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $url = $deserializer->bytes($stream);
        $size = $deserializer->int32($stream);
        $mimeType = $deserializer->bytes($stream);
        $attributes = $deserializer->vectorOfObjects($stream, [AbstractDocumentAttribute::class, 'deserialize']);
        return new self(
            $url,
            $size,
            $mimeType,
            $attributes
        );
    }
}