<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/storyViewPublicRepost
 */
final class StoryViewPublicRepost extends AbstractStoryView
{
    public const CONSTRUCTOR_ID = 0xbd74cf49;
    
    public string $predicate = 'storyViewPublicRepost';
    
    /**
     * @param AbstractPeer $peerId
     * @param AbstractStoryItem $story
     * @param true|null $blocked
     * @param true|null $blockedMyStoriesFrom
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly AbstractStoryItem $story,
        public readonly ?true $blocked = null,
        public readonly ?true $blockedMyStoriesFrom = null
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
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peerId->serialize();
        $buffer .= $this->story->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $blocked = (($flags & (1 << 0)) !== 0) ? true : null;
        $blockedMyStoriesFrom = (($flags & (1 << 1)) !== 0) ? true : null;
        $peerId = AbstractPeer::deserialize($__payload, $__offset);
        $story = AbstractStoryItem::deserialize($__payload, $__offset);

        return new self(
            $peerId,
            $story,
            $blocked,
            $blockedMyStoriesFrom
        );
    }
}