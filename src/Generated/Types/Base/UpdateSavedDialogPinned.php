<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateSavedDialogPinned
 */
final class UpdateSavedDialogPinned extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xaeaf9e74;
    
    public string $predicate = 'updateSavedDialogPinned';
    
    /**
     * @param AbstractDialogPeer $peer
     * @param true|null $pinned
     */
    public function __construct(
        public readonly AbstractDialogPeer $peer,
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
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $pinned = (($flags & (1 << 0)) !== 0) ? true : null;
        $peer = AbstractDialogPeer::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $pinned
        );
    }
}