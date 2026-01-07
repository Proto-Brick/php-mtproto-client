<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getMessagesReactions
 */
final class GetMessagesReactionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8bba90e6;
    
    public string $predicate = 'messages.getMessagesReactions';
    
    public function getMethodName(): string
    {
        return 'messages.getMessagesReactions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        return $buffer;
    }
}