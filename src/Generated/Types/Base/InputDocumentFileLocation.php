<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputDocumentFileLocation
 */
final class InputDocumentFileLocation extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0xbad07584;
    
    public string $predicate = 'inputDocumentFileLocation';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     * @param string $thumbSize
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference,
        public readonly string $thumbSize
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->fileReference);
        $buffer .= Serializer::bytes($this->thumbSize);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $fileReference = Deserializer::bytes($__payload, $__offset);
        $thumbSize = Deserializer::bytes($__payload, $__offset);

        return new self(
            $id,
            $accessHash,
            $fileReference,
            $thumbSize
        );
    }
}