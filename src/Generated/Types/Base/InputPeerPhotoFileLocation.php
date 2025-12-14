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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $big = (($flags & (1 << 0)) !== 0) ? true : null;
        $peer = AbstractInputPeer::deserialize($stream);
        $photoId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $peer,
            $photoId,
            $big
        );
    }
}