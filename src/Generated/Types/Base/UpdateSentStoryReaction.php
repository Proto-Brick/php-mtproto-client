<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $storyId = Deserializer::int32($__payload, $__offset);
        $reaction = AbstractReaction::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $storyId,
            $reaction
        );
    }
}