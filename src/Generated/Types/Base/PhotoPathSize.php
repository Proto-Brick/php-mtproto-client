<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/photoPathSize
 */
final class PhotoPathSize extends AbstractPhotoSize
{
    public const CONSTRUCTOR_ID = 0xd8214d41;
    
    public string $predicate = 'photoPathSize';
    
    /**
     * @param string $type
     * @param string $bytes
     */
    public function __construct(
        public readonly string $type,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->type);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $type = Deserializer::bytes($stream);
        $bytes = Deserializer::bytes($stream);

        return new self(
            $type,
            $bytes
        );
    }
}