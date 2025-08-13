<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatlist;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.getLeaveChatlistSuggestions
 */
final class GetLeaveChatlistSuggestionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfdbcd714;
    
    public string $predicate = 'chatlists.getLeaveChatlistSuggestions';
    
    public function getMethodName(): string
    {
        return 'chatlists.getLeaveChatlistSuggestions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractPeer::class . '>';
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