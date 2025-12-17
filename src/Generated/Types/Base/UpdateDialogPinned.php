<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateDialogPinned
 */
final class UpdateDialogPinned extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x6e6fe51c;
    
    public string $predicate = 'updateDialogPinned';
    
    /**
     * @param AbstractDialogPeer $peer
     * @param true|null $pinned
     * @param int|null $folderId
     */
    public function __construct(
        public readonly AbstractDialogPeer $peer,
        public readonly ?true $pinned = null,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) {
            $flags |= (1 << 0);
        }
        if ($this->folderId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $pinned = (($flags & (1 << 0)) !== 0) ? true : null;
        $folderId = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $peer = AbstractDialogPeer::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $pinned,
            $folderId
        );
    }
}