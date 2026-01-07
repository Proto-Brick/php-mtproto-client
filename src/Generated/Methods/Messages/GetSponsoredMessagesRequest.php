<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSponsoredMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getSponsoredMessages
 */
final class GetSponsoredMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3d6ce850;
    
    public string $predicate = 'messages.getSponsoredMessages';
    
    public function getMethodName(): string
    {
        return 'messages.getSponsoredMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSponsoredMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int|null $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?int $msgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->msgId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->msgId);
        }
        return $buffer;
    }
}