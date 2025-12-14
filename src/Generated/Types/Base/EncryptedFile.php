<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/encryptedFile
 */
final class EncryptedFile extends AbstractEncryptedFile
{
    public const CONSTRUCTOR_ID = 0xa8008cd8;
    
    public string $predicate = 'encryptedFile';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $size
     * @param int $dcId
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $size,
        public readonly int $dcId,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int64($this->size);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::int32($this->keyFingerprint);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $accessHash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $size = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $dcId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $keyFingerprint = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $id,
            $accessHash,
            $size,
            $dcId,
            $keyFingerprint
        );
    }
}