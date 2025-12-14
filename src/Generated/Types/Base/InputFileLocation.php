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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $volumeId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $localId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $secret = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $fileReference = Deserializer::bytes($stream);

        return new self(
            $volumeId,
            $localId,
            $secret,
            $fileReference
        );
    }
}