<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDialogPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.toggleDialogPin
 */
final class ToggleDialogPinRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa731e257;
    
    public string $predicate = 'messages.toggleDialogPin';
    
    public function getMethodName(): string
    {
        return 'messages.toggleDialogPin';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputDialogPeer $peer
     * @param true|null $pinned
     */
    public function __construct(
        public readonly AbstractInputDialogPeer $peer,
        public readonly ?true $pinned = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}