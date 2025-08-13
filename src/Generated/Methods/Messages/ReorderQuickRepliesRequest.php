<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.reorderQuickReplies
 */
final class ReorderQuickRepliesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x60331907;
    
    public string $predicate = 'messages.reorderQuickReplies';
    
    public function getMethodName(): string
    {
        return 'messages.reorderQuickReplies';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<int> $order
     */
    public function __construct(
        public readonly array $order
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfInts($this->order);
        return $buffer;
    }
}