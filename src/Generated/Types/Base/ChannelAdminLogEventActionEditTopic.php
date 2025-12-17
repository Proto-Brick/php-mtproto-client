<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionEditTopic
 */
final class ChannelAdminLogEventActionEditTopic extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xf06fe208;
    
    public string $predicate = 'channelAdminLogEventActionEditTopic';
    
    /**
     * @param AbstractForumTopic $prevTopic
     * @param AbstractForumTopic $newTopic
     */
    public function __construct(
        public readonly AbstractForumTopic $prevTopic,
        public readonly AbstractForumTopic $newTopic
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevTopic->serialize();
        $buffer .= $this->newTopic->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $prevTopic = AbstractForumTopic::deserialize($__payload, $__offset);
        $newTopic = AbstractForumTopic::deserialize($__payload, $__offset);

        return new self(
            $prevTopic,
            $newTopic
        );
    }
}