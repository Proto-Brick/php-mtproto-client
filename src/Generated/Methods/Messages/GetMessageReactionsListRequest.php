<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReaction;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\MessageReactionsList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getMessageReactionsList
 */
final class GetMessageReactionsListRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x461b3f48;
    
    public string $predicate = 'messages.getMessageReactionsList';
    
    public function getMethodName(): string
    {
        return 'messages.getMessageReactionsList';
    }
    
    public function getResponseClass(): string
    {
        return MessageReactionsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param int $limit
     * @param AbstractReaction|null $reaction
     * @param string|null $offset
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly int $limit,
        public readonly ?AbstractReaction $reaction = null,
        public readonly ?string $offset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->reaction !== null) {
            $flags |= (1 << 0);
        }
        if ($this->offset !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->reaction->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->offset);
        }
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}