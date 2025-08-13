<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webDocumentNoProxy
 */
final class WebDocumentNoProxy extends AbstractWebDocument
{
    public const CONSTRUCTOR_ID = 0xf9c8bcc6;
    
    public string $predicate = 'webDocumentNoProxy';
    
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
        Deserializer::int32($stream); // Constructor ID
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