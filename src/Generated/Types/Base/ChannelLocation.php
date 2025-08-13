<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelLocation
 */
final class ChannelLocation extends AbstractChannelLocation
{
    public const CONSTRUCTOR_ID = 0x209b82db;
    
    public string $predicate = 'channelLocation';
    
    /**
     * @param AbstractGeoPoint $geoPoint
     * @param string $address
     */
    public function __construct(
        public readonly AbstractGeoPoint $geoPoint,
        public readonly string $address
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geoPoint->serialize();
        $buffer .= Serializer::bytes($this->address);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $geoPoint = AbstractGeoPoint::deserialize($stream);
        $address = Deserializer::bytes($stream);

        return new self(
            $geoPoint,
            $address
        );
    }
}