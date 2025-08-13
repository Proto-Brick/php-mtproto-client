<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\StoryStats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stats.getStoryStats
 */
final class GetStoryStatsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x374fef40;
    
    public string $predicate = 'stats.getStoryStats';
    
    public function getMethodName(): string
    {
        return 'stats.getStoryStats';
    }
    
    public function getResponseClass(): string
    {
        return StoryStats::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param true|null $dark
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
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
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }
}