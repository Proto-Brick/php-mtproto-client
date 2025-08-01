<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stats\AbstractStoryStats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getStoryStats
 */
final class GetStoryStatsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 927985472;
    
    public string $_ = 'stats.getStoryStats';
    
    public function getMethodName(): string
    {
        return 'stats.getStoryStats';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStoryStats::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param bool|null $dark
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly ?bool $dark = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}