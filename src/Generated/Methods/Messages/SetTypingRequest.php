<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractSendMessageAction;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setTyping
 */
final class SetTypingRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x58943ee2;
    
    public string $predicate = 'messages.setTyping';
    
    public function getMethodName(): string
    {
        return 'messages.setTyping';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractSendMessageAction $action
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractSendMessageAction $action,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        $buffer .= $this->action->serialize();
        return $buffer;
    }
}