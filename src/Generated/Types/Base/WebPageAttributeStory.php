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
    
    public string $_ = 'webPageAttributeStory';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->story !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->story->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $id = $deserializer->int32($stream);
        $story = ($flags & (1 << 0)) ? AbstractStoryItem::deserialize($deserializer, $stream) : null;
        return new self(
            $peer,
            $id,
            $story
        );
    }
}