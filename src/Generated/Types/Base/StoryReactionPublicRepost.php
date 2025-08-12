<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storyReactionPublicRepost
 */
final class StoryReactionPublicRepost extends AbstractStoryReaction
{
    public const CONSTRUCTOR_ID = 0xcfcd0f13;
    
    public string $predicate = 'storyReactionPublicRepost';
    
    /**
     * @param AbstractPeer $peerId
     * @param AbstractStoryItem $story
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly AbstractStoryItem $story
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peerId->serialize();
        $buffer .= $this->story->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peerId = AbstractPeer::deserialize($stream);
        $story = AbstractStoryItem::deserialize($stream);

        return new self(
            $peerId,
            $story
        );
    }
}