<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPostInteractionCounters;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsAbsValueAndPrev;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsDateRangeDays;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsPercentValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stats.broadcastStats
 */
final class BroadcastStats extends AbstractBroadcastStats
{
    public const CONSTRUCTOR_ID = 963421692;
    
    public string $_ = 'stats.broadcastStats';
    
    /**
     * @param AbstractStatsDateRangeDays $period
     * @param AbstractStatsAbsValueAndPrev $followers
     * @param AbstractStatsAbsValueAndPrev $viewsPerPost
     * @param AbstractStatsAbsValueAndPrev $sharesPerPost
     * @param AbstractStatsAbsValueAndPrev $reactionsPerPost
     * @param AbstractStatsAbsValueAndPrev $viewsPerStory
     * @param AbstractStatsAbsValueAndPrev $sharesPerStory
     * @param AbstractStatsAbsValueAndPrev $reactionsPerStory
     * @param AbstractStatsPercentValue $enabledNotifications
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
        public readonly AbstractStatsDateRangeDays $period,
        public readonly AbstractStatsAbsValueAndPrev $followers,
        public readonly AbstractStatsAbsValueAndPrev $viewsPerPost,
        public readonly AbstractStatsAbsValueAndPrev $sharesPerPost,
        public readonly AbstractStatsAbsValueAndPrev $reactionsPerPost,
        public readonly AbstractStatsAbsValueAndPrev $viewsPerStory,
        public readonly AbstractStatsAbsValueAndPrev $sharesPerStory,
        public readonly AbstractStatsAbsValueAndPrev $reactionsPerStory,
        public readonly AbstractStatsPercentValue $enabledNotifications,
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->period->serialize($serializer);
        $buffer .= $this->followers->serialize($serializer);
        $buffer .= $this->viewsPerPost->serialize($serializer);
        $buffer .= $this->sharesPerPost->serialize($serializer);
        $buffer .= $this->reactionsPerPost->serialize($serializer);
        $buffer .= $this->viewsPerStory->serialize($serializer);
        $buffer .= $this->sharesPerStory->serialize($serializer);
        $buffer .= $this->reactionsPerStory->serialize($serializer);
        $buffer .= $this->enabledNotifications->serialize($serializer);
        $buffer .= $this->growthGraph->serialize($serializer);
        $buffer .= $this->followersGraph->serialize($serializer);
        $buffer .= $this->muteGraph->serialize($serializer);
        $buffer .= $this->topHoursGraph->serialize($serializer);
        $buffer .= $this->interactionsGraph->serialize($serializer);
        $buffer .= $this->ivInteractionsGraph->serialize($serializer);
        $buffer .= $this->viewsBySourceGraph->serialize($serializer);
        $buffer .= $this->newFollowersBySourceGraph->serialize($serializer);
        $buffer .= $this->languagesGraph->serialize($serializer);
        $buffer .= $this->reactionsByEmotionGraph->serialize($serializer);
        $buffer .= $this->storyInteractionsGraph->serialize($serializer);
        $buffer .= $this->storyReactionsByEmotionGraph->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->recentPostsInteractions);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $period = AbstractStatsDateRangeDays::deserialize($deserializer, $stream);
        $followers = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $viewsPerPost = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $sharesPerPost = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $reactionsPerPost = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $viewsPerStory = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $sharesPerStory = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $reactionsPerStory = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $enabledNotifications = AbstractStatsPercentValue::deserialize($deserializer, $stream);
        $growthGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $followersGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $muteGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $topHoursGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $interactionsGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $ivInteractionsGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $viewsBySourceGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $newFollowersBySourceGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $languagesGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $reactionsByEmotionGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $storyInteractionsGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $storyReactionsByEmotionGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $recentPostsInteractions = $deserializer->vectorOfObjects($stream, [AbstractPostInteractionCounters::class, 'deserialize']);
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