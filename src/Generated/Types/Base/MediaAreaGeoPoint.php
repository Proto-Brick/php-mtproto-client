<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/mediaAreaGeoPoint
 */
final class MediaAreaGeoPoint extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0xcad5452d;
    
    public string $_ = 'mediaAreaGeoPoint';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param AbstractGeoPoint $geo
     * @param GeoPointAddress|null $address
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly AbstractGeoPoint $geo,
        public readonly ?GeoPointAddress $address = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->address !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->coordinates->serialize($serializer);
        $buffer .= $this->geo->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->address->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $coordinates = MediaAreaCoordinates::deserialize($deserializer, $stream);
        $geo = AbstractGeoPoint::deserialize($deserializer, $stream);
        $address = ($flags & (1 << 0)) ? GeoPointAddress::deserialize($deserializer, $stream) : null;
        return new self(
            $coordinates,
            $geo,
            $address
        );
    }
}