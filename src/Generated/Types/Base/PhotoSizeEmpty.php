<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/photoSizeEmpty
 */
final class PhotoSizeEmpty extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 0xe17e23c;
    
    public string $predicate = 'photoSizeEmpty';
    
    /**
     * @param string $type
     */
    public function __construct(
        public readonly string $type
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->type);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $type = Deserializer::bytes($stream);

        return new self(
            $type
        );
    }
}