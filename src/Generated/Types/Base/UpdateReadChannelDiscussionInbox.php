<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateReadChannelDiscussionInbox
 */
final class UpdateReadChannelDiscussionInbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd6b19546;
    
    public string $predicate = 'updateReadChannelDiscussionInbox';
    
    /**
     * @param int $channelId
     * @param int $topMsgId
     * @param int $readMaxId
     * @param int|null $broadcastId
     * @param int|null $broadcastPost
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $topMsgId,
        public readonly int $readMaxId,
        public readonly ?int $broadcastId = null,
        public readonly ?int $broadcastPost = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcastId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->broadcastPost !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->topMsgId);
        $buffer .= Serializer::int32($this->readMaxId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->broadcastId);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->broadcastPost);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $channelId = Deserializer::int64($stream);
        $topMsgId = Deserializer::int32($stream);
        $readMaxId = Deserializer::int32($stream);
        $broadcastId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;
        $broadcastPost = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $channelId,
            $topMsgId,
            $readMaxId,
            $broadcastId,
            $broadcastPost
        );
    }
}