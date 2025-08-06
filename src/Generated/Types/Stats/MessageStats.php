<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stats.messageStats
 */
final class MessageStats extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7fe91c14;
    
    public string $_ = 'stats.messageStats';
    
    /**
     * @param AbstractStatsGraph $viewsGraph
     * @param AbstractStatsGraph $reactionsByEmotionGraph
     */
    public function __construct(
        public readonly AbstractStatsGraph $viewsGraph,
        public readonly AbstractStatsGraph $reactionsByEmotionGraph
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->viewsGraph->serialize($serializer);
        $buffer .= $this->reactionsByEmotionGraph->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $viewsGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        $reactionsByEmotionGraph = AbstractStatsGraph::deserialize($deserializer, $stream);
        return new self(
            $viewsGraph,
            $reactionsByEmotionGraph
        );
    }
}