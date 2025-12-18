<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputReplyToStory
 */
final class InputReplyToStory extends AbstractInputReplyTo
{
    public const CONSTRUCTOR_ID = 0x5881323a;
    
    public string $predicate = 'inputReplyToStory';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $storyId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $storyId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->storyId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractInputPeer::deserialize($__payload, $__offset);
        $storyId = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $storyId
        );
    }
}