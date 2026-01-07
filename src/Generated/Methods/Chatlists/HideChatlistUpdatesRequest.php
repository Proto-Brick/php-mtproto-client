<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChatlist;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/chatlists.hideChatlistUpdates
 */
final class HideChatlistUpdatesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x66e486fb;
    
    public string $predicate = 'chatlists.hideChatlistUpdates';
    
    public function getMethodName(): string
    {
        return 'chatlists.hideChatlistUpdates';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
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