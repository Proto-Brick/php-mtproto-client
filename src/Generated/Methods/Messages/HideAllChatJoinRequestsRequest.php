<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.hideAllChatJoinRequests
 */
final class HideAllChatJoinRequestsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe085f4ea;
    
    public string $predicate = 'messages.hideAllChatJoinRequests';
    
    public function getMethodName(): string
    {
        return 'messages.hideAllChatJoinRequests';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $approved
     * @param string|null $link
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $approved = null,
        public readonly ?string $link = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->approved) {
            $flags |= (1 << 0);
        }
        if ($this->link !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->link);
        }
        return $buffer;
    }
}