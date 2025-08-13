<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStory
 */
final class UpdateStory extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x75b3b798;
    
    public string $predicate = 'updateStory';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $story = AbstractStoryItem::deserialize($stream);

        return new self(
            $peer,
            $story
        );
    }
}