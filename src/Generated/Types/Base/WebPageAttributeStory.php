<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webPageAttributeStory
 */
final class WebPageAttributeStory extends AbstractWebPageAttribute
{
    public const CONSTRUCTOR_ID = 0x2e94c3e7;
    
    public string $predicate = 'webPageAttributeStory';
    
    /**
     * @param AbstractPeer $peer
     * @param int $id
     * @param AbstractStoryItem|null $story
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $id,
        public readonly ?AbstractStoryItem $story = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->story !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->story->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $peer = AbstractPeer::deserialize($stream);
        $id = Deserializer::int32($stream);
        $story = ($flags & (1 << 0)) ? AbstractStoryItem::deserialize($stream) : null;

        return new self(
            $peer,
            $id,
            $story
        );
    }
}