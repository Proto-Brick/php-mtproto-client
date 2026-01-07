<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.reorderPinnedForumTopics
 */
final class ReorderPinnedForumTopicsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe7841f0;
    
    public string $predicate = 'messages.reorderPinnedForumTopics';
    
    public function getMethodName(): string
    {
        return 'messages.reorderPinnedForumTopics';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $order
     * @param true|null $force
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $order,
        public readonly ?true $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->force) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->order);
        return $buffer;
    }
}