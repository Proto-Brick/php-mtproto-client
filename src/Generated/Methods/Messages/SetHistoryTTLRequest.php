<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setHistoryTTL
 */
final class SetHistoryTTLRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb80e5fe4;
    
    public string $predicate = 'messages.setHistoryTTL';
    
    public function getMethodName(): string
    {
        return 'messages.setHistoryTTL';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $period
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $period
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->period);
        return $buffer;
    }
}