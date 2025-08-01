<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/topPeer
 */
final class TopPeer extends AbstractTopPeer
{
    public const CONSTRUCTOR_ID = 3989684315;
    
    public string $_ = 'topPeer';
    
    /**
     * @param AbstractPeer $peer
     * @param float $rating
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly float $rating
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= pack('d', $this->rating);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $rating = $deserializer->double($stream);
            return new self(
            $peer,
            $rating
        );
    }
}