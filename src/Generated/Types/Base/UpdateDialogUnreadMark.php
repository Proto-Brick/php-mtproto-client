<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateDialogUnreadMark
 */
final class UpdateDialogUnreadMark extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xb658f23e;
    
    public string $predicate = 'updateDialogUnreadMark';
    
    /**
     * @param AbstractDialogPeer $peer
     * @param true|null $unread
     * @param AbstractPeer|null $savedPeerId
     */
    public function __construct(
        public readonly AbstractDialogPeer $peer,
        public readonly ?true $unread = null,
        public readonly ?AbstractPeer $savedPeerId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unread) {
            $flags |= (1 << 0);
        }
        if ($this->savedPeerId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $unread = (($flags & (1 << 0)) !== 0) ? true : null;
        $peer = AbstractDialogPeer::deserialize($__payload, $__offset);
        $savedPeerId = (($flags & (1 << 1)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;

        return new self(
            $peer,
            $unread,
            $savedPeerId
        );
    }
}