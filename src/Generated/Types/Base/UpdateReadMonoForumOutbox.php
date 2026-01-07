<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateReadMonoForumOutbox
 */
final class UpdateReadMonoForumOutbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa4a79376;
    
    public string $predicate = 'updateReadMonoForumOutbox';
    
    /**
     * @param int $channelId
     * @param AbstractPeer $savedPeerId
     * @param int $readMaxId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly AbstractPeer $savedPeerId,
        public readonly int $readMaxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= $this->savedPeerId->serialize();
        $buffer .= Serializer::int32($this->readMaxId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $channelId = Deserializer::int64($__payload, $__offset);
        $savedPeerId = AbstractPeer::deserialize($__payload, $__offset);
        $readMaxId = Deserializer::int32($__payload, $__offset);

        return new self(
            $channelId,
            $savedPeerId,
            $readMaxId
        );
    }
}