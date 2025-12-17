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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $geoPoint = AbstractInputGeoPoint::deserialize($__payload, $__offset);

        return new self(
            $geoPoint
        );
    }
}