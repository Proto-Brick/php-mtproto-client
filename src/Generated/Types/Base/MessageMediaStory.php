<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaStory
 */
final class MessageMediaStory extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x68cb6283;
    
    public string $predicate = 'messageMediaStory';
    
    /**
     * @param AbstractPeer $peer
     * @param int $id
     * @param true|null $viaMention
     * @param AbstractStoryItem|null $story
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $id,
        public readonly ?true $viaMention = null,
        public readonly ?AbstractStoryItem $story = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaMention) {
            $flags |= (1 << 1);
        }
        if ($this->story !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->story->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $viaMention = (($flags & (1 << 1)) !== 0) ? true : null;
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $id = Deserializer::int32($__payload, $__offset);
        $story = (($flags & (1 << 0)) !== 0) ? AbstractStoryItem::deserialize($__payload, $__offset) : null;

        return new self(
            $peer,
            $id,
            $viaMention,
            $story
        );
    }
}