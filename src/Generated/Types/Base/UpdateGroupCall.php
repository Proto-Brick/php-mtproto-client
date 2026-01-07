<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateGroupCall
 */
final class UpdateGroupCall extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9d2216e0;
    
    public string $predicate = 'updateGroupCall';
    
    /**
     * @param AbstractGroupCall $call
     * @param true|null $liveStory
     * @param AbstractPeer|null $peer
     */
    public function __construct(
        public readonly AbstractGroupCall $call,
        public readonly ?true $liveStory = null,
        public readonly ?AbstractPeer $peer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->liveStory) {
            $flags |= (1 << 2);
        }
        if ($this->peer !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= $this->peer->serialize();
        }
        $buffer .= $this->call->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $liveStory = (($flags & (1 << 2)) !== 0) ? true : null;
        $peer = (($flags & (1 << 1)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $call = AbstractGroupCall::deserialize($__payload, $__offset);

        return new self(
            $call,
            $liveStory,
            $peer
        );
    }
}