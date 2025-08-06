<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateNewStoryReaction
 */
final class UpdateNewStoryReaction extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1824e40b;
    
    public string $_ = 'updateNewStoryReaction';
    
    /**
     * @param int $storyId
     * @param AbstractPeer $peer
     * @param AbstractReaction $reaction
     */
    public function __construct(
        public readonly int $storyId,
        public readonly AbstractPeer $peer,
        public readonly AbstractReaction $reaction
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->storyId);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->reaction->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $storyId = $deserializer->int32($stream);
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $reaction = AbstractReaction::deserialize($deserializer, $stream);
        return new self(
            $storyId,
            $peer,
            $reaction
        );
    }
}