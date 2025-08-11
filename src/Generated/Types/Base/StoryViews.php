<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storyViews
 */
final class StoryViews extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8d595cd6;
    
    public string $_ = 'storyViews';
    
    /**
     * @param int $viewsCount
     * @param bool|null $hasViewers
     * @param int|null $forwardsCount
     * @param list<ReactionCount>|null $reactions
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasViewers) $flags |= (1 << 1);
        if ($this->forwardsCount !== null) $flags |= (1 << 2);
        if ($this->reactions !== null) $flags |= (1 << 3);
        if ($this->reactionsCount !== null) $flags |= (1 << 4);
        if ($this->recentViewers !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->viewsCount);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->forwardsCount);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->reactions);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->reactionsCount);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfLongs($this->recentViewers);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $hasViewers = ($flags & (1 << 1)) ? true : null;
        $viewsCount = Deserializer::int32($stream);
        $forwardsCount = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $reactions = ($flags & (1 << 3)) ? Deserializer::vectorOfObjects($stream, [ReactionCount::class, 'deserialize']) : null;
        $reactionsCount = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $recentViewers = ($flags & (1 << 0)) ? Deserializer::vectorOfLongs($stream) : null;
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