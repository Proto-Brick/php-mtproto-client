<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputWebFileGeoPointLocation
 */
final class InputWebFileGeoPointLocation extends AbstractInputWebFileLocation
{
    public const CONSTRUCTOR_ID = 0x9f2221c9;
    
    public string $_ = 'inputWebFileGeoPointLocation';
    
    /**
     * @param AbstractInputGeoPoint $geoPoint
     * @param int $accessHash
     * @param int $w
     * @param int $h
     * @param int $zoom
     * @param int $scale
     */
    public function __construct(
        public readonly AbstractInputGeoPoint $geoPoint,
        public readonly int $accessHash,
        public readonly int $w,
        public readonly int $h,
        public readonly int $zoom,
        public readonly int $scale
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->geoPoint->serialize();
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        $buffer .= Serializer::int32($this->zoom);
        $buffer .= Serializer::int32($this->scale);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $geoPoint = AbstractInputGeoPoint::deserialize($stream);
        $accessHash = Deserializer::int64($stream);
        $w = Deserializer::int32($stream);
        $h = Deserializer::int32($stream);
        $zoom = Deserializer::int32($stream);
        $scale = Deserializer::int32($stream);
        return new self(
            $geoPoint,
            $accessHash,
            $w,
            $h,
            $zoom,
            $scale
        );
    }
}