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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $duration = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $accessHash,
            $duration
        );
    }
}