<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $geo = AbstractGeoPoint::deserialize($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $address = Deserializer::bytes($__payload, $__offset);
        $provider = Deserializer::bytes($__payload, $__offset);
        $venueId = Deserializer::bytes($__payload, $__offset);
        $venueType = Deserializer::bytes($__payload, $__offset);

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