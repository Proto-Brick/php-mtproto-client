<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateNewStoryReaction
 */
final class UpdateNewStoryReaction extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1824e40b;
    
    public string $predicate = 'updateNewStoryReaction';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->storyId);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->reaction->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $storyId = Deserializer::int32($__payload, $__offset);
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $reaction = AbstractReaction::deserialize($__payload, $__offset);

        return new self(
            $storyId,
            $peer,
            $reaction
        );
    }
}