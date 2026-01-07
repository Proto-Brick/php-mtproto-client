<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPostInteractionCounters;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStatsGraph;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsAbsValueAndPrev;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsDateRangeDays;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsPercentValue;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stats.broadcastStats
 */
final class BroadcastStats extends TlObject
{
    public const CONSTRUCTOR_ID = 0x396ca5fc;
    
    public string $predicate = 'stats.broadcastStats';
    
    /**
     * @param StatsDateRangeDays $period
     * @param StatsAbsValueAndPrev $followers
     * @param StatsAbsValueAndPrev $viewsPerPost
     * @param StatsAbsValueAndPrev $sharesPerPost
     * @param StatsAbsValueAndPrev $reactionsPerPost
     * @param StatsAbsValueAndPrev $viewsPerStory
     * @param StatsAbsValueAndPrev $sharesPerStory
     * @param StatsAbsValueAndPrev $reactionsPerStory
     * @param StatsPercentValue $enabledNotifications
     * @param AbstractStatsGraph $growthGraph
     * @param AbstractStatsGraph $followersGraph
     * @param AbstractStatsGraph $muteGraph
     * @param AbstractStatsGraph $topHoursGraph
     * @param AbstractStatsGraph $interactionsGraph
     * @param AbstractStatsGraph $ivInteractionsGraph
     * @param AbstractStatsGraph $viewsBySourceGraph
     * @param AbstractStatsGraph $newFollowersBySourceGraph
     * @param AbstractStatsGraph $languagesGraph
     * @param AbstractStatsGraph $reactionsByEmotionGraph
     * @param AbstractStatsGraph $storyInteractionsGraph
     * @param AbstractStatsGraph $storyReactionsByEmotionGraph
     * @param list<AbstractPostInteractionCounters> $recentPostsInteractions
     */
    public function __construct(
        public readonly StatsDateRangeDays $period,
        public readonly StatsAbsValueAndPrev $followers,
        public readonly StatsAbsValueAndPrev $viewsPerPost,
        public readonly StatsAbsValueAndPrev $sharesPerPost,
        public readonly StatsAbsValueAndPrev $reactionsPerPost,
        public readonly StatsAbsValueAndPrev $viewsPerStory,
        public readonly StatsAbsValueAndPrev $sharesPerStory,
        public readonly StatsAbsValueAndPrev $reactionsPerStory,
        public readonly StatsPercentValue $enabledNotifications,
        public readonly AbstractStatsGraph $growthGraph,
        public readonly AbstractStatsGraph $followersGraph,
        public readonly AbstractStatsGraph $muteGraph,
        public readonly AbstractStatsGraph $topHoursGraph,
        public readonly AbstractStatsGraph $interactionsGraph,
        public readonly AbstractStatsGraph $ivInteractionsGraph,
        public readonly AbstractStatsGraph $viewsBySourceGraph,
        public readonly AbstractStatsGraph $newFollowersBySourceGraph,
        public readonly AbstractStatsGraph $languagesGraph,
        public readonly AbstractStatsGraph $reactionsByEmotionGraph,
        public readonly AbstractStatsGraph $storyInteractionsGraph,
        public readonly AbstractStatsGraph $storyReactionsByEmotionGraph,
        public readonly array $recentPostsInteractions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->period->serialize();
        $buffer .= $this->followers->serialize();
        $buffer .= $this->viewsPerPost->serialize();
        $buffer .= $this->sharesPerPost->serialize();
        $buffer .= $this->reactionsPerPost->serialize();
        $buffer .= $this->viewsPerStory->serialize();
        $buffer .= $this->sharesPerStory->serialize();
        $buffer .= $this->reactionsPerStory->serialize();
        $buffer .= $this->enabledNotifications->serialize();
        $buffer .= $this->growthGraph->serialize();
        $buffer .= $this->followersGraph->serialize();
        $buffer .= $this->muteGraph->serialize();
        $buffer .= $this->topHoursGraph->serialize();
        $buffer .= $this->interactionsGraph->serialize();
        $buffer .= $this->ivInteractionsGraph->serialize();
        $buffer .= $this->viewsBySourceGraph->serialize();
        $buffer .= $this->newFollowersBySourceGraph->serialize();
        $buffer .= $this->languagesGraph->serialize();
        $buffer .= $this->reactionsByEmotionGraph->serialize();
        $buffer .= $this->storyInteractionsGraph->serialize();
        $buffer .= $this->storyReactionsByEmotionGraph->serialize();
        $buffer .= Serializer::vectorOfObjects($this->recentPostsInteractions);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $period = StatsDateRangeDays::deserialize($__payload, $__offset);
        $followers = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $viewsPerPost = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $sharesPerPost = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $reactionsPerPost = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $viewsPerStory = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $sharesPerStory = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $reactionsPerStory = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $enabledNotifications = StatsPercentValue::deserialize($__payload, $__offset);
        $growthGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $followersGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $muteGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $topHoursGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $interactionsGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $ivInteractionsGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $viewsBySourceGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $newFollowersBySourceGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $languagesGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $reactionsByEmotionGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $storyInteractionsGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $storyReactionsByEmotionGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $recentPostsInteractions = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPostInteractionCounters::class, 'deserialize']);

        return new self(
            $period,
            $followers,
            $viewsPerPost,
            $sharesPerPost,
            $reactionsPerPost,
            $viewsPerStory,
            $sharesPerStory,
            $reactionsPerStory,
            $enabledNotifications,
            $growthGraph,
            $followersGraph,
            $muteGraph,
            $topHoursGraph,
            $interactionsGraph,
            $ivInteractionsGraph,
            $viewsBySourceGraph,
            $newFollowersBySourceGraph,
            $languagesGraph,
            $reactionsByEmotionGraph,
            $storyInteractionsGraph,
            $storyReactionsByEmotionGraph,
            $recentPostsInteractions
        );
    }
}