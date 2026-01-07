<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.reportMessagesDelivery
 */
final class ReportMessagesDeliveryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5a6d7395;
    
    public string $predicate = 'messages.reportMessagesDelivery';
    
    public function getMethodName(): string
    {
        return 'messages.reportMessagesDelivery';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     * @param true|null $push
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id,
        public readonly ?true $push = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->push) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        return $buffer;
    }
}