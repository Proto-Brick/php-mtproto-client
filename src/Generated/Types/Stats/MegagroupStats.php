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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->period->serialize();
        $buffer .= $this->members->serialize();
        $buffer .= $this->messages->serialize();
        $buffer .= $this->viewers->serialize();
        $buffer .= $this->posters->serialize();
        $buffer .= $this->growthGraph->serialize();
        $buffer .= $this->membersGraph->serialize();
        $buffer .= $this->newMembersBySourceGraph->serialize();
        $buffer .= $this->languagesGraph->serialize();
        $buffer .= $this->messagesGraph->serialize();
        $buffer .= $this->actionsGraph->serialize();
        $buffer .= $this->topHoursGraph->serialize();
        $buffer .= $this->weekdaysGraph->serialize();
        $buffer .= Serializer::vectorOfObjects($this->topPosters);
        $buffer .= Serializer::vectorOfObjects($this->topAdmins);
        $buffer .= Serializer::vectorOfObjects($this->topInviters);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $period = StatsDateRangeDays::deserialize($stream);
        $members = StatsAbsValueAndPrev::deserialize($stream);
        $messages = StatsAbsValueAndPrev::deserialize($stream);
        $viewers = StatsAbsValueAndPrev::deserialize($stream);
        $posters = StatsAbsValueAndPrev::deserialize($stream);
        $growthGraph = AbstractStatsGraph::deserialize($stream);
        $membersGraph = AbstractStatsGraph::deserialize($stream);
        $newMembersBySourceGraph = AbstractStatsGraph::deserialize($stream);
        $languagesGraph = AbstractStatsGraph::deserialize($stream);
        $messagesGraph = AbstractStatsGraph::deserialize($stream);
        $actionsGraph = AbstractStatsGraph::deserialize($stream);
        $topHoursGraph = AbstractStatsGraph::deserialize($stream);
        $weekdaysGraph = AbstractStatsGraph::deserialize($stream);
        $topPosters = Deserializer::vectorOfObjects($stream, [StatsGroupTopPoster::class, 'deserialize']);
        $topAdmins = Deserializer::vectorOfObjects($stream, [StatsGroupTopAdmin::class, 'deserialize']);
        $topInviters = Deserializer::vectorOfObjects($stream, [StatsGroupTopInviter::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
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