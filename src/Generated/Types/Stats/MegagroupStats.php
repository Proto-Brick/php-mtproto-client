<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsAbsValueAndPrev;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsDateRangeDays;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGroupTopAdmin;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGroupTopInviter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGroupTopPoster;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stats.megagroupStats
 */
final class MegagroupStats extends AbstractMegagroupStats
{
    public const CONSTRUCTOR_ID = 4018141462;
    
    public string $_ = 'stats.megagroupStats';
    
    /**
     * @param AbstractStatsDateRangeDays $period
     * @param AbstractStatsAbsValueAndPrev $members
     * @param AbstractStatsAbsValueAndPrev $messages
     * @param AbstractStatsAbsValueAndPrev $viewers
     * @param AbstractStatsAbsValueAndPrev $posters
     * @param AbstractStatsGraph $growthGraph
     * @param AbstractStatsGraph $membersGraph
     * @param AbstractStatsGraph $newMembersBySourceGraph
     * @param AbstractStatsGraph $languagesGraph
     * @param AbstractStatsGraph $messagesGraph
     * @param AbstractStatsGraph $actionsGraph
     * @param AbstractStatsGraph $topHoursGraph
     * @param AbstractStatsGraph $weekdaysGraph
     * @param list<AbstractStatsGroupTopPoster> $topPosters
     * @param list<AbstractStatsGroupTopAdmin> $topAdmins
     * @param list<AbstractStatsGroupTopInviter> $topInviters
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AbstractStatsDateRangeDays $period,
        public readonly AbstractStatsAbsValueAndPrev $members,
        public readonly AbstractStatsAbsValueAndPrev $messages,
        public readonly AbstractStatsAbsValueAndPrev $viewers,
        public readonly AbstractStatsAbsValueAndPrev $posters,
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $period = AbstractStatsDateRangeDays::deserialize($deserializer, $stream);
        $members = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $messages = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $viewers = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $posters = AbstractStatsAbsValueAndPrev::deserialize($deserializer, $stream);
        $growthGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $membersGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $newMembersBySourceGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $languagesGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $messagesGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $actionsGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $topHoursGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $weekdaysGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $topPosters = $deserializer->vectorOfObjects($stream, [AbstractStatsGroupTopPoster::class, 'deserialize']);
        $topAdmins = $deserializer->vectorOfObjects($stream, [AbstractStatsGroupTopAdmin::class, 'deserialize']);
        $topInviters = $deserializer->vectorOfObjects($stream, [AbstractStatsGroupTopInviter::class, 'deserialize']);
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