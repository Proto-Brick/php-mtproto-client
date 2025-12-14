<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/documentAttributeImageSize
 */
final class DocumentAttributeImageSize extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0x6c37c15c;
    
    public string $predicate = 'documentAttributeImageSize';
    
    /**
     * @param int $w
     * @param int $h
     */
    public function __construct(
        public readonly int $w,
        public readonly int $h
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $w = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $h = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $w,
            $h
        );
    }
}