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
    public const CONSTRUCTOR_ID = 3486322451;
    
    public string $_ = 'storyReactionPublicRepost';
    
    /**
     * @param AbstractPeer $peerId
     * @param AbstractStoryItem $story
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly AbstractStoryItem $story
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peerId->serialize($serializer);
        $buffer .= $this->story->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peerId = AbstractPeer::deserialize($deserializer, $stream);
        $story = AbstractStoryItem::deserialize($deserializer, $stream);
            return new self(
            $peerId,
            $story
        );
    }
}