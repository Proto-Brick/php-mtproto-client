<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaStory
 */
final class MessageMediaStory extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 1758159491;
    
    public string $_ = 'messageMediaStory';
    
    /**
     * @param AbstractPeer $peer
     * @param int $id
     * @param bool|null $viaMention
     * @param AbstractStoryItem|null $story
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $id,
        public readonly ?bool $viaMention = null,
        public readonly ?AbstractStoryItem $story = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaMention) $flags |= (1 << 1);
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

        $viaMention = ($flags & (1 << 1)) ? true : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $id = $deserializer->int32($stream);
        $story = ($flags & (1 << 0)) ? AbstractStoryItem::deserialize($deserializer, $stream) : null;
            return new self(
            $peer,
            $id,
            $viaMention,
            $story
        );
    }
}