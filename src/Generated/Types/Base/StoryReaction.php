<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/storyReaction
 */
final class StoryReaction extends AbstractStoryReaction
{
    public const CONSTRUCTOR_ID = 0x6090d6d5;
    
    public string $predicate = 'storyReaction';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peerId->serialize();
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->reaction->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peerId = AbstractPeer::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $reaction = AbstractReaction::deserialize($__payload, $__offset);

        return new self(
            $peerId,
            $date,
            $reaction
        );
    }
}