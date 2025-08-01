<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaVenue
 */
final class MessageMediaVenue extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 784356159;
    
    public string $_ = 'messageMediaVenue';
    
    /**
     * @param AbstractGeoPoint $geo
     * @param string $title
     * @param string $address
     * @param string $provider
     * @param string $venueId
     * @param string $venueType
     */
    public function __construct(
        public readonly AbstractGeoPoint $geo,
        public readonly string $title,
        public readonly string $address,
        public readonly string $provider,
        public readonly string $venueId,
        public readonly string $venueType
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geo->serialize($serializer);
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
        $geo = AbstractGeoPoint::deserialize($deserializer, $stream);
        $title = $deserializer->bytes($stream);
        $address = $deserializer->bytes($stream);
        $provider = $deserializer->bytes($stream);
        $venueId = $deserializer->bytes($stream);
        $venueType = $deserializer->bytes($stream);
            return new self(
            $geo,
            $title,
            $address,
            $provider,
            $venueId,
            $venueType
        );
    }
}