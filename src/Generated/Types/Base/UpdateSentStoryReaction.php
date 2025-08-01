<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateSentStoryReaction
 */
final class UpdateSentStoryReaction extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2103604867;
    
    public string $_ = 'updateSentStoryReaction';
    
    /**
     * @param AbstractPeer $peer
     * @param int $storyId
     * @param AbstractReaction $reaction
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $storyId,
        public readonly AbstractReaction $reaction
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->storyId);
        $buffer .= $this->reaction->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $storyId = $deserializer->int32($stream);
        $reaction = AbstractReaction::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $storyId,
            $reaction
        );
    }
}