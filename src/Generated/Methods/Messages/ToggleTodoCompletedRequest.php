<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.toggleTodoCompleted
 */
final class ToggleTodoCompletedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd3e03124;
    
    public string $predicate = 'messages.toggleTodoCompleted';
    
    public function getMethodName(): string
    {
        return 'messages.toggleTodoCompleted';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param list<int> $completed
     * @param list<int> $incompleted
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly array $completed,
        public readonly array $incompleted
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::vectorOfInts($this->completed);
        $buffer .= Serializer::vectorOfInts($this->incompleted);
        return $buffer;
    }
}