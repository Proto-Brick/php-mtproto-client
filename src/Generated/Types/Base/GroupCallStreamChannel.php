<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/groupCallStreamChannel
 */
final class GroupCallStreamChannel extends TlObject
{
    public const CONSTRUCTOR_ID = 0x80eb48af;
    
    public string $predicate = 'groupCallStreamChannel';
    
    /**
     * @param int $channel
     * @param int $scale
     * @param int $lastTimestampMs
     */
    public function __construct(
        public readonly int $channel,
        public readonly int $scale,
        public readonly int $lastTimestampMs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->channel);
        $buffer .= Serializer::int32($this->scale);
        $buffer .= Serializer::int64($this->lastTimestampMs);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $channel = Deserializer::int32($__payload, $__offset);
        $scale = Deserializer::int32($__payload, $__offset);
        $lastTimestampMs = Deserializer::int64($__payload, $__offset);

        return new self(
            $channel,
            $scale,
            $lastTimestampMs
        );
    }
}