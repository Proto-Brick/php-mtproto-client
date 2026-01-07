<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatlist;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.joinChatlistUpdates
 */
final class JoinChatlistUpdatesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe089f8f5;
    
    public string $predicate = 'chatlists.joinChatlistUpdates';
    
    public function getMethodName(): string
    {
        return 'chatlists.joinChatlistUpdates';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputChatlist $chatlist
     * @param list<AbstractInputPeer> $peers
     */
    public function __construct(
        public readonly InputChatlist $chatlist,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize();
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }
}