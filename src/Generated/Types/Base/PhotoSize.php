<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/photoSize
 */
final class PhotoSize extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 0x75c78e60;
    
    public string $predicate = 'photoSize';
    
    /**
     * @param string $type
     * @param int $w
     * @param int $h
     * @param int $size
     */
    public function __construct(
        public readonly string $type,
        public readonly int $w,
        public readonly int $h,
        public readonly int $size
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->type);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        $buffer .= Serializer::int32($this->size);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $type = Deserializer::bytes($stream);
        $w = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $h = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $size = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $type,
            $w,
            $h,
            $size
        );
    }
}