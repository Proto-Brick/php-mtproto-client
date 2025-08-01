<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storyView
 */
final class StoryView extends AbstractStoryView
{
    public const CONSTRUCTOR_ID = 2965236421;
    
    public string $_ = 'storyView';
    
    /**
     * @param int $userId
     * @param int $date
     * @param bool|null $blocked
     * @param bool|null $blockedMyStoriesFrom
     * @param AbstractReaction|null $reaction
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date,
        public readonly ?bool $blocked = null,
        public readonly ?bool $blockedMyStoriesFrom = null,
        public readonly ?AbstractReaction $reaction = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->blocked) $flags |= (1 << 0);
        if ($this->blockedMyStoriesFrom) $flags |= (1 << 1);
        if ($this->reaction !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= $this->reaction->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $blocked = ($flags & (1 << 0)) ? true : null;
        $blockedMyStoriesFrom = ($flags & (1 << 1)) ? true : null;
        $userId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $reaction = ($flags & (1 << 2)) ? AbstractReaction::deserialize($deserializer, $stream) : null;
            return new self(
            $userId,
            $date,
            $blocked,
            $blockedMyStoriesFrom,
            $reaction
        );
    }
}