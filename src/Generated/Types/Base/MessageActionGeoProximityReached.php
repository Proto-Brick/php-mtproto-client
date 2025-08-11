<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionGeoProximityReached
 */
final class MessageActionGeoProximityReached extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x98e0d697;
    
    public string $_ = 'messageActionGeoProximityReached';
    
    /**
     * @param AbstractPeer $fromId
     * @param AbstractPeer $toId
     * @param int $distance
     */
    public function __construct(
        public readonly AbstractPeer $fromId,
        public readonly AbstractPeer $toId,
        public readonly int $distance
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->fromId->serialize();
        $buffer .= $this->toId->serialize();
        $buffer .= Serializer::int32($this->distance);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $fromId = AbstractPeer::deserialize($stream);
        $toId = AbstractPeer::deserialize($stream);
        $distance = Deserializer::int32($stream);
        return new self(
            $fromId,
            $toId,
            $distance
        );
    }
}