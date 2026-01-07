<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\DiscussionMessage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getDiscussionMessage
 */
final class GetDiscussionMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x446972fd;
    
    public string $predicate = 'messages.getDiscussionMessage';
    
    public function getMethodName(): string
    {
        return 'messages.getDiscussionMessage';
    }
    
    public function getResponseClass(): string
    {
        return DiscussionMessage::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
}