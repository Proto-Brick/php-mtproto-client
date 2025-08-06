<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsAbsValueAndPrev;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsDateRangeDays;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsGroupTopAdmin;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsGroupTopInviter;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsGroupTopPoster;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stats.megagroupStats
 */
final class MegagroupStats extends TlObject
{
    public const CONSTRUCTOR_ID = 0xef7ff916;
    
    public string $_ = 'stats.megagroupStats';
    
    /**
     * @param StatsDateRangeDays $period
     * @param StatsAbsValueAndPrev $members
     * @param StatsAbsValueAndPrev $messages
     * @param StatsAbsValueAndPrev $viewers
     * @param StatsAbsValueAndPrev $posters
     * @param AbstractStatsGraph $growthGraph
     * @param AbstractStatsGraph $membersGraph
     * @param AbstractStatsGraph $newMembersBySourceGraph
     * @param AbstractStatsGraph $languagesGraph
     * @param AbstractStatsGraph $messagesGraph
     * @param AbstractStatsGraph $actionsGraph
     * @param AbstractStatsGraph $topHoursGraph
     * @param AbstractStatsGraph $weekdaysGraph
     * @param list<StatsGroupTopPoster> $topPosters
     * @param list<StatsGroupTopAdmin> $topAdmins
     * @param list<StatsGroupTopInviter> $topInviters
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly StatsDateRangeDays $period,
        public readonly StatsAbsValueAndPrev $members,
        public readonly StatsAbsValueAndPrev $messages,
        public readonly StatsAbsValueAndPrev $viewers,
        public readonly StatsAbsValueAndPrev $posters,
        public readonly AbstractStatsGraph $growthGraph,
        public readonly AbstractStatsGraph $membersGraph,
        public readonly AbstractStatsGraph $newMembersBySourceGraph,
        public readonly AbstractStatsGraph $languagesGraph,
        public readonly AbstractStatsGraph $messagesGraph,
        public readonly AbstractStatsGraph $actionsGraph,
        public readonly AbstractStatsGraph $topHoursGraph,
        public readonly AbstractStatsGraph $weekdaysGraph,
        public readonly array $topPosters,
        public readonly array $topAdmins,
        public readonly array $topInviters,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->period->serialize($serializer);
        $buffer .= $this->members->serialize($serializer);
        $buffer .= $this->messages->serialize($serializer);
        $buffer .= $this->viewers->serialize($serializer);
        $buffer .= $this->posters->serialize($serializer);
        $buffer .= $this->growthGraph->serialize($serializer);
        $buffer .= $this->membersGraph->serialize($serializer);
        $buffer .= $this->newMembersBySourceGraph->serialize($serializer);
        $buffer .= $this->languagesGraph->serialize($serializer);
        $buffer .= $this->messagesGraph->serialize($serializer);
        $buffer .= $this->actionsGraph->serialize($serializer);
        $buffer .= $this->topHoursGraph->serialize($serializer);
        $buffer .= $this->weekdaysGraph->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->topPosters);
        $buffer .= $serializer->vectorOfObjects($this->topAdmins);
        $buffer .= $serializer->vectorOfObjects($this->topInviters);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $period = StatsDateRangeDays::deserialize($deserializer, $stream);
        $members = StatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $messages = StatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $viewers = StatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $posters = StatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $growthGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $membersGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $newMembersBySourceGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $languagesGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $messagesGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $actionsGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $topHoursGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $weekdaysGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $topPosters = $deserializer->vectorOfObjects($stream, [StatsGroupTopPoster::class, 'deserialize']);
        $topAdmins = $deserializer->vectorOfObjects($stream, [StatsGroupTopAdmin::class, 'deserialize']);
        $topInviters = $deserializer->vectorOfObjects($stream, [StatsGroupTopInviter::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $period,
            $members,
            $messages,
            $viewers,
            $posters,
            $growthGraph,
            $membersGraph,
            $newMembersBySourceGraph,
            $languagesGraph,
            $messagesGraph,
            $actionsGraph,
            $topHoursGraph,
            $weekdaysGraph,
            $topPosters,
            $topAdmins,
            $topInviters,
            $users
        );
    }
}