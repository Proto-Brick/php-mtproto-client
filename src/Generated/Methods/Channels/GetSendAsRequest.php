<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\SendAsPeers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getSendAs
 */
final class GetSendAsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe785a43f;
    
    public string $predicate = 'channels.getSendAs';
    
    public function getMethodName(): string
    {
        return 'channels.getSendAs';
    }
    
    public function getResponseClass(): string
    {
        return SendAsPeers::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $forPaidReactions
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $forPaidReactions = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forPaidReactions) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}