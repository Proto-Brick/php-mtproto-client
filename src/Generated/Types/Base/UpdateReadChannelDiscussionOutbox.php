<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateReadChannelDiscussionOutbox
 */
final class UpdateReadChannelDiscussionOutbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x695c9e7c;
    
    public string $predicate = 'updateReadChannelDiscussionOutbox';
    
    /**
     * @param int $channelId
     * @param int $topMsgId
     * @param int $readMaxId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $topMsgId,
        public readonly int $readMaxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->topMsgId);
        $buffer .= Serializer::int32($this->readMaxId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $channelId = Deserializer::int64($stream);
        $topMsgId = Deserializer::int32($stream);
        $readMaxId = Deserializer::int32($stream);

        return new self(
            $channelId,
            $topMsgId,
            $readMaxId
        );
    }
}