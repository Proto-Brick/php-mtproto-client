<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.updateDialogFiltersOrder
 */
final class UpdateDialogFiltersOrderRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc563c1e4;
    
    public string $predicate = 'messages.updateDialogFiltersOrder';
    
    public function getMethodName(): string
    {
        return 'messages.updateDialogFiltersOrder';
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