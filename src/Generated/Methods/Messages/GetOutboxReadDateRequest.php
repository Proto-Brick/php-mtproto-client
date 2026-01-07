<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\OutboxReadDate;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getOutboxReadDate
 */
final class GetOutboxReadDateRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8c4bfe5d;
    
    public string $predicate = 'messages.getOutboxReadDate';
    
    public function getMethodName(): string
    {
        return 'messages.getOutboxReadDate';
    }
    
    public function getResponseClass(): string
    {
        return OutboxReadDate::class;
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