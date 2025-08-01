<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelLocation
 */
final class ChannelLocation extends AbstractChannelLocation
{
    public const CONSTRUCTOR_ID = 547062491;
    
    public string $_ = 'channelLocation';
    
    /**
     * @param AbstractGeoPoint $geoPoint
     * @param string $address
     */
    public function __construct(
        public readonly AbstractGeoPoint $geoPoint,
        public readonly string $address
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geoPoint->serialize($serializer);
        $buffer .= $serializer->bytes($this->address);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $geoPoint = AbstractGeoPoint::deserialize($deserializer, $stream);
        $address = $deserializer->bytes($stream);
            return new self(
            $geoPoint,
            $address
        );
    }
}