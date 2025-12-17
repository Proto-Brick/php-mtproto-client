<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/dialogPeer
 */
final class DialogPeer extends AbstractDialogPeer
{
    public const CONSTRUCTOR_ID = 0xe56dbf05;
    
    public string $predicate = 'dialogPeer';
    
    /**
     * @param AbstractPeer $peer
     */
    public function __construct(
        public readonly AbstractPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);

        return new self(
            $peer
        );
    }
}