<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannelPinnedTopic
 */
final class UpdateChannelPinnedTopic extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x192efbe3;
    
    public string $predicate = 'updateChannelPinnedTopic';
    
    /**
     * @param int $channelId
     * @param int $topicId
     * @param true|null $pinned
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $topicId,
        public readonly ?true $pinned = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->topicId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $pinned = (($flags & (1 << 0)) !== 0) ? true : null;
        $channelId = Deserializer::int64($stream);
        $topicId = Deserializer::int32($stream);

        return new self(
            $channelId,
            $topicId,
            $pinned
        );
    }
}