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
    public const CONSTRUCTOR_ID = 0xd80da15d;
    
    public string $_ = 'starsTransactionPeer';
    
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($stream);
        return new self(
            $peer
        );
    }
}