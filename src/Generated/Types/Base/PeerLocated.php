<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/peerLocated
 */
final class PeerLocated extends AbstractPeerLocated
{
    public const CONSTRUCTOR_ID = 0xca461b5d;
    
    public string $predicate = 'peerLocated';
    
    /**
     * @param AbstractPeer $peer
     * @param int $expires
     * @param int $distance
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $expires,
        public readonly int $distance
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->expires);
        $buffer .= Serializer::int32($this->distance);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $expires = Deserializer::int32($stream);
        $distance = Deserializer::int32($stream);

        return new self(
            $peer,
            $expires,
            $distance
        );
    }
}