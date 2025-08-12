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
    
    public string $predicate = 'inputWebDocument';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->size);
        $buffer .= Serializer::bytes($this->mimeType);
        $buffer .= Serializer::vectorOfObjects($this->attributes);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $url = Deserializer::bytes($stream);
        $size = Deserializer::int32($stream);
        $mimeType = Deserializer::bytes($stream);
        $attributes = Deserializer::vectorOfObjects($stream, [AbstractDocumentAttribute::class, 'deserialize']);

        return new self(
            $url,
            $size,
            $mimeType,
            $attributes
        );
    }
}