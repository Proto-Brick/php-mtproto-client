<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Upload;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/upload.cdnFileReuploadNeeded
 */
final class CdnFileReuploadNeeded extends AbstractCdnFile
{
    public const CONSTRUCTOR_ID = 0xeea8e46e;
    
    public string $predicate = 'upload.cdnFileReuploadNeeded';
    
    /**
     * @param string $requestToken
     */
    public function __construct(
        public readonly string $requestToken
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->requestToken);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $requestToken = Deserializer::bytes($__payload, $__offset);

        return new self(
            $requestToken
        );
    }
}