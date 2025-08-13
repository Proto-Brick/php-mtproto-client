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
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $channel = Deserializer::int32($stream);
        $scale = Deserializer::int32($stream);
        $lastTimestampMs = Deserializer::int64($stream);

        return new self(
            $channel,
            $scale,
            $lastTimestampMs
        );
    }
}