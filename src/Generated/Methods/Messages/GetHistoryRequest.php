<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getHistory
 */
final class GetHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4423e6c5;
    
    public string $predicate = 'messages.getHistory';
    
    public function getMethodName(): string
    {
        return 'messages.getHistory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetId,
        public readonly int $offsetDate,
        public readonly int $addOffset,
        public readonly int $limit,
        public readonly int $maxId,
        public readonly int $minId,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->offsetDate);
        $buffer .= Serializer::int32($this->addOffset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int32($this->maxId);
        $buffer .= Serializer::int32($this->minId);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}