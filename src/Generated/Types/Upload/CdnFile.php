<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Upload;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/upload.cdnFile
 */
final class CdnFile extends AbstractCdnFile
{
    public const CONSTRUCTOR_ID = 0xa99fca4f;
    
    public string $predicate = 'upload.cdnFile';
    
    /**
     * @param string $bytes
     */
    public function __construct(
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $bytes = Deserializer::bytes($stream);

        return new self(
            $bytes
        );
    }
}