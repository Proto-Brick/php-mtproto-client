<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/foundStory
 */
final class FoundStory extends AbstractFoundStory
{
    public const CONSTRUCTOR_ID = 3900361664;
    
    public string $_ = 'foundStory';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractStoryItem $story
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractStoryItem $story
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->story->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $story = AbstractStoryItem::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $story
        );
    }
}