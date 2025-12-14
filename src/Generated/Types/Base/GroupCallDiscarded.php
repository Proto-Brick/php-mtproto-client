<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/groupCallDiscarded
 */
final class GroupCallDiscarded extends AbstractGroupCall
{
    public const CONSTRUCTOR_ID = 0x7780bcb4;
    
    public string $predicate = 'groupCallDiscarded';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $duration
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $duration
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->duration);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $accessHash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $duration = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $id,
            $accessHash,
            $duration
        );
    }
}