<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDialogPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.markDialogUnread
 */
final class MarkDialogUnreadRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8c5006f8;
    
    public string $predicate = 'messages.markDialogUnread';
    
    public function getMethodName(): string
    {
        return 'messages.markDialogUnread';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputDialogPeer $peer
     * @param true|null $unread
     * @param AbstractInputPeer|null $parentPeer
     */
    public function __construct(
        public readonly AbstractInputDialogPeer $peer,
        public readonly ?true $unread = null,
        public readonly ?AbstractInputPeer $parentPeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unread) {
            $flags |= (1 << 0);
        }
        if ($this->parentPeer !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->parentPeer->serialize();
        }
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}