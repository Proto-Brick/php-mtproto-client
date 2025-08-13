<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatFull;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getFullChat
 */
final class GetFullChatRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xaeb00b34;
    
    public string $predicate = 'messages.getFullChat';
    
    public function getMethodName(): string
    {
        return 'messages.getFullChat';
    }
    
    public function getResponseClass(): string
    {
        return ChatFull::class;
    }
    /**
     * @param int $chatId
     */
    public function __construct(
        public readonly int $chatId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        return $buffer;
    }
}