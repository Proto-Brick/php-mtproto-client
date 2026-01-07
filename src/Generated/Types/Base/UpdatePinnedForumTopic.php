<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePinnedForumTopic
 */
final class UpdatePinnedForumTopic extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x683b2c52;
    
    public string $predicate = 'updatePinnedForumTopic';
    
    /**
     * @param AbstractPeer $peer
     * @param int $topicId
     * @param true|null $pinned
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $topicId,
        public readonly ?true $pinned = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topicId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $pinned = (($flags & (1 << 0)) !== 0) ? true : null;
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $topicId = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $topicId,
            $pinned
        );
    }
}