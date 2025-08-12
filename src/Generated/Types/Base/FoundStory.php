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
    
    public string $predicate = 'foundStory';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractStoryItem $story
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractStoryItem $story
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->story->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $peer = AbstractPeer::deserialize($stream);
        $story = AbstractStoryItem::deserialize($stream);

        return new self(
            $peer,
            $story
        );
    }
}