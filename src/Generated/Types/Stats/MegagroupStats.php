<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStatsGraph;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsAbsValueAndPrev;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsDateRangeDays;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsGroupTopAdmin;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsGroupTopInviter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsGroupTopPoster;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stats.megagroupStats
 */
final class MegagroupStats extends TlObject
{
    public const CONSTRUCTOR_ID = 0xef7ff916;
    
    public string $predicate = 'stats.megagroupStats';
    
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $period = StatsDateRangeDays::deserialize($__payload, $__offset);
        $members = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $messages = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $viewers = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $posters = StatsAbsValueAndPrev::deserialize($__payload, $__offset);
        $growthGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $membersGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $newMembersBySourceGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $languagesGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $messagesGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $actionsGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $topHoursGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $weekdaysGraph = AbstractStatsGraph::deserialize($__payload, $__offset);
        $topPosters = Deserializer::vectorOfObjects($__payload, $__offset, [StatsGroupTopPoster::class, 'deserialize']);
        $topAdmins = Deserializer::vectorOfObjects($__payload, $__offset, [StatsGroupTopAdmin::class, 'deserialize']);
        $topInviters = Deserializer::vectorOfObjects($__payload, $__offset, [StatsGroupTopInviter::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

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