<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStatsGraph;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stats.loadAsyncGraph
 */
final class LoadAsyncGraphRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x621d5fa0;
    
    public string $predicate = 'stats.loadAsyncGraph';
    
    public function getMethodName(): string
    {
        return 'stats.loadAsyncGraph';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStatsGraph::class;
    }
    /**
     * @param string $token
     * @param int|null $x
     */
    public function __construct(
        public readonly string $token,
        public readonly ?int $x = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->x !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->token);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->x);
        }
        return $buffer;
    }
}