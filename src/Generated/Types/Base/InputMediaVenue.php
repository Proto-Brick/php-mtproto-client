<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaVenue
 */
final class InputMediaVenue extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 3242007569;
    
    public string $_ = 'inputMediaVenue';
    
    /**
     * @param AbstractInputGeoPoint $geoPoint
     * @param string $title
     * @param string $address
     * @param string $provider
     * @param string $venueId
     * @param string $venueType
     */
    public function __construct(
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly string $title,
        public readonly string $address,
        public readonly string $provider,
        public readonly string $venueId,
        public readonly string $venueType
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geoPoint->serialize($serializer);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->bytes($this->address);
        $buffer .= $serializer->bytes($this->provider);
        $buffer .= $serializer->bytes($this->venueId);
        $buffer .= $serializer->bytes($this->venueType);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $geoPoint = AbstractInputGeoPoint::deserialize($deserializer, $stream);
        $title = $deserializer->bytes($stream);
        $address = $deserializer->bytes($stream);
        $provider = $deserializer->bytes($stream);
        $venueId = $deserializer->bytes($stream);
        $venueType = $deserializer->bytes($stream);
            return new self(
            $geoPoint,
            $title,
            $address,
            $provider,
            $venueId,
            $venueType
        );
    }
}