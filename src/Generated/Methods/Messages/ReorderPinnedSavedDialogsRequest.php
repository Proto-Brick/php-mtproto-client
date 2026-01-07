<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDialogPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.reorderPinnedSavedDialogs
 */
final class ReorderPinnedSavedDialogsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8b716587;
    
    public string $predicate = 'messages.reorderPinnedSavedDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.reorderPinnedSavedDialogs';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<AbstractInputDialogPeer> $order
     * @param true|null $force
     */
    public function __construct(
        public readonly array $order,
        public readonly ?true $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->force) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->order);
        return $buffer;
    }
}