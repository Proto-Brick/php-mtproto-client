<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stats.loadAsyncGraph
 */
final class LoadAsyncGraphRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1646092192;
    
    public string $_ = 'stats.loadAsyncGraph';
    
    public function getMethodName(): string
    {
        return 'stats.loadAsyncGraph';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStatsGraph::class;
    }
    /**
     * @param string $token
     * @param int|null $x
     */
    public function __construct(
        public readonly string $token,
        public readonly ?int $x = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->x !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->token);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->x);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}