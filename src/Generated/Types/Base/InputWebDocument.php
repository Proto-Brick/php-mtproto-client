<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $url = Deserializer::bytes($__payload, $__offset);
        $size = Deserializer::int32($__payload, $__offset);
        $mimeType = Deserializer::bytes($__payload, $__offset);
        $attributes = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocumentAttribute::class, 'deserialize']);

        return new self(
            $url,
            $size,
            $mimeType,
            $attributes
        );
    }
}