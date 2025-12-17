<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputFileLocation
 */
final class InputFileLocation extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0xdfdaabe1;
    
    public string $predicate = 'inputFileLocation';
    
    /**
     * @param int $volumeId
     * @param int $localId
     * @param int $secret
     * @param string $fileReference
     */
    public function __construct(
        public readonly int $volumeId,
        public readonly int $localId,
        public readonly int $secret,
        public readonly string $fileReference
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->volumeId);
        $buffer .= Serializer::int32($this->localId);
        $buffer .= Serializer::int64($this->secret);
        $buffer .= Serializer::bytes($this->fileReference);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $volumeId = Deserializer::int64($__payload, $__offset);
        $localId = Deserializer::int32($__payload, $__offset);
        $secret = Deserializer::int64($__payload, $__offset);
        $fileReference = Deserializer::bytes($__payload, $__offset);

        return new self(
            $volumeId,
            $localId,
            $secret,
            $fileReference
        );
    }
}