<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storyReaction
 */
final class StoryReaction extends AbstractStoryReaction
{
    public const CONSTRUCTOR_ID = 0x6090d6d5;
    
    public string $_ = 'storyReaction';
    
    /**
     * @param AbstractPeer $peerId
     * @param int $date
     * @param AbstractReaction $reaction
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly int $date,
        public readonly AbstractReaction $reaction
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peerId->serialize($serializer);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $this->reaction->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peerId = AbstractPeer::deserialize($deserializer, $stream);
        $date = $deserializer->int32($stream);
        $reaction = AbstractReaction::deserialize($deserializer, $stream);
        return new self(
            $peerId,
            $date,
            $reaction
        );
    }
}