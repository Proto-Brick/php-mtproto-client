<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\MegagroupStats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stats.getMegagroupStats
 */
final class GetMegagroupStatsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xdcdf8607;
    
    public string $predicate = 'stats.getMegagroupStats';
    
    public function getMethodName(): string
    {
        return 'stats.getMegagroupStats';
    }
    
    public function getResponseClass(): string
    {
        return MegagroupStats::class;
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