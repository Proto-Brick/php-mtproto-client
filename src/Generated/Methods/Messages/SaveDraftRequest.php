<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SuggestedPost;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.saveDraft
 */
final class SaveDraftRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x54ae308e;
    
    public string $predicate = 'messages.saveDraft';
    
    public function getMethodName(): string
    {
        return 'messages.saveDraft';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $message
     * @param true|null $noWebpage
     * @param true|null $invertMedia
     * @param AbstractInputReplyTo|null $replyTo
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractInputMedia|null $media
     * @param int|null $effect
     * @param SuggestedPost|null $suggestedPost
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $message,
        public readonly ?true $noWebpage = null,
        public readonly ?true $invertMedia = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractInputMedia $media = null,
        public readonly ?int $effect = null,
        public readonly ?SuggestedPost $suggestedPost = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) {
            $flags |= (1 << 1);
        }
        if ($this->invertMedia) {
            $flags |= (1 << 6);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 4);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 3);
        }
        if ($this->media !== null) {
            $flags |= (1 << 5);
        }
        if ($this->effect !== null) {
            $flags |= (1 << 7);
        }
        if ($this->suggestedPost !== null) {
            $flags |= (1 << 8);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 4)) {
            $buffer .= $this->replyTo->serialize();
        }
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->media->serialize();
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int64($this->effect);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->suggestedPost->serialize();
        }
        return $buffer;
    }
}