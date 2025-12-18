<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPeerPhotoFileLocation
 */
final class InputPeerPhotoFileLocation extends AbstractInputFileLocation
{
    public const CONSTRUCTOR_ID = 0x37257e99;
    
    public string $predicate = 'inputPeerPhotoFileLocation';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $photoId
     * @param true|null $big
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $photoId,
        public readonly ?true $big = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->big) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->photoId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $big = (($flags & (1 << 0)) !== 0) ? true : null;
        $peer = AbstractInputPeer::deserialize($__payload, $__offset);
        $photoId = Deserializer::int64($__payload, $__offset);

        return new self(
            $peer,
            $photoId,
            $big
        );
    }
}