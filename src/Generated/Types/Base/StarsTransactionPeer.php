<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsTransactionPeer
 */
final class StarsTransactionPeer extends AbstractStarsTransactionPeer
{
    public const CONSTRUCTOR_ID = 3624771933;
    
    public string $_ = 'starsTransactionPeer';
    
    /**
     * @param AbstractPeer $peer
     */
    public function __construct(
        public readonly AbstractPeer $peer
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
            return new self(
            $peer
        );
    }
}