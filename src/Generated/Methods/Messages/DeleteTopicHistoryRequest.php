<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedHistory;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deleteTopicHistory
 */
final class DeleteTopicHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd2816f10;
    
    public string $predicate = 'messages.deleteTopicHistory';
    
    public function getMethodName(): string
    {
        return 'messages.deleteTopicHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedHistory::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $topMsgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topMsgId);
        return $buffer;
    }
}