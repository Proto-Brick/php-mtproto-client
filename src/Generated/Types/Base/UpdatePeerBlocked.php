<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePeerBlocked
 */
final class UpdatePeerBlocked extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xebe07752;
    
    public string $predicate = 'updatePeerBlocked';
    
    /**
     * @param AbstractPeer $peerId
     * @param true|null $blocked
     * @param true|null $blockedMyStoriesFrom
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly ?true $blocked = null,
        public readonly ?true $blockedMyStoriesFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->blocked) {
            $flags |= (1 << 0);
        }
        if ($this->blockedMyStoriesFrom) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peerId->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $blocked = (($flags & (1 << 0)) !== 0) ? true : null;
        $blockedMyStoriesFrom = (($flags & (1 << 1)) !== 0) ? true : null;
        $peerId = AbstractPeer::deserialize($__payload, $__offset);

        return new self(
            $peerId,
            $blocked,
            $blockedMyStoriesFrom
        );
    }
}