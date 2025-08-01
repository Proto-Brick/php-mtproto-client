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
    public const CONSTRUCTOR_ID = 2564871831;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->fromId->serialize($serializer);
        $buffer .= $this->toId->serialize($serializer);
        $buffer .= $serializer->int32($this->distance);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $fromId = AbstractPeer::deserialize($deserializer, $stream);
        $toId = AbstractPeer::deserialize($deserializer, $stream);
        $distance = $deserializer->int32($stream);
            return new self(
            $fromId,
            $toId,
            $distance
        );
    }
}