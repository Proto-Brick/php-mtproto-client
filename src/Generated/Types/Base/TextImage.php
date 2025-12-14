<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/textImage
 */
final class TextImage extends AbstractRichText
{
    public const CONSTRUCTOR_ID = 0x81ccf4f;
    
    public string $predicate = 'textImage';
    
    /**
     * @param int $documentId
     * @param int $w
     * @param int $h
     */
    public function __construct(
        public readonly int $documentId,
        public readonly int $w,
        public readonly int $h
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->documentId);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $documentId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $w = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $h = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $documentId,
            $w,
            $h
        );
    }
}