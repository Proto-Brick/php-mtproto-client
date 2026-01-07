<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/secureFile
 */
final class SecureFile extends AbstractSecureFile
{
    public const CONSTRUCTOR_ID = 0x7d09c27e;
    
    public string $predicate = 'secureFile';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $size
     * @param int $dcId
     * @param int $date
     * @param string $fileHash
     * @param string $secret
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $size,
        public readonly int $dcId,
        public readonly int $date,
        public readonly string $fileHash,
        public readonly string $secret
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int64($this->size);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->fileHash);
        $buffer .= Serializer::bytes($this->secret);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $size = Deserializer::int64($__payload, $__offset);
        $dcId = Deserializer::int32($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $fileHash = Deserializer::bytes($__payload, $__offset);
        $secret = Deserializer::bytes($__payload, $__offset);

        return new self(
            $id,
            $accessHash,
            $size,
            $dcId,
            $date,
            $fileHash,
            $secret
        );
    }
}