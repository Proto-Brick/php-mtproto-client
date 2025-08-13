<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaVenue
 */
final class InputMediaVenue extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xc13d1c11;
    
    public string $predicate = 'inputMediaVenue';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geoPoint->serialize();
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->address);
        $buffer .= Serializer::bytes($this->provider);
        $buffer .= Serializer::bytes($this->venueId);
        $buffer .= Serializer::bytes($this->venueType);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $geoPoint = AbstractInputGeoPoint::deserialize($stream);
        $title = Deserializer::bytes($stream);
        $address = Deserializer::bytes($stream);
        $provider = Deserializer::bytes($stream);
        $venueId = Deserializer::bytes($stream);
        $venueType = Deserializer::bytes($stream);

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