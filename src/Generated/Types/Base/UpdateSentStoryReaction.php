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
    public const CONSTRUCTOR_ID = 0x7d627683;
    
    public string $predicate = 'updateSentStoryReaction';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->storyId);
        $buffer .= $this->reaction->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $storyId = Deserializer::int32($stream);
        $reaction = AbstractReaction::deserialize($stream);

        return new self(
            $peer,
            $storyId,
            $reaction
        );
    }
}