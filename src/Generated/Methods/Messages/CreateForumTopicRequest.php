<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.createForumTopic
 */
final class CreateForumTopicRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2f98c3d5;
    
    public string $predicate = 'messages.createForumTopic';
    
    public function getMethodName(): string
    {
        return 'messages.createForumTopic';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $title
     * @param int $randomId
     * @param true|null $titleMissing
     * @param int|null $iconColor
     * @param int|null $iconEmojiId
     * @param AbstractInputPeer|null $sendAs
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $title,
        public readonly int $randomId,
        public readonly ?true $titleMissing = null,
        public readonly ?int $iconColor = null,
        public readonly ?int $iconEmojiId = null,
        public readonly ?AbstractInputPeer $sendAs = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->titleMissing) {
            $flags |= (1 << 4);
        }
        if ($this->iconColor !== null) {
            $flags |= (1 << 0);
        }
        if ($this->iconEmojiId !== null) {
            $flags |= (1 << 3);
        }
        if ($this->sendAs !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->iconColor);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int64($this->iconEmojiId);
        }
        $buffer .= Serializer::int64($this->randomId);
        if ($flags & (1 << 2)) {
            $buffer .= $this->sendAs->serialize();
        }
        return $buffer;
    }
}