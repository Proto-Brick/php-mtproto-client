<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaGeoPoint
 */
final class InputMediaGeoPoint extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xf9c44144;
    
    public string $predicate = 'inputMediaGeoPoint';
    
    /**
     * @param AbstractInputGeoPoint $geoPoint
     */
    public function __construct(
        public readonly AbstractInputGeoPoint $geoPoint
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geoPoint->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $geoPoint = AbstractInputGeoPoint::deserialize($stream);

        return new self(
            $geoPoint
        );
    }
}