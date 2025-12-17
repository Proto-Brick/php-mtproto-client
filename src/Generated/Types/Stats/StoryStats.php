<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStatsGraph;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stats.storyStats
 */
final class StoryStats extends TlObject
{
    public const CONSTRUCTOR_ID = 0x50cd067c;
    
    public string $predicate = 'stats.storyStats';
    
    /**
     * @param AbstractStatsGraph $viewsGraph
     * @param AbstractStatsGraph $reactionsByEmotionGraph
     */
    public function __construct(
        public readonly AbstractStatsGraph $viewsGraph,
        public readonly AbstractStatsGraph $reactionsByEmotionGraph
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->viewsGraph->serialize();
        $buffer .= $this->reactionsByEmotionGraph->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $viewsGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $reactionsByEmotionGraph = AbstractStatsGraph::deserialize($__payload, $__offset);

        return new self(
            $viewsGraph,
            $reactionsByEmotionGraph
        );
    }
}