<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Stats\BroadcastStats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getBroadcastStats
 */
final class GetBroadcastStatsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xab42441a;
    
    public string $_ = 'stats.getBroadcastStats';
    
    public function getMethodName(): string
    {
        return 'stats.getBroadcastStats';
    }
    
    public function getResponseClass(): string
    {
        return BroadcastStats::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param bool|null $dark
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly ?bool $dark = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->channel->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}