<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatlist;
use ProtoBrick\MTProtoClient\Generated\Types\Chatlists\ChatlistUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.getChatlistUpdates
 */
final class GetChatlistUpdatesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x89419521;
    
    public string $predicate = 'chatlists.getChatlistUpdates';
    
    public function getMethodName(): string
    {
        return 'chatlists.getChatlistUpdates';
    }
    
    public function getResponseClass(): string
    {
        return ChatlistUpdates::class;
    }
    /**
     * @param InputChatlist $chatlist
     */
    public function __construct(
        public readonly InputChatlist $chatlist
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize();
        return $buffer;
    }
}