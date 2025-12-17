<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePinnedSavedDialogs
 */
final class UpdatePinnedSavedDialogs extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x686c85a6;
    
    public string $predicate = 'updatePinnedSavedDialogs';
    
    /**
     * @param list<AbstractDialogPeer>|null $order
     */
    public function __construct(
        public readonly ?array $order = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->order !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->order);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $order = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDialogPeer::class, 'deserialize']) : null;

        return new self(
            $order
        );
    }
}