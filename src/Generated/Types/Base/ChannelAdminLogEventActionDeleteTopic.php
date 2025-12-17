<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionDeleteTopic
 */
final class ChannelAdminLogEventActionDeleteTopic extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xae168909;
    
    public string $predicate = 'channelAdminLogEventActionDeleteTopic';
    
    /**
     * @param AbstractForumTopic $topic
     */
    public function __construct(
        public readonly AbstractForumTopic $topic
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->topic->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $topic = AbstractForumTopic::deserialize($__payload, $__offset);

        return new self(
            $topic
        );
    }
}