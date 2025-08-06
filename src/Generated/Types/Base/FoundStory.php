<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/foundStory
 */
final class FoundStory extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe87acbc0;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $story = AbstractStoryItem::deserialize($deserializer, $stream);
        return new self(
            $peer,
            $story
        );
    }
}