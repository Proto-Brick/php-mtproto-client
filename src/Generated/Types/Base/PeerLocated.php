<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/peerLocated
 */
final class PeerLocated extends AbstractPeerLocated
{
    public const CONSTRUCTOR_ID = 3393592157;
    
    public string $_ = 'peerLocated';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->expires);
        $buffer .= $serializer->int32($this->distance);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $expires = $deserializer->int32($stream);
        $distance = $deserializer->int32($stream);
            return new self(
            $peer,
            $expires,
            $distance
        );
    }
}