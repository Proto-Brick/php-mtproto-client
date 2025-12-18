<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateMonoForumNoPaidException
 */
final class UpdateMonoForumNoPaidException extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9f812b08;
    
    public string $predicate = 'updateMonoForumNoPaidException';
    
    /**
     * @param int $channelId
     * @param AbstractPeer $savedPeerId
     * @param true|null $exception
     */
    public function __construct(
        public readonly int $channelId,
        public readonly AbstractPeer $savedPeerId,
        public readonly ?true $exception = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->exception) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= $this->savedPeerId->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $exception = (($flags & (1 << 0)) !== 0) ? true : null;
        $channelId = Deserializer::int64($__payload, $__offset);
        $savedPeerId = AbstractPeer::deserialize($__payload, $__offset);

        return new self(
            $channelId,
            $savedPeerId,
            $exception
        );
    }
}