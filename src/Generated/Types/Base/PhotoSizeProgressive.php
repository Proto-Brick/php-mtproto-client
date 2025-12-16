<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/photoSizeProgressive
 */
final class PhotoSizeProgressive extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 0xfa3efb95;
    
    public string $predicate = 'photoSizeProgressive';
    
    /**
     * @param string $type
     * @param int $w
     * @param int $h
     * @param list<int> $sizes
     */
    public function __construct(
        public readonly string $type,
        public readonly int $w,
        public readonly int $h,
        public readonly array $sizes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->type);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        $buffer .= Serializer::vectorOfInts($this->sizes);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $type = Deserializer::bytes($stream);
        $w = Deserializer::int32($stream);
        $h = Deserializer::int32($stream);
        $sizes = Deserializer::vectorOfInts($stream);

        return new self(
            $type,
            $w,
            $h,
            $sizes
        );
    }
}