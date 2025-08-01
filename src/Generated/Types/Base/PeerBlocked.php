<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/peerBlocked
 */
final class PeerBlocked extends AbstractPeerBlocked
{
    public const CONSTRUCTOR_ID = 3908927508;
    
    public string $_ = 'peerBlocked';
    
    /**
     * @param AbstractPeer $peerId
     * @param int $date
     */
    public function __construct(
        public readonly AbstractPeer $peerId,
        public readonly int $date
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peerId->serialize($serializer);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peerId = AbstractPeer::deserialize($deserializer, $stream);
        $date = $deserializer->int32($stream);
            return new self(
            $peerId,
            $date
        );
    }
}