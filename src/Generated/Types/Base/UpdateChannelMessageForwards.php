<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannelMessageForwards
 */
final class UpdateChannelMessageForwards extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd29a27f4;
    
    public string $predicate = 'updateChannelMessageForwards';
    
    /**
     * @param int $channelId
     * @param int $id
     * @param int $forwards
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $id,
        public readonly int $forwards
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int32($this->forwards);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $channelId = Deserializer::int64($__payload, $__offset);
        $id = Deserializer::int32($__payload, $__offset);
        $forwards = Deserializer::int32($__payload, $__offset);

        return new self(
            $channelId,
            $id,
            $forwards
        );
    }
}