<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Updates;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChannelMessagesFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\AbstractChannelDifference;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/updates.getChannelDifference
 */
final class GetChannelDifferenceRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3173d78;
    
    public string $predicate = 'updates.getChannelDifference';
    
    public function getMethodName(): string
    {
        return 'updates.getChannelDifference';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChannelDifference::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractChannelMessagesFilter $filter
     * @param int $pts
     * @param int $limit
     * @param true|null $force
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractChannelMessagesFilter $filter,
        public readonly int $pts,
        public readonly int $limit,
        public readonly ?true $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->force) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}