<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\MessageStats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stats.getMessageStats
 */
final class GetMessageStatsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb6e0a3f5;
    
    public string $predicate = 'stats.getMessageStats';
    
    public function getMethodName(): string
    {
        return 'stats.getMessageStats';
    }
    
    public function getResponseClass(): string
    {
        return MessageStats::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $msgId
     * @param true|null $dark
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $msgId,
        public readonly ?true $dark = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
}