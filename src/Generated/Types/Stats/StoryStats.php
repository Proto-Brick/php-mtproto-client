<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $viewsGraph = AbstractStatsGraph::deserialize($stream);
        $reactionsByEmotionGraph = AbstractStatsGraph::deserialize($stream);

        return new self(
            $viewsGraph,
            $reactionsByEmotionGraph
        );
    }
}