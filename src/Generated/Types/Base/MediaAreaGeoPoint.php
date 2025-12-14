<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/mediaAreaGeoPoint
 */
final class MediaAreaGeoPoint extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0xcad5452d;
    
    public string $predicate = 'mediaAreaGeoPoint';
    
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
        if ($this->address !== null) {
            $flags |= (1 << 0);
        }
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
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $geo = AbstractGeoPoint::deserialize($stream);
        $address = (($flags & (1 << 0)) !== 0) ? GeoPointAddress::deserialize($stream) : null;

        return new self(
            $coordinates,
            $geo,
            $address
        );
    }
}