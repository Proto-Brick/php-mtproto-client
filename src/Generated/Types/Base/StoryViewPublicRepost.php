<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        if ($this->blocked) $flags |= (1 << 0);
        if ($this->blockedMyStoriesFrom) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peerId->serialize();
        $buffer .= $this->story->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $blocked = ($flags & (1 << 0)) ? true : null;
        $blockedMyStoriesFrom = ($flags & (1 << 1)) ? true : null;
        $peerId = AbstractPeer::deserialize($stream);
        $story = AbstractStoryItem::deserialize($stream);

        return new self(
            $peerId,
            $story,
            $blocked,
            $blockedMyStoriesFrom
        );
    }
}