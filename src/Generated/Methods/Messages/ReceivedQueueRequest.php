<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.receivedQueue
 */
final class ReceivedQueueRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x55a5bb66;
    
    public string $predicate = 'messages.receivedQueue';
    
    public function getMethodName(): string
    {
        return 'messages.receivedQueue';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param int $maxQts
     */
    public function __construct(
        public readonly int $maxQts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->maxQts);
        return $buffer;
    }
}