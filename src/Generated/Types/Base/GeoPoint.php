<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/geoPoint
 */
final class GeoPoint extends AbstractGeoPoint
{
    public const CONSTRUCTOR_ID = 2997024355;
    
    public string $_ = 'geoPoint';
    
    /**
     * @param float $long
     * @param float $lat
     * @param int $accessHash
     * @param int|null $accuracyRadius
     */
    public function __construct(
        public readonly float $long,
        public readonly float $lat,
        public readonly int $accessHash,
        public readonly ?int $accuracyRadius = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->accuracyRadius !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= pack('d', $this->long);
        $buffer .= pack('d', $this->lat);
        $buffer .= $serializer->int64($this->accessHash);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->accuracyRadius);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $long = $deserializer->double($stream);
        $lat = $deserializer->double($stream);
        $accessHash = $deserializer->int64($stream);
        $accuracyRadius = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
            return new self(
            $long,
            $lat,
            $accessHash,
            $accuracyRadius
        );
    }
}