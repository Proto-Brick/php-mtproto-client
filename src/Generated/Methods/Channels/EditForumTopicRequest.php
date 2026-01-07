<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.editForumTopic
 */
final class EditForumTopicRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf4dfa185;
    
    public string $predicate = 'channels.editForumTopic';
    
    public function getMethodName(): string
    {
        return 'channels.editForumTopic';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $topicId
     * @param string|null $title
     * @param int|null $iconEmojiId
     * @param bool|null $closed
     * @param bool|null $hidden
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $topicId,
        public readonly ?string $title = null,
        public readonly ?int $iconEmojiId = null,
        public readonly ?bool $closed = null,
        public readonly ?bool $hidden = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        if ($this->iconEmojiId !== null) {
            $flags |= (1 << 1);
        }
        if ($this->closed !== null) {
            $flags |= (1 << 2);
        }
        if ($this->hidden !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->topicId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->iconEmojiId);
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->closed ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 3)) {
            $buffer .= ($this->hidden ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }
}