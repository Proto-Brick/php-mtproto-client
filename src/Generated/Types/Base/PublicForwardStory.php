<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/publicForwardStory
 */
final class PublicForwardStory extends AbstractPublicForward
{
    public const CONSTRUCTOR_ID = 0xedf3add0;
    
    public string $predicate = 'publicForwardStory';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractStoryItem $story
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractStoryItem $story
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->story->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $story = AbstractStoryItem::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $story
        );
    }
}