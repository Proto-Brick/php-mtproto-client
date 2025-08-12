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
    public const CONSTRUCTOR_ID = 0x2ec0533f;
    
    public string $predicate = 'messageMediaVenue';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geo->serialize();
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
        $geo = AbstractGeoPoint::deserialize($stream);
        $title = Deserializer::bytes($stream);
        $address = Deserializer::bytes($stream);
        $provider = Deserializer::bytes($stream);
        $venueId = Deserializer::bytes($stream);
        $venueType = Deserializer::bytes($stream);

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