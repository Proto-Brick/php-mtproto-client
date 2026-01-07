<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChannelParticipantsFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\AbstractChannelParticipants;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getParticipants
 */
final class GetParticipantsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x77ced9d0;
    
    public string $predicate = 'channels.getParticipants';
    
    public function getMethodName(): string
    {
        return 'channels.getParticipants';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChannelParticipants::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractChannelParticipantsFilter $filter
     * @param int $offset
     * @param int $limit
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractChannelParticipantsFilter $filter,
        public readonly int $offset,
        public readonly int $limit,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}