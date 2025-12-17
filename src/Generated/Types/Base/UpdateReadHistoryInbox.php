<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateReadHistoryInbox
 */
final class UpdateReadHistoryInbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9c974fdf;
    
    public string $predicate = 'updateReadHistoryInbox';
    
    /**
     * @param AbstractPeer $peer
     * @param int $maxId
     * @param int $stillUnreadCount
     * @param int $pts
     * @param int $ptsCount
     * @param int|null $folderId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $maxId,
        public readonly int $stillUnreadCount,
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->folderId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);
        $buffer .= Serializer::int32($this->stillUnreadCount);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $folderId = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $maxId = Deserializer::int32($__payload, $__offset);
        $stillUnreadCount = Deserializer::int32($__payload, $__offset);
        $pts = Deserializer::int32($__payload, $__offset);
        $ptsCount = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $maxId,
            $stillUnreadCount,
            $pts,
            $ptsCount,
            $folderId
        );
    }
}