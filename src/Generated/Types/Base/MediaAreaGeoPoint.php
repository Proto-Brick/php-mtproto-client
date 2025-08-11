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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->address !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->coordinates->serialize();
        $buffer .= $this->geo->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->address->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $geo = AbstractGeoPoint::deserialize($stream);
        $address = ($flags & (1 << 0)) ? GeoPointAddress::deserialize($stream) : null;
        return new self(
            $coordinates,
            $geo,
            $address
        );
    }
}