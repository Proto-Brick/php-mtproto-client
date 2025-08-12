<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPostInteractionCounters;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsAbsValueAndPrev;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsDateRangeDays;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsPercentValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $period = StatsDateRangeDays::deserialize($stream);
        $followers = StatsAbsValueAndPrev::deserialize($stream);
        $viewsPerPost = StatsAbsValueAndPrev::deserialize($stream);
        $sharesPerPost = StatsAbsValueAndPrev::deserialize($stream);
        $reactionsPerPost = StatsAbsValueAndPrev::deserialize($stream);
        $viewsPerStory = StatsAbsValueAndPrev::deserialize($stream);
        $sharesPerStory = StatsAbsValueAndPrev::deserialize($stream);
        $reactionsPerStory = StatsAbsValueAndPrev::deserialize($stream);
        $enabledNotifications = StatsPercentValue::deserialize($stream);
        $growthGraph = AbstractStatsGraph::deserialize($stream);
        $followersGraph = AbstractStatsGraph::deserialize($stream);
        $muteGraph = AbstractStatsGraph::deserialize($stream);
        $topHoursGraph = AbstractStatsGraph::deserialize($stream);
        $interactionsGraph = AbstractStatsGraph::deserialize($stream);
        $ivInteractionsGraph = AbstractStatsGraph::deserialize($stream);
        $viewsBySourceGraph = AbstractStatsGraph::deserialize($stream);
        $newFollowersBySourceGraph = AbstractStatsGraph::deserialize($stream);
        $languagesGraph = AbstractStatsGraph::deserialize($stream);
        $reactionsByEmotionGraph = AbstractStatsGraph::deserialize($stream);
        $storyInteractionsGraph = AbstractStatsGraph::deserialize($stream);
        $storyReactionsByEmotionGraph = AbstractStatsGraph::deserialize($stream);
        $recentPostsInteractions = Deserializer::vectorOfObjects($stream, [AbstractPostInteractionCounters::class, 'deserialize']);

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