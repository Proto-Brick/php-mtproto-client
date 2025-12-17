<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/storyView
 */
final class StoryView extends AbstractStoryView
{
    public const CONSTRUCTOR_ID = 0xb0bdeac5;
    
    public string $predicate = 'storyView';
    
    /**
     * @param int $userId
     * @param int $date
     * @param true|null $blocked
     * @param true|null $blockedMyStoriesFrom
     * @param AbstractReaction|null $reaction
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date,
        public readonly ?true $blocked = null,
        public readonly ?true $blockedMyStoriesFrom = null,
        public readonly ?AbstractReaction $reaction = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->blocked) {
            $flags |= (1 << 0);
        }
        if ($this->blockedMyStoriesFrom) {
            $flags |= (1 << 1);
        }
        if ($this->reaction !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= $this->reaction->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $blocked = (($flags & (1 << 0)) !== 0) ? true : null;
        $blockedMyStoriesFrom = (($flags & (1 << 1)) !== 0) ? true : null;
        $userId = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $reaction = (($flags & (1 << 2)) !== 0) ? AbstractReaction::deserialize($__payload, $__offset) : null;

        return new self(
            $userId,
            $date,
            $blocked,
            $blockedMyStoriesFrom,
            $reaction
        );
    }
}