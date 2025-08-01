<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storyViews
 */
final class StoryViews extends AbstractStoryViews
{
    public const CONSTRUCTOR_ID = 2371443926;
    
    public string $_ = 'storyViews';
    
    /**
     * @param int $viewsCount
     * @param bool|null $hasViewers
     * @param int|null $forwardsCount
     * @param list<AbstractReactionCount>|null $reactions
     * @param int|null $reactionsCount
     * @param list<int>|null $recentViewers
     */
    public function __construct(
        public readonly int $viewsCount,
        public readonly ?bool $hasViewers = null,
        public readonly ?int $forwardsCount = null,
        public readonly ?array $reactions = null,
        public readonly ?int $reactionsCount = null,
        public readonly ?array $recentViewers = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasViewers) $flags |= (1 << 1);
        if ($this->forwardsCount !== null) $flags |= (1 << 2);
        if ($this->reactions !== null) $flags |= (1 << 3);
        if ($this->reactionsCount !== null) $flags |= (1 << 4);
        if ($this->recentViewers !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->viewsCount);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->forwardsCount);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->reactions);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->reactionsCount);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfLongs($this->recentViewers);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hasViewers = ($flags & (1 << 1)) ? true : null;
        $viewsCount = $deserializer->int32($stream);
        $forwardsCount = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $reactions = ($flags & (1 << 3)) ? $deserializer->vectorOfObjects($stream, [AbstractReactionCount::class, 'deserialize']) : null;
        $reactionsCount = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $recentViewers = ($flags & (1 << 0)) ? $deserializer->vectorOfLongs($stream) : null;
            return new self(
            $viewsCount,
            $hasViewers,
            $forwardsCount,
            $reactions,
            $reactionsCount,
            $recentViewers
        );
    }
}