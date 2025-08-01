<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Stats\AbstractMegagroupStats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.getMegagroupStats
 */
final class GetMegagroupStatsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3705636359;
    
    public string $_ = 'stats.getMegagroupStats';
    
    public function getMethodName(): string
    {
        return 'stats.getMegagroupStats';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMegagroupStats::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param bool|null $dark
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly ?bool $dark = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->channel->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}