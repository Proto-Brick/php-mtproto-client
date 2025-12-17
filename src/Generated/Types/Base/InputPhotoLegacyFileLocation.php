<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPhotoLegacyFileLocation
 */
final class InputPhotoLegacyFileLocation extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0xd83466f3;
    
    public string $predicate = 'inputPhotoLegacyFileLocation';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     * @param int $volumeId
     * @param int $localId
     * @param int $secret
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference,
        public readonly int $volumeId,
        public readonly int $localId,
        public readonly int $secret
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->fileReference);
        $buffer .= Serializer::int64($this->volumeId);
        $buffer .= Serializer::int32($this->localId);
        $buffer .= Serializer::int64($this->secret);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $fileReference = Deserializer::bytes($__payload, $__offset);
        $volumeId = Deserializer::int64($__payload, $__offset);
        $localId = Deserializer::int32($__payload, $__offset);
        $secret = Deserializer::int64($__payload, $__offset);

        return new self(
            $id,
            $accessHash,
            $fileReference,
            $volumeId,
            $localId,
            $secret
        );
    }
}