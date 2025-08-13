<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ReceivedNotifyMessage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.receivedMessages
 */
final class ReceivedMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5a954c0;
    
    public string $predicate = 'messages.receivedMessages';
    
    public function getMethodName(): string
    {
        return 'messages.receivedMessages';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . ReceivedNotifyMessage::class . '>';
    }
    /**
     * @param int $maxId
     */
    public function __construct(
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }
}