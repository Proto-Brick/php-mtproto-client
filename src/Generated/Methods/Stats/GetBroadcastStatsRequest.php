<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\BroadcastStats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stats.getBroadcastStats
 */
final class GetBroadcastStatsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xab42441a;
    
    public string $predicate = 'stats.getBroadcastStats';
    
    public function getMethodName(): string
    {
        return 'stats.getBroadcastStats';
    }
    
    public function getResponseClass(): string
    {
        return BroadcastStats::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param true|null $dark
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
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
        return $buffer;
    }
}