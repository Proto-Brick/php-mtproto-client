<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputDialogPeerFolder
 */
final class InputDialogPeerFolder extends AbstractInputDialogPeer
{
    public const CONSTRUCTOR_ID = 0x64600527;
    
    public string $predicate = 'inputDialogPeerFolder';
    
    /**
     * @param int $folderId
     */
    public function __construct(
        public readonly int $folderId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->folderId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $folderId = Deserializer::int32($__payload, $__offset);

        return new self(
            $folderId
        );
    }
}