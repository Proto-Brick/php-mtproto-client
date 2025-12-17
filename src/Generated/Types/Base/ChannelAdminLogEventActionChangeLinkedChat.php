<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeLinkedChat
 */
final class ChannelAdminLogEventActionChangeLinkedChat extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x50c7ac8;
    
    public string $predicate = 'channelAdminLogEventActionChangeLinkedChat';
    
    /**
     * @param int $prevValue
     * @param int $newValue
     */
    public function __construct(
        public readonly int $prevValue,
        public readonly int $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->prevValue);
        $buffer .= Serializer::int64($this->newValue);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $prevValue = Deserializer::int64($__payload, $__offset);
        $newValue = Deserializer::int64($__payload, $__offset);

        return new self(
            $prevValue,
            $newValue
        );
    }
}