<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getScheduledHistory
 */
final class GetScheduledHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf516760b;
    
    public string $predicate = 'messages.getScheduledHistory';
    
    public function getMethodName(): string
    {
        return 'messages.getScheduledHistory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}