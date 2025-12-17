<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/updates.state
 */
final class State extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa56c2a3e;
    
    public string $predicate = 'updates.state';
    
    /**
     * @param int $pts
     * @param int $qts
     * @param int $date
     * @param int $seq
     * @param int $unreadCount
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $qts,
        public readonly int $date,
        public readonly int $seq,
        public readonly int $unreadCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->qts);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->seq);
        $buffer .= Serializer::int32($this->unreadCount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $pts = Deserializer::int32($__payload, $__offset);
        $qts = Deserializer::int32($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $seq = Deserializer::int32($__payload, $__offset);
        $unreadCount = Deserializer::int32($__payload, $__offset);

        return new self(
            $pts,
            $qts,
            $date,
            $seq,
            $unreadCount
        );
    }
}