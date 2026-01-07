<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateReadHistoryOutbox
 */
final class UpdateReadHistoryOutbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2f2f21bf;
    
    public string $predicate = 'updateReadHistoryOutbox';
    
    /**
     * @param AbstractPeer $peer
     * @param int $maxId
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $maxId,
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $maxId = Deserializer::int32($__payload, $__offset);
        $pts = Deserializer::int32($__payload, $__offset);
        $ptsCount = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $maxId,
            $pts,
            $ptsCount
        );
    }
}