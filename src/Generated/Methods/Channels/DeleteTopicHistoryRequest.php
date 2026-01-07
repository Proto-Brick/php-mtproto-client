<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedHistory;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.deleteTopicHistory
 */
final class DeleteTopicHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x34435f2d;
    
    public string $predicate = 'channels.deleteTopicHistory';
    
    public function getMethodName(): string
    {
        return 'channels.deleteTopicHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedHistory::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $topMsgId
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $topMsgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->topMsgId);
        return $buffer;
    }
}